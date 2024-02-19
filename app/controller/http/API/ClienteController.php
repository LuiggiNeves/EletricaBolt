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
        $cliente = $this->clienteService->login($dados["celular"]);

        return $this->respondeComDados(
            [
                "dados" => [
                    "cliente" => $cliente
                ],
                "mensagem" => "Login realizado com sucesso"
            ],
            200
        );
    }

    public function listar($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "clientes" => $this->clienteService->listar()
                ],
                "mensagem" => ""
            ],
            200
        );
    }
}