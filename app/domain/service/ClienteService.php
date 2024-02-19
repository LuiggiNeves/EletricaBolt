<?php

namespace app\domain\service;

use app\domain\auth\AuthCliente;
use app\domain\auth\AuthUsuario;
use app\domain\exception\http\DomainHttpException;
use app\domain\model\Cliente;
use app\domain\repository\ClienteRepository;

class ClienteService extends ServiceAbstract
{
    private $clienteRepository;

    private $authCliente;

    public function __construct(
        ClienteRepository $clienteRepository,

        AuthCliente $authCliente
    ) {
        $this->clienteRepository = $clienteRepository;

        $this->authCliente = $authCliente;
    }

    public function criar(array $dados): array
    {
        if ($this->lePorCelular($dados["celular"]) != null) {
            throw new DomainHttpException("Celular já está em uso!", 409);
        }

        $cliente = Cliente::create()->setNome($dados["nome"])
            ->setCelular($dados["celular"])
            ->setData_criado(date("Y-m-d"))
            ->setHora_criado(date("H:i:s"))
            ->setStatus("Ativo")
            ->setPode_ver_preco("Sim");

        $this->authCliente->criar($cliente);

        return $cliente->setId($this->clienteRepository->criar($cliente))->toArray();
    }

    public function login(string $celular): array
    {
        $cliente = $this->lePorCelular($celular);
        if ($cliente == null || $cliente->getStatus() == "Inativo") {
            throw new DomainHttpException("Cliente não encontrado.");
        }

        $_SESSION["pode_ver_preco"] = $cliente->getPode_ver_preco();

        $this->authCliente->criar($cliente);

        return $cliente->toArray();
    }

    public function lePorCelular(string $celular): ?Cliente
    {
        return $this->clienteRepository->lePorCelular($celular);
    }

    public function lePorId(int $id): ?Cliente
    {
        return $this->clienteRepository->lePorId($id);
    }

    public function listar(): array
    {
        return $this->clienteRepository->listar();
    }

    public function altera(int $id, string $status): bool
    {
        $cliente = $this->lePorId($id);
        if ($cliente == null) {
            throw new DomainHttpException("Cliente não encontrado", 404);
        }

        $cliente->setStatus($status);

        return $this->clienteRepository->altera($cliente);
    }

    public function alteraPodeVerPreco(int $id, string $pode_ver_preco): bool
    {
        $cliente = $this->lePorId($id);
        if ($cliente == null) {
            throw new DomainHttpException("Cliente não encontrado", 404);
        }

        $cliente->setPode_ver_preco($pode_ver_preco);

        return $this->clienteRepository->altera($cliente);
    }
}
