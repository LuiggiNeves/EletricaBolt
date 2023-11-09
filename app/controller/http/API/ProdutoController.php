<?php

namespace app\controller\http\API;

use app\controller\http\ControllerAbstract;
use app\domain\service\ProdutoService;

require_once '../../../vendor/autoload.php';

class ProdutoController extends ControllerAbstract
{
    private $produtoService;

    public function __construct(
        ProdutoService $produtoService
    ) {
        $this->produtoService = $produtoService;
    }

    public function criar($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "produto" => $this->produtoService->criar($dados)
                ],
                "mensagem" => "Produto cadastrado com sucesso!"
            ],
            201
        );
    }

    public function listar($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "produtos" => $this->produtoService->listar()
                ],
                "mensagem" => ""
            ],
            200
        );
    }

    public function listarSemCategoria($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "produtos" => $this->produtoService->listarSemCategoria()
                ],
                "mensagem" => ""
            ],
            200
        );
    }
}