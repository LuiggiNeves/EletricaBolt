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
            ->setStatus("Ativo");

        return $cliente->setId($this->clienteRepository->criar($cliente))->toArray();
    }

    public function login(string $celular, string $senha): bool
    {
        $cliente = $this->lePorCelular($celular);
        if ($cliente == null || !password_verify($senha, $cliente->getCelular()) || $cliente->getStatus() == "Inativo") {
            throw new DomainHttpException("Senha ou e-mail incorretos.");
        }

        $this->authCliente->criar($cliente);
        
        return true;
    }

    public function lePorCelular(string $celular): ?Cliente
    {
        return $this->clienteRepository->lePorCelular($celular);
    }
}
