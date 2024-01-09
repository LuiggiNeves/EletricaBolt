<?php

namespace app\domain\service;

use app\domain\exception\http\DomainHttpException;
use app\domain\model\Produto;
use app\domain\repository\ProdutoRepository;
use app\util\FileUtil;

class ProdutoService extends ServiceAbstract
{
    private $produtoRepository;

    private $categoriaProdutoService;
    private $historicoProdutoService;

    private $fileUtil;

    public function __construct(
        ProdutoRepository $produtoRepository,

        CategoriaProdutoService $categoriaProdutoService,
        HistoricoProdutoService $historicoProdutoService,

        FileUtil $fileUtil
    ) {
        $this->produtoRepository = $produtoRepository;

        $this->categoriaProdutoService = $categoriaProdutoService;
        $this->historicoProdutoService = $historicoProdutoService;

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
            ->setImagem_path($local_arquivo)
            ->setCodigo_referencia($dados["codigo_referencia"]);

        $produtoArray = $produto->setId($this->produtoRepository->criar($produto))->toArray();

        if (isset($dados["categoria_id"])) {
            if (intval($dados["categoria_id"]) != 0) {
                $this->categoriaProdutoService->criar(
                    $dados["categoria_id"],
                    $produto->getId()
                );
            }
        }

        return $produtoArray;
    }

    public function altera(int $id, array $dados): bool
    {
        $produto = $this->lePorId($id);

        $nome = $dados["nome"];
        $descricao = $dados["descricao"];
        $preco = $dados["preco"];
        $codigo_referencia = $dados["codigo_referencia"];

        $produtoEncontradoPorNome = $this->lePorNome($nome);
        if ($produtoEncontradoPorNome != null && $produtoEncontradoPorNome->getId() != $id) {
            throw new DomainHttpException("Nome de produto já está em uso.", 409);
        }

        $produto->setNome($nome)
            ->setDescricao($descricao)
            ->setPreco($preco)
            ->setCodigo_referencia($codigo_referencia);

        if (isset($dados["arquivo"]) && $dados["arquivo"] != "null") {
            $this->fileUtil->excluiArquivo(dirname(__FILE__) . "/../../files/entities/" . $produto->getImagem_path());

            $dadosDoArquivo = $dados["arquivo"];
            $local_arquivo = $this->fileUtil->insereArquivo($dadosDoArquivo, dirname(__FILE__) . "/../../files/entities/");
            $produto->setImagem_path($local_arquivo);
        }

        if (isset($dados["categoria_id"])) {
            if (intval($dados["categoria_id"]) != 0) {
                $this->categoriaProdutoService->alterarCategoriaDeProduto(
                    $dados["categoria_id"],
                    $produto->getId()
                );
            } else {
                $this->categoriaProdutoService->removeTodasCategoriasDoProduto($produto->getId());
            }
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

        $produtoArray = $produto->toArray();
        $produtoArray["categoria"] = $this->categoriaProdutoService->lePrimeiraCategoriaPorProduto($id);

        $qtd_acessos = $this->historicoProdutoService->quantidadeDeAcessoPorProduto($id);
        $produtoArray["metricas"]["qtd_acessos"] = $qtd_acessos;

        return $produtoArray;
    }

    public function lePorId(int $id): ?Produto
    {
        return $this->produtoRepository->lePorId($id);
    }

    public function quantidadeDeAcessoAProdutos(): int
    {
        return $this->produtoRepository->quantidadeDeAcessoAProdutos();
    }

    public function listaProdutosMaisAcessados(int $qtd = 5): array
    {
        return $this->produtoRepository->listaProdutosMaisAcessados($qtd);
    }
}
