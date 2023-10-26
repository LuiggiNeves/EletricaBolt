<div class="modal fade" id="cadastrarProdutoModal" tabindex="-1" aria-labelledby="cadastrarProdutoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastrarProdutoModalLabel"><i class="bi bi-box"></i> Cadastrar Produto</h5>
                <button type="button" class="btn-close btnFecharModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="min-height: 400px;">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-8">
                        <div class="col-sm-12 col-md-12 mb-2">
                            <label class="mb-1">Nome: </label>
                            <input type="text" class="form-control w-100" id="nomeDoProduto" />
                        </div>

                        <div class="col-sm-12 col-md-12 mb-2">
                            <label class="mb-1">Descrição: </label>
                            <textarea class="form-control w-100" id="descricaoDoProduto"></textarea>
                        </div>

                        <div class="col-sm-12 col-md-12 mb-2">
                            <label class="mb-1">Preço: </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                                <input type="text" class="form-control numero_decimal" id="precoDoProduto" />
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 mb-2">
                            <label class="mb-1">Selecionar imagem para o Produto:</label>
                            <input type="file" class="form-control w-100" id="imagemDoProduto" onchange="exibirImagem(this)"/>
                        </div>

                        <div class="col-sm-12 col-md-12 my-3 text-center">
                            <div id="imagemContainer" class="rounded border"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="criarProduto">
                    Cadastrar
                </button>
            </div>
        </div>
    </div>
</div>