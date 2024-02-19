<div class="modal fade" id="alterarAcessoProduto" tabindex="-1" aria-labelledby="alterarAcessoProdutoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alterarAcessoProdutoLabel">Acesso a produtos</h5>
                <button type="button" class="btn-close btnFecharModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="min-height: 400px;">

                <div class="row">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <span>Deseja permitir o cliente selecionado visualizar o preço dos produtos?</span>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="permitirVerProduto" id="permitirVerProdutoSim" value="Sim">
                            <label class="form-check-label" for="permitirVerProdutoSim">
                                Sim
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="permitirVerProduto" id="permitirVerProdutoNao" value="Não">
                            <label class="form-check-label" for="permitirVerProdutoNao">
                                Não
                            </label>
                        </div>
                    </div>
                </div>

                <input type="hidden" id="clienteSelecionadoAlterarAcesso" />
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-success" id="btnSalvarAcesso">
                    Salvar
                </button>
            </div>
        </div>
    </div>
</div>