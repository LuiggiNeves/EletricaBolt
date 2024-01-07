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

    public function criar(int $categoria_id, int $produto_id): array
    {
        $categoriaProduto = CategoriaProduto::create()->setId(null)->setCategoria_id($categoria_id)->setProduto_id($produto_id);

        return $categoriaProduto->setId($this->categoriaProdutoRepository->criar($categoriaProduto))->toArray();
    }

    public function listarProdutosPorCategoria(int $categoria_id): array
    {
        return $this->categoriaProdutoRepository->listarProdutosPorCategoria($categoria_id);
    }

    public function lePrimeiraCategoriaPorProduto(int $produto_id): array
    {
        return $this->categoriaProdutoRepository->lePrimeiraCategoriaPorProduto($produto_id);
    }

    public function removeProdutoDeCategoria(int $categoria_id, int $produto_id): bool
    {
        return $this->categoriaProdutoRepository->removeProdutoDeCategoria($categoria_id, $produto_id);
    }

    public function removeTodasCategoriasDoProduto(int $produto_id): bool
    {
        return $this->categoriaProdutoRepository->removeTodasCategoriasDoProduto($produto_id);
    }

    public function alterarCategoriaDeProduto(int $categoria_id, int $produto_id): bool
    {
        $this->removeTodasCategoriasDoProduto($produto_id);
        $this->criar($categoria_id, $produto_id);

        return true;
    }
}
