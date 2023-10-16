<?php

namespace app\controller\http\API;

use app\controller\http\ControllerAbstract;
use app\domain\service\UsuarioService;

require_once '../../../vendor/autoload.php';

class UsuarioController extends ControllerAbstract
{
    private $usuarioService;

    public function __construct(
        UsuarioService $usuarioService
    ) {
        $this->usuarioService = $usuarioService;
    }

    public function criar($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "usuario" => $this->usuarioService->criar($dados)
                ],
                "mensagem" => ""
            ],
            201
        );
    }

    public function login($dados)
    {
        $loginFoiRealizadoComSucesso = $this->usuarioService->login($dados["email"], $dados["senha"]);

        return $this->respondeComDados(
            [
                "dados" => [
                    "login_realizado" => $loginFoiRealizadoComSucesso
                ],
                "mensagem" => "Login realizado com sucesso"
            ],
            200
        );
    }
}