<?php

namespace app\controller\http\API;

use app\controller\http\ControllerAbstract;
use app\domain\service\ClienteService;

require_once '../../../vendor/autoload.php';

class ClienteController extends ControllerAbstract
{
    private $clienteService;

    public function __construct(
        ClienteService $clienteService
    ) {
        $this->clienteService = $clienteService;
    }

    public function criar($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "cliente" => $this->clienteService->criar($dados)
                ],
                "mensagem" => ""
            ],
            201
        );
    }

    public function login($dados)
    {
        $loginFoiRealizadoComSucesso = $this->clienteService->login($dados["celular"], $dados["senha"]);

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