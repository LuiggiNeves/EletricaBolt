<?php

namespace app\controller\http\API;

use app\controller\http\ControllerAbstract;
use app\domain\service\CategoriaProdutoService;

require_once '../../../vendor/autoload.php';

class CategoriaProdutoController extends ControllerAbstract
{
    private $categoriaProdutoService;

    public function __construct(
        CategoriaProdutoService $categoriaProdutoService
    ) {
        $this->categoriaProdutoService = $categoriaProdutoService;
    }

    public function criar($dados)
    {
        $id_categoria = intval($dados["id_categoria"]);
        $id_produto = intval($dados["id_produto"]);

        return $this->respondeComDados(
            [
                "dados" => [
                    "produto" => $this->categoriaProdutoService->criar($id_categoria, $id_produto)
                ],
                "mensagem" => "Produto inserido na categoria com sucesso!"
            ],
            201
        );
    }

    public function listarProdutosPorCategoria($dados)
    {
        $id_categoria = intval($dados["id_categoria"]);

        return $this->respondeComDados(
            [
                "dados" => [
                    "produtos" => $this->categoriaProdutoService->listarProdutosPorCategoria($id_categoria)
                ],
                "mensagem" => ""
            ],
            200
        );
    }

    public function removeProdutoDeCategoria($dados)
    {
        $id_categoria = intval($dados["id_categoria"]);
        $id_produto = intval($dados["id_produto"]);

        return $this->respondeComDados(
            [
                "dados" => [
                    "removido" => $this->categoriaProdutoService->removeProdutoDeCategoria($id_categoria, $id_produto)
                ],
                "mensagem" => ""
            ],
            200
        );
    }
}
