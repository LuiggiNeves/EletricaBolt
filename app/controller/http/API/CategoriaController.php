<?php

namespace app\controller\http\API;

use app\controller\http\ControllerAbstract;
use app\domain\service\CategoriaService;

require_once '../../../vendor/autoload.php';

class CategoriaController extends ControllerAbstract
{
    private $categoriaService;

    public function __construct(
        CategoriaService $categoriaService
    ) {
        $this->categoriaService = $categoriaService;
    }

    public function criar($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "categoria" => $this->categoriaService->criar($dados)
                ],
                "mensagem" => ""
            ],
            201
        );
    }

    public function listar($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "categorias" => $this->categoriaService->listar()
                ],
                "mensagem" => ""
            ],
            200
        );
    }
}