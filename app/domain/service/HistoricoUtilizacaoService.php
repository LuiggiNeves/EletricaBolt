<?php

namespace app\domain\service;

use app\domain\model\HistoricoUtilizacao;
use app\domain\repository\HistoricoUtilizacaoRepository;

class HistoricoUtilizacaoService
{
    private $historicoUtilizacaoRepository;

    public function __construct(HistoricoUtilizacaoRepository $historicoUtilizacaoRepository)
    {
        $this->historicoUtilizacaoRepository = $historicoUtilizacaoRepository;
    }

    public function inserir(string $mensagem, string $responsavel): int
    {
        $historicoUtilizacao = HistoricoUtilizacao::create()
            ->setId(null)
            ->setMensagem($mensagem)
            ->setData(date("Y-m-d"))
            ->setHora(date("H:i:s"))
            ->setResponsavel($responsavel);
        $historicoUtilizacao->setId($this->criar($historicoUtilizacao));

        return $historicoUtilizacao->getId();
    }

    public function criar(HistoricoUtilizacao $historicoUtilizacao): int
    {
        return $this->historicoUtilizacaoRepository->criar($historicoUtilizacao);
    }
}