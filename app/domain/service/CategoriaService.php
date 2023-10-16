<?php

namespace app\domain\service;

use app\domain\exception\http\DomainHttpException;
use app\domain\model\Categoria;
use app\domain\repository\CategoriaRepository;

class CategoriaService extends ServiceAbstract
{
    private $categoriaRepository;

    public function __construct(
        CategoriaRepository $categoriaRepository
    ) {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function criar(array $dados): array
    {
        if ($this->lePorNome($dados["nome"]) != null) {
            throw new DomainHttpException("Nome de categoria já está em uso.", 404);
        }

        $categoria = Categoria::create()->setNome($dados["nome"]);

        return $categoria->setId($this->categoriaRepository->criar($categoria))->toArray();
    }

    public function lePorNome(string $nome): ?Categoria
    {
        return $this->categoriaRepository->lePorNome($nome);
    }

    public function listar(): array
    {
        return $this->categoriaRepository->listar();
    }
}
