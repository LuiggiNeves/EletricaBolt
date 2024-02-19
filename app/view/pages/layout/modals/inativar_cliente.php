<div class="modal fade" id="inativarClienteModal" tabindex="-1" aria-labelledby="inativarClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inativarClienteModalLabel">Inativar cliente</h5>
                <button type="button" class="btn-close btnFecharModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="min-height: 400px;">

                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-12 mb-3 alert alert-secondary">
                        Ao inativar o cliente, ele não conseguirá acessar os produtos
                    </div>

                    <div class="col-sm-12 col-md-5 border bg-danger text-white p-3 mb-3 text-center btnInativarCliente" style="cursor: pointer;">
                        <h3><i class="bi bi-person-fill-dash"></i></h3>
                        Inativar cliente
                    </div>
                </div>

                <input type="hidden" id="idClienteSelecionadoInativar" />
            </div>
        </div>
    </div>
</div>