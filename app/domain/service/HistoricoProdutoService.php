<?php

namespace app\domain\service;

use app\domain\model\HistoricoProduto;
use app\domain\repository\HistoricoProdutoRepository;

class HistoricoProdutoService
{
    private $historicoProdutoRepository;
    private $historicoUtilizacaoService;

    public function __construct(HistoricoProdutoRepository $historicoProdutoRepository, HistoricoUtilizacaoService $historicoUtilizacaoService)
    {
        $this->historicoProdutoRepository = $historicoProdutoRepository;
        $this->historicoUtilizacaoService = $historicoUtilizacaoService;
    }

    public function inserir(string $mensagem, string $responsavel, int $produto_id): bool
    {
        $id_historico_utilizacao = $this->historicoUtilizacaoService->inserir($mensagem, $responsavel);
        $historicoProduto = HistoricoProduto::create()
            ->setId(null)
            ->setHistorico_utilizacao_id($id_historico_utilizacao)
            ->setProduto_id($produto_id);

        $historicoProduto->setId($this->criar($historicoProduto));

        return $historicoProduto->getId();
    }

    public function criar(HistoricoProduto $historicoProduto): int
    {
        return $this->historicoProdutoRepository->criar($historicoProduto);
    }

    public function quantidadeDeAcessoPorProduto(int $produto_id): int
    {
        return $this->historicoProdutoRepository->quantidadeDeAcessoPorProduto($produto_id);
    }
}