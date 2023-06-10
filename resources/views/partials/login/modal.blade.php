<div class="modal" id="modalrecover" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Recuperar Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="recoverfrm" method="post">
                <div class="modal-body">
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-4 text-right">Correo Electrónico</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control m-b-5" name="mail" required autofocus>
                            <small class="f-s-12 text-grey-darker">Solo se podrá recuperar su contraseña si ha
                                configurado un correo en su cuenta.</small>
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        @section("captcha")
                        @show
                        <div class="col-md-8">
                            <input type="number" class="form-control m-b-5" name="cap" required>
                            <small class="f-s-12 text-grey-darker">Ingrese los números.</small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>