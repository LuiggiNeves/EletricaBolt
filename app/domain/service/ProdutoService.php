<?php

namespace app\domain\service;

use app\domain\exception\http\DomainHttpException;
use app\domain\model\Categoria;
use app\domain\model\Produto;
use app\domain\repository\ProdutoRepository;

class ProdutoService extends ServiceAbstract
{
    private $produtoRepository;

    public function __construct(
        ProdutoRepository $produtoRepository
    ) {
        $this->produtoRepository = $produtoRepository;
    }

    public function criar(array $dados): array
    {
        if ($this->lePorNome($dados["nome"]) != null) {
            throw new DomainHttpException("Nome de produto já está em uso.", 409);
        }

        $produto = Produto::create()->setNome($dados["nome"])
            ->setPreco($dados["preco"])
            ->setDescricao($dados["descricao"])
            ->setImagem_path("");

        return $produto->setId($this->produtoRepository->criar($produto))->toArray();
    }

    public function lePorNome(string $nome): ?Categoria
    {
        return $this->produtoRepository->lePorNome($nome);
    }

    public function listar(): array
    {
        return $this->produtoRepository->listar();
    }
}
