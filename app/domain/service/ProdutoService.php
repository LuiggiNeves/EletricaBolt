<?php

namespace app\domain\service;

use app\domain\exception\http\DomainHttpException;
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
        $local_arquivo = null;
        if (isset($dados["arquivo"]) && $dados["arquivo"] != "null") {
            $dadosDoArquivo = $dados["arquivo"];
            $local_arquivo = $this->fileUtil->insereArquivo($dadosDoArquivo, dirname(__FILE__) . "/../../files/entities/");
        }

        if ($this->lePorNome($dados["nome"]) != null) {
            throw new DomainHttpException("Nome de produto já está em uso.", 409);
        }

        $produto = Produto::create()->setNome($dados["nome"])
            ->setPreco($dados["preco"])
            ->setDescricao($dados["descricao"])
            ->setImagem_path($local_arquivo);

        return $produto->setId($this->produtoRepository->criar($produto))->toArray();
    }

    public function altera(int $id, array $dados): bool
    {
        $produto = $this->lePorId($id);

        $nome = $dados["nome"];
        $descricao = $dados["descricao"];
        $preco = $dados["preco"];

        $produtoEncontradoPorNome = $this->lePorNome($nome);
        if ($produtoEncontradoPorNome != null && $produtoEncontradoPorNome->getId() != $id) {
            throw new DomainHttpException("Nome de produto já está em uso.", 409);
        }

        $produto->setNome($nome)
            ->setDescricao($descricao)
            ->setPreco($preco);

        if (isset($dados["arquivo"]) && $dados["arquivo"] != "null") {
            $this->fileUtil->excluiArquivo(dirname(__FILE__) . "/../../files/entities/" . $produto->getImagem_path());

            $dadosDoArquivo = $dados["arquivo"];
            $local_arquivo = $this->fileUtil->insereArquivo($dadosDoArquivo, dirname(__FILE__) . "/../../files/entities/");
            $produto->setImagem_path($local_arquivo);
        }

        return $this->produtoRepository->altera($produto);
    }

    public function lePorNome(string $nome): ?Produto
    {
        return $this->produtoRepository->lePorNome($nome);
    }

    public function listar(): array
    {
        return $this->produtoRepository->listar();
    }

    public function listarSemCategoria(): array
    {
        return $this->produtoRepository->listarSemCategoria();
    }

    public function executaQueryEBuscaTudo(string $query): array
    {
        return $this->produtoRepository->executaQueryEBuscaTudo($query);
    }

    public function leDadosPorId(int $id): array
    {
        $produto = $this->produtoRepository->lePorId($id);
        if ($produto == null) {
            throw new DomainHttpException("Produto não encontrado", 404);
        }

        return $produto->toArray();
    }

    public function lePorId(int $id): ?Produto
    {
        return $this->produtoRepository->lePorId($id);
    }
}
