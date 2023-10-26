<?php

namespace app\domain\service;

use app\domain\exception\http\DomainHttpException;
use app\domain\model\Categoria;
use app\domain\model\Produto;
use app\domain\repository\ProdutoRepository;
use app\util\FileUtil;

class ProdutoService extends ServiceAbstract
{
    private $produtoRepository;
    private $fileUtil;

    public function __construct(
        ProdutoRepository $produtoRepository,
        FileUtil $fileUtil
    ) {
        $this->produtoRepository = $produtoRepository;
        $this->fileUtil = $fileUtil;
    }

    public function criar(array $dados): array
    {
        $dadosDoArquivo = $dados["arquivo"];
        $local_arquivo = $this->fileUtil->insereArquivo($dadosDoArquivo, dirname(__FILE__) . "/../../files/entities/");

        if ($this->lePorNome($dados["nome"]) != null) {
            throw new DomainHttpException("Nome de produto já está em uso.", 409);
        }

        $produto = Produto::create()->setNome($dados["nome"])
            ->setPreco($dados["preco"])
            ->setDescricao($dados["descricao"])
            ->setImagem_path($local_arquivo);

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
