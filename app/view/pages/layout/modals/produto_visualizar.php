<div class="modal fade" id="visualizarProdutoModal" tabindex="-1" aria-labelledby="visualizarProdutoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visualizarProdutoModalLabel"><i class="bi bi-box"></i> Visualizar Produto</h5>
                <button type="button" class="btn-close btnFecharModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="min-height: 400px;">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-8">
                        <div class="col-sm-12 col-md-12 mb-2">
                            <label class="mb-1">Nome: </label>
                            <input type="text" class="form-control form-control-sm w-100" id="alterarNomeDoProduto" />
                        </div>

                        <div class="col-sm-12 col-md-12 mb-2">
                            <label class="mb-1">Descrição: </label>
                            <textarea class="form-control form-control-sm w-100" id="alterarDescricaoDoProduto"></textarea>
                        </div>

                        <div class="col-sm-12 col-md-12 mb-2">
                            <label class="mb-1">Preço: </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                                <input type="text" class="form-control form-control-sm numero_decimal" id="alterarPrecoDoProduto" />
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 mb-2">
                            <label class="mb-1">Selecionar imagem para o Produto: <small>(Caso não altere, a imagem permanecerá a mesma)</small></label>
                            <input type="file" class="form-control form-control-sm w-100" id="alterarImagemDoProduto" onchange="exibirImagem(this, 'alterarImagemContainer')" />
                        </div>

                        <div class="col-sm-12 col-md-12 my-3 text-center">
                            <div id="alterarImagemContainer" class="rounded border"></div>
                        </div>

                        <input type="hidden" id="idDoProdutoSelecionado" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-success" id="alterarProduto">
                    Alterar
                </button>
            </div>
        </div>
    </div>
</div>