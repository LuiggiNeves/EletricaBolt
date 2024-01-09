<?php

namespace app\controller\http\API;

use app\controller\http\ControllerAbstract;
use app\domain\service\ProdutoService;
use app\util\sql\PesquisaDeProdutos;
use app\util\sql\PesquisaQuantidadeDeProdutos;

require_once '../../../vendor/autoload.php';

class ProdutoController extends ControllerAbstract
{
    private $produtoService;

    private $pesquisaDeProdutos;
    private $pesquisaQuantidadeDeProdutos;

    public function __construct(
        ProdutoService $produtoService,
        PesquisaDeProdutos $pesquisaDeProdutos,
        PesquisaQuantidadeDeProdutos $pesquisaQuantidadeDeProdutos
    ) {
        $this->produtoService = $produtoService;
        $this->pesquisaDeProdutos = $pesquisaDeProdutos;
        $this->pesquisaQuantidadeDeProdutos = $pesquisaQuantidadeDeProdutos;
    }

    public function criar($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "produto" => $this->produtoService->criar($dados)
                ],
                "mensagem" => "Produto cadastrado com sucesso!"
            ],
            201
        );
    }

    public function listar($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "produtos" => $this->produtoService->listar()
                ],
                "mensagem" => ""
            ],
            200
        );
    }

    public function listarSemCategoria($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "produtos" => $this->produtoService->listarSemCategoria()
                ],
                "mensagem" => ""
            ],
            200
        );
    }

    public function pesquisaProdutos($dados)
    {
        $dados_de_pesquisa = json_decode($dados["dados-de-pesquisa"], true);

        $query = $this->pesquisaDeProdutos->montaQuery($dados_de_pesquisa);
        $queryQtd = $this->pesquisaQuantidadeDeProdutos->montaQuery($dados_de_pesquisa);

        return $this->respondeComDados(
            [
                "dados" => [
                    "produtos" => $this->produtoService->executaQueryEBuscaTudo($query),
                    "qtd_produtos" => $this->produtoService->executaQueryEBuscaTudo($queryQtd)[0][0]
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
                    "produto" => $this->produtoService->leDadosPorId($id)
                ],
                "mensagem" => ""
            ],
            200
        );
    }

    public function altera($dados)
    {
        $id = intval($dados["id"]);

        return $this->respondeComDados(
            [
                "dados" => [
                    "produto" => $this->produtoService->altera($id, $dados)
                ],
                "mensagem" => "Produto alterado com sucesso!"
            ],
            200
        );
    }

    public function quantidadeDeAcessoAProdutos($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "qtd" => $this->produtoService->quantidadeDeAcessoAProdutos()
                ],
                "mensagem" => ""
            ],
            200
        );
    }

    public function listaProdutosMaisAcessados($dados)
    {
        $qtd = isset($dados["qtd"]) ? intval($dados["qtd"]) : 5;

        return $this->respondeComDados(
            [
                "dados" => [
                    "produtos" => $this->produtoService->listaProdutosMaisAcessados($qtd)
                ],
                "mensagem" => ""
            ],
            200
        );
    }
}
