<?php

namespace app\domain\service;

use app\domain\exception\http\DomainHttpException;
use app\domain\model\ProdutoImagem;
use app\domain\repository\ProdutoImagemRepository;
use app\util\FileUtil;

class ProdutoImagemService extends ServiceAbstract
{
    private $produtoImagemRepository;

    private $fileUtil;

    public function __construct(
        ProdutoImagemRepository $produtoImagemRepository,

        FileUtil $fileUtil
    ) {
        $this->produtoImagemRepository = $produtoImagemRepository;

        $this->fileUtil = $fileUtil;
    }

    public function criar(array $dados): array
    {
        if (!(isset($dados["arquivo"]) && $dados["arquivo"] != "null")) {
            throw new DomainHttpException("Arquivo deve ser informado!", 400);
        }

        $local_arquivo = null;
        $dadosDoArquivo = $dados["arquivo"];
        $local_arquivo = $this->fileUtil->insereArquivo($dadosDoArquivo, dirname(__FILE__) . "/../../files/entities/");

        $produtoImagem = ProdutoImagem::create()->setProduto_id($dados["produto_id"])
            ->setImagem_path($local_arquivo);

        return $produtoImagem->setId(
            $this->produtoImagemRepository->criar($produtoImagem)
        )->toArray();
    }

    public function removePorId(int $id): bool
    {
        $produtoImagem = $this->produtoImagemRepository->lePorId($id);

        $this->fileUtil->excluiArquivo(dirname(__FILE__) . "/../../files/entities/" . $produtoImagem->getImagem_path());

        return true;
    }

    public function listarPorProduto(int $produto_id): array
    {
        return $this->produtoImagemRepository->listarPorProduto($produto_id);
    }
}
