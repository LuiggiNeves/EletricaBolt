<?php

namespace app\domain\service;

use app\domain\model\HistoricoUsuario;
use app\domain\repository\HistoricoUsuarioRepository;

class HistoricoUsuarioService
{
    private $historicoUsuarioRepository;
    private $historicoUtilizacaoService;

    public function __construct(HistoricoUsuarioRepository $historicoUsuarioRepository, HistoricoUtilizacaoService $historicoUtilizacaoService)
    {
        $this->historicoUsuarioRepository = $historicoUsuarioRepository;
        $this->historicoUtilizacaoService = $historicoUtilizacaoService;
    }

    public function inserir(string $mensagem, string $responsavel, int $usuario_id): bool
    {
        $id_historico_utilizacao = $this->historicoUtilizacaoService->inserir($mensagem, $responsavel);
        $historicoUsuario = HistoricoUsuario::create()
            ->setId(null)
            ->setHistorico_utilizacao_id($id_historico_utilizacao)
            ->setUsuario_id($usuario_id);

        $historicoUsuario->setId($this->criar($historicoUsuario));

        return $historicoUsuario->getId();
    }

    public function criar(HistoricoUsuario $historicoUsuario): int
    {
        return $this->historicoUsuarioRepository->criar($historicoUsuario);
    }
}