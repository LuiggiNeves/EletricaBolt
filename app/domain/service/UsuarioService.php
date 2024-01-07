<?php

namespace app\domain\service;

use app\domain\auth\AuthUsuario;
use app\domain\exception\http\DomainHttpException;
use app\domain\model\Usuario;
use app\domain\repository\UsuarioRepository;

class UsuarioService extends ServiceAbstract
{
    private $usuarioRepository;

    private $authUsuario;

    public function __construct(
        UsuarioRepository $usuarioRepository,
        AuthUsuario $authUsuario
    ) {
        $this->usuarioRepository = $usuarioRepository;
        $this->authUsuario = $authUsuario;
    }

    public function criar(array $dados): array
    {
        $usuario = Usuario::create()->setNome($dados["nome"])
            ->setEmail($dados["email"])
            ->setSenha($dados["senha"]);

        return $usuario->setId($this->usuarioRepository->criar($usuario))->toArray();
    }

    public function login(string $email, string $senha): bool
    {
        $usuario = $this->lePorEmail($email);
        if ($usuario == null || !password_verify($senha, $usuario->getSenha())) {
            throw new DomainHttpException("Senha ou e-mail incorretos.");
        }

        $this->authUsuario->criar($usuario);
        return true;
    }

    public function lePorEmail(string $email): ?Usuario
    {
        return $this->usuarioRepository->lePorEmail($email);
    }
}
