<?php

namespace app\domain\service;

use app\domain\model\CategoriaProduto;
use app\domain\repository\CategoriaProdutoRepository;

class CategoriaProdutoService extends ServiceAbstract
{
    private $categoriaProdutoRepository;

    public function __construct(
        CategoriaProdutoRepository $categoriaProdutoRepository
    ) {
        $this->categoriaProdutoRepository = $categoriaProdutoRepository;
    }

    public function criar(int $id_categoria, int $id_produto): array
    {
        $categoriaProduto = CategoriaProduto::create()->setId(null)->setId_categoria($id_categoria)->setId_produto($id_produto);

        return $categoriaProduto->setId($this->categoriaProdutoRepository->criar($categoriaProduto))->toArray();
    }

    public function listarProdutosPorCategoria(int $id_categoria): array
    {
        return $this->categoriaProdutoRepository->listarProdutosPorCategoria($id_categoria);
    }

    public function removeProdutoDeCategoria(int $id_categoria, int $id_produto): bool
    {
        return $this->categoriaProdutoRepository->removeProdutoDeCategoria($id_categoria, $id_produto);
    }
}
