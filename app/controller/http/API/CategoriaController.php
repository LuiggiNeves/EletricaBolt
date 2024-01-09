<?php

namespace app\controller\http\API;

use app\controller\http\ControllerAbstract;
use app\domain\service\CategoriaService;
use app\util\sql\PesquisaDeCategorias;
use app\util\sql\PesquisaQuantidadeDeCategorias;

require_once '../../../vendor/autoload.php';

class CategoriaController extends ControllerAbstract
{
    private $categoriaService;

    private $pesquisaDeCategorias;
    private $pesquisaQuantidadeDeCategorias;

    public function __construct(
        CategoriaService $categoriaService,

        PesquisaDeCategorias $pesquisaDeCategorias,
        PesquisaQuantidadeDeCategorias $pesquisaQuantidadeDeCategorias
    ) {
        $this->categoriaService = $categoriaService;

        $this->pesquisaDeCategorias = $pesquisaDeCategorias;
        $this->pesquisaQuantidadeDeCategorias = $pesquisaQuantidadeDeCategorias;
    }

    public function criar($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "categoria" => $this->categoriaService->criar($dados)
                ],
                "mensagem" => "Categoria cadastrada com sucesso!"
            ],
            201
        );
    }

    public function listar($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "categorias" => $this->categoriaService->listar()
                ],
                "mensagem" => ""
            ],
            200
        );
    }

    public function lePorId($dados)
    {
        $id = intval($dados["id"]);

        return $this->respondeComDados(
            [
                "dados" => [
                    "categoria" => $this->categoriaService->leDadosPorId($id)
                ],
                "mensagem" => ""
            ],
            200
        );
    }

    public function altera($dados)
    {
        $id = intval($dados["id"]);
        $nome = $dados["nome"];

        return $this->respondeComDados(
            [
                "dados" => [
                    "atualizado" => $this->categoriaService->altera($id, $nome)
                ],
                "mensagem" => "Categoria atualizada com sucesso!"
            ],
            200
        );
    }

    public function pesquisaCategorias($dados)
    {
        $dados_de_pesquisa = json_decode($dados["dados-de-pesquisa"], true);

        $query = $this->pesquisaDeCategorias->montaQuery($dados_de_pesquisa);
        $queryQtd = $this->pesquisaQuantidadeDeCategorias->montaQuery($dados_de_pesquisa);

        return $this->respondeComDados(
            [
                "dados" => [
                    "categorias" => $this->categoriaService->executaQueryEBuscaTudo($query),
                    "qtd_categorias" => $this->categoriaService->executaQueryEBuscaTudo($queryQtd)[0][0]
                ],
                "mensagem" => ""
            ],
            200
        );
    }
}
