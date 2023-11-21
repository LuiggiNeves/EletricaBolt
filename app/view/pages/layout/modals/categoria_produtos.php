<div class="modal fade" id="visualizarCategoriaProdutosModal" tabindex="-1" aria-labelledby="visualizarCategoriaProdutosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visualizarCategoriaProdutosModalLabel"><i class="bi bi-grid"></i> Produtos</h5>
                <button type="button" class="btn-close btnFecharModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="min-height: 400px;">
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <label>Produtos: </label>
                        <select id="produtosSemCategoria" class="form-control form-control-sm w-100"></select>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-2">
                        <button class="btn btn-sm btn-primary px-3" id="btnAdicionarProdutoACategoria">Adicionar</button>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12 col-md-12">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-striped" id="produtosDaCategoria">
                                <thead>
                                    <tr>
                                        <th scope="col">Produto</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <input type="hidden" id="categoriaSelecionada" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="OK">OK</button>
            </div>
        </div>
    </div>
</div>