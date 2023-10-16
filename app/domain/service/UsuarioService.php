<?php

namespace app\domain\service;

use app\domain\model\Usuario;
use app\domain\repository\UsuarioRepository;

class UsuarioService extends ServiceAbstract
{
    private $usuarioRepository;

    public function __construct(
        UsuarioRepository $usuarioRepository
    ) {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function criar(array $dados): array
    {
        $usuario = Usuario::create()->setNome($dados["nome"])
            ->setEmail($dados["email"])
            ->setSenha($dados["senha"]);

        return $usuario->setId($this->usuarioRepository->criar($usuario))->toArray();
    }
}
