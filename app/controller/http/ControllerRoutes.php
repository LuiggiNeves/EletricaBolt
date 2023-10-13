<?php

namespace app\controller\http;

use app\domain\exception\DomainException;
use app\domain\exception\http\DomainHttpException;
use Exception;

require_once "../../../vendor/autoload.php";

class ControllerRoutes extends ControllerAbstract
{
    private static $routes;

    public function __construct()
    {
        self::$routes = array();
    }

    public function addRoute($route, $class, $method, $needsAuth, $needsPermission, $codePermission = null)
    {
        if (!array_key_exists($route, self::$routes)) {
            self::$routes[$route] = new Method($class, $method, $needsAuth, $needsPermission, $codePermission);
        }
    }

    public function run($post, $route)
    {
        if (array_key_exists($route, self::$routes)) {
            $method = self::$routes[$route];

            $allowedRequest = !$method->getNeedsAuth();
            if ($method->getNeedsAuth() && (isset($_SESSION["usuario_esta_logado"]) && $_SESSION["usuario_esta_logado"])) {
                $allowedRequest = true;
            }

            if (!$method->authorize()) {
                http_response_code(403);
                return "Permissão negada";
            }

            if ($allowedRequest) {
                $container = require_once __DIR__ . "../../../config/container.php";

                try {
                    return $container->call([self::$routes[$route]->getClass(), self::$routes[$route]->getMethod()], array($post));
                } catch (DomainHttpException $domainHttpException) {
                    $container->call(
                        ["app\\domain\\service\\NotificacaoUsuarioService", "geraNotificacaoDeLogDeErro"],
                        [
                            $domainHttpException->getMessage() .
                                "<br><br>Arquivo: " . $domainHttpException->getFile() .
                                (isset($_SESSION["usuario_logado"]) ? "<br><br>Usuário: " . unserialize($_SESSION["usuario_logado"])->getNome() : "")
                        ]
                    );
                    $container->call(["app\\domain\\service\\HistoricoUtilizacaoService", "inserir"], [$domainHttpException->getMessage(), "[ SISTEMA LOG ]"]);

                    return $this->respondeComDados(
                        $domainHttpException->getMessage(),
                        $domainHttpException->getHttpStatusCode()
                    );
                } catch (DomainException $domainException) {
                    $container->call(
                        ["app\\domain\\service\\NotificacaoUsuarioService", "geraNotificacaoDeLogDeErro"],
                        [
                            $domainException->getMessage() .
                                "<br><br>Arquivo: " . $domainException->getFile() .
                                (isset($_SESSION["usuario_logado"]) ? "<br><br>Usuário: " . unserialize($_SESSION["usuario_logado"])->getNome() : "")
                        ]
                    );
                    $container->call(["app\\domain\\service\\HistoricoUtilizacaoService", "inserir"], [$domainException->getMessage(), "[ SISTEMA LOG ]"]);

                    return $this->respondeComDados(
                        $domainException->getMessage(),
                        500
                    );
                } catch (Exception $exception) {
                    $container->call(
                        ["app\\domain\\service\\NotificacaoUsuarioService", "geraNotificacaoDeLogDeErro"],
                        [
                            $exception->getMessage() .
                                "<br><br>Arquivo: " . $exception->getFile() .
                                (isset($_SESSION["usuario_logado"]) ? "<br><br>Usuário: " . unserialize($_SESSION["usuario_logado"])->getNome() : "")
                        ]
                    );
                    $container->call(["app\\domain\\service\\HistoricoUtilizacaoService", "inserir"], [$exception->getMessage(), "[ SISTEMA LOG ]"]);

                    return $this->respondeComDados(
                        "Houve um erro durante a operação. Contate o administrador do sistema.",
                        500
                    );
                }
            } else {
                http_response_code(405);
                return "Erro de permissão";
            }
        }

        http_response_code(404);
        return "Rota não encontrada";
    }
}

class Method
{
    private $class;
    private $method;
    private $needsAuth;
    private $needsPermission;
    private $codePermission;

    public function __construct($class, $method, $needsAuth, $needsPermission, $codePermission)
    {
        $this->class = $class;
        $this->method = $method;
        $this->needsAuth = $needsAuth;
        $this->needsPermission = $needsPermission;
        $this->codePermission = $codePermission;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getNeedsAuth()
    {
        return $this->needsAuth;
    }

    public function getNeedsPermission()
    {
        return $this->needsPermission;
    }

    public function getCodePermission()
    {
        return $this->codePermission;
    }

    public function authorize()
    {
        $allowed = !$this->getNeedsPermission();
        if ($this->getNeedsPermission() && isset($_SESSION['permissoes'][$this->getCodePermission()])) {
            return true;
        }

        return $allowed;
    }
}