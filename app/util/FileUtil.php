<?php

namespace app\util;

use app\domain\exception\DomainException;

class FileUtil
{

    public function FileUtil()
    {
    }

    public function editaArquivo(string $arquivo, string $conteudo): bool
    {
        if (!file_exists($arquivo)) {
            return false;
        }

        $arquivoParaEditar = fopen($arquivo, "w");
        fwrite($arquivoParaEditar, $conteudo);
        fclose($arquivoParaEditar);

        return true;
    }

    public function leArquivo(string $arquivo): string
    {
        if (!file_exists($arquivo)) {
            return "";
        }

        $linhas = file($arquivo);
        $i = 0;

        $conteudo = "";

        foreach ($linhas as $linha) {
            $i += 1;
            $conteudo .= $linha;
        }

        return $conteudo;
    }

    public function copiaDeUmArquivoParaOutro(string $arquivoQueSeriaCopiado, string $arquivoQueReceberaCopia): bool
    {
        $conteudoArquivoQueSeriaCopiado = $this->leArquivo($arquivoQueSeriaCopiado);

        return $this->editaArquivo($arquivoQueReceberaCopia, $conteudoArquivoQueSeriaCopiado);
    }

    public function insereImagem(array $dadosDoArquivo, string $path): string
    {
        $extensoesValidas = array("jpeg", "jpg", "png");
        $temporario = explode(".", $dadosDoArquivo["name"]);
        $extensao_arquivo = end($temporario);
        if (
            ($dadosDoArquivo["size"] < 10000000000) //Aprox. 100kb pode ser carregado
            && in_array($extensao_arquivo, $extensoesValidas)
        ) {
            if ($dadosDoArquivo["error"] > 0) {
                throw new DomainException("Houve um erro ao tentar fazer o upload da imagem");
            } else {
                $nomeImagem = md5(time()) . "." . $extensao_arquivo;
                $sourcePath = $dadosDoArquivo["tmp_name"];
                $targetPath = $path . $nomeImagem;
                move_uploaded_file($sourcePath, $targetPath);

                return $nomeImagem;
            }
        }

        throw new DomainException("Tipo inválido");
    }

    public function insereArquivo(array $dadosDoArquivo, string $path): string
    {
        $nome_do_arquivo = $dadosDoArquivo["name"];
        $tmp = $dadosDoArquivo["tmp_name"];
        $error = $dadosDoArquivo["error"];

        $extensoes_validas = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'pptx', 'xls', 'xlsx');
        $extensao = strtolower(pathinfo($nome_do_arquivo, PATHINFO_EXTENSION));
        $arquivo_final = rand(1000, 1000000) . strtolower($nome_do_arquivo);

        if (in_array($extensao, $extensoes_validas)) {
            $path = $path . strtolower($arquivo_final);
            if (move_uploaded_file($tmp, $path)) {
                return $arquivo_final;
            } else {
                throw new DomainException("Houve um erro ao tentar fazer o upload do arquivo");
            }
        }

        throw new DomainException("Tipo inválido");
    }

    public function excluiArquivo(string $arquivo): bool
    {
        if (file_exists($arquivo)) {
            return unlink($arquivo);
        }

        return true;
    }
}