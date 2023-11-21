<div class="modal fade" id="visualizarCategoriaModal" tabindex="-1" aria-labelledby="visualizarCategoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visualizarCategoriaModalLabel"><i class="bi bi-grid"></i> Visualizar categoria</h5>
                <button type="button" class="btn-close btnFecharModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="min-height: 400px;">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <label class="mb-1">Nome da categoria: </label>
                        <input class="form-control form-control-sm w-100" id="nomeCategoriaVisualizada" />
                    </div>
                </div>

                <input type="hidden" id="idCategoriaAtual" />
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-success" id="alterarCategoria">
                    Salvar
                </button>
            </div>
        </div>
    </div>
</div>