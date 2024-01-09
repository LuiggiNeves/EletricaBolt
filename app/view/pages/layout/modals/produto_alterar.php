<div class="modal fade" id="visualizarProdutoModal" tabindex="-1" aria-labelledby="visualizarProdutoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visualizarProdutoModalLabel"><i class="bi bi-box"></i> Visualizar Produto</h5>
                <button type="button" class="btn-close btnFecharModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="min-height: 400px;">
                <form class="naoEnvia" id="formularioAlterarProduto" novalidate>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-8">
                            <div class="row divDadosDoProduto">
                                <div class="col-sm-12 col-md-12 mb-4">
                                    <small class="mb-1"><b>Nome: <span class="asteriscoObrigatorio">*</span></b></small>
                                    <input type="text" class="form-control form-control-sm w-100" id="alterarNomeDoProduto" required />
                                </div>

                                <div class="col-sm-12 col-md-12 mb-4">
                                    <small class="mb-1"><b>Categoria: <span class="asteriscoObrigatorio">*</span></b></small>
                                    <select class="form-control form-control-sm w-100 categoriaDoProduto" id="alterarCategoriaDoProduto" required>
                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-12 mb-4">
                                    <small class="mb-1"><b>Descrição: <span class="asteriscoObrigatorio">*</span></b></small>
                                    <textarea class="form-control form-control-sm w-100" id="alterarDescricaoDoProduto" required></textarea>
                                </div>

                                <div class="col-sm-12 col-md-12 mb-4">
                                    <small class="mb-1"><b>Preço: <span class="asteriscoObrigatorio">*</span></b></small>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">R$</span>
                                        <input type="text" class="form-control form-control-sm numero_decimal" id="alterarPrecoDoProduto" required />
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 mb-4">
                                    <small class="mb-1"><b>Código de referência: </b></small>
                                    <input type="text" class="form-control form-control-sm w-100" id="alterarCodigoDeReferenciaDoProduto" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="col-sm-12 col-md-12 mb-4">
                                <small class="mb-1"><b>Selecionar imagem para o Produto: </b></small>
                                <input type="file" class="form-control form-control-sm w-100" id="alterarImagemDoProduto" onchange="exibirImagem(this, 'alterarImagemContainer')" />
                            </div>

                            <div class="col-sm-12 col-md-12 my-3 text-center">
                                <div id="alterarImagemContainer" class="rounded border"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-success" id="alterarProduto">
                    Alterar
                </button>
            </div>
        </div>
    </div>
</div>