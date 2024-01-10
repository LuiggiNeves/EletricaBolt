<div class="modal fade" id="cadastrarProdutoModal" tabindex="-1" aria-labelledby="cadastrarProdutoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastrarProdutoModalLabel"><i class="bi bi-box"></i> Cadastrar Produto</h5>
                <button type="button" class="btn-close btnFecharModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="min-height: 400px;">
                <form class="naoEnvia" id="formularioCadastrarProduto" novalidate>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-12">
                            <div class="row divDadosDoProduto mb-4">
                                <div class="col-sm-12 col-md-12 mb-4">
                                    <small class="mb-1"><b>Nome: <span class="asteriscoObrigatorio">*</span></b></small>
                                    <input type="text" class="form-control form-control-sm w-100" id="nomeDoProduto" required />
                                </div>

                                <div class="col-sm-12 col-md-12 mb-4">
                                    <small class="mb-1"><b>Categoria: <span class="asteriscoObrigatorio">*</span></b></small>
                                    <select class="form-control form-control-sm w-100 categoriaDoProduto" id="categoriaDoProduto" required>
                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-12 mb-4">
                                    <small class="mb-1"><b>Descrição: <span class="asteriscoObrigatorio">*</span></b></small>
                                    <textarea class="form-control form-control-sm w-100" id="descricaoDoProduto" rows="4" required></textarea>
                                </div>

                                <div class="col-sm-12 col-md-12 mb-4">
                                    <small class="mb-1"><b>Preço: <span class="asteriscoObrigatorio">*</span></b></small>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">R$</span>
                                        <input type="text" class="form-control form-control-sm numero_decimal" id="precoDoProduto" required />
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 mb-4">
                                    <small class="mb-1"><b>Código de referência:</b></small>
                                    <input type="text" class="form-control form-control-sm w-100" id="codigoDeReferenciaDoProduto" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-success" id="criarProduto">
                    Cadastrar
                </button>
            </div>
        </div>
    </div>
</div>