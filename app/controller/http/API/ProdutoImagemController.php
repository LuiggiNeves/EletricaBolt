<?php

namespace app\controller\http\API;

use app\controller\http\ControllerAbstract;
use app\domain\service\ProdutoImagemService;

require_once '../../../vendor/autoload.php';

class ProdutoImagemController extends ControllerAbstract
{
    private $produtoImagemService;

    public function __construct(
        ProdutoImagemService $produtoImagemService
    ) {
        $this->produtoImagemService = $produtoImagemService;
    }

    public function criar($dados)
    {
        return $this->respondeComDados(
            [
                "dados" => [
                    "produto" => $this->produtoImagemService->criar($dados)
                ],
                "mensagem" => "Imagem cadastrada com sucesso!"
            ],
            201
        );
    }

    public function removePorId($dados)
    {
        $id = intval($dados["id"]);

        return $this->respondeComDados(
            [
                "dados" => [
                    "produtos" => $this->produtoImagemService->removePorId($id)
                ],
                "mensagem" => ""
            ],
            200
        );
    }
}
