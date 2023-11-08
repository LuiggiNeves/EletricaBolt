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
            throw new DomainHttpException("Nome de categoria já está em uso.", 409);
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

    public function leDadosPorId(int $id): array
    {
        $categoria = $this->lePorId($id);
        if ($categoria == null) {
            throw new DomainHttpException("Categoria não encontrada", 404);
        }

        return $categoria->toArray();
    }

    public function lePorId(int $id): ?Categoria
    {
        return $this->categoriaRepository->lePorId($id);
    }
}
