<div style="width: 100%">
      <div class="border border-dark">
        <button type="button" class="btn btn-default">M. venta</button>
        <button type="button" class="btn btn-default">M. clientes</button>
        <button type="button" class="btn btn-default">M. productos</button>
      </div>
      <div class="border border-dark bg-danger bg-primary text-white pr-2 pl-2">
        <h1 class="" style="padding: 1rem">
          Productos<i class="fa fa-cart-plus"></i>
        </h1>
      </div>
      <div>
        <h2 style="padding: 1rem">Departamento</h2>
      </div>
      <div
        class="border border-dark bg-light"
        style="display: flex; flex-direction: column"
      >
        <div class="my-2 col-md-8">
          <div class="row pr-2 pl-2">
            <div class="col-md-12">
              <button type="button" class="btn btn-primary">
                Nuevo <i class="glyphicon glyphicon-file"></i>
              </button>
              <button type="button" class="btn btn-primary">
                Modificar <i class="glyphicon glyphicon-pencil"></i>
              </button>
              <button type="button" class="btn btn-primary">
                Eliminar <i class="glyphicon glyphicon-trash"></i>
              </button>
              <button type="button" class="btn btn-primary">
                Departamentos
                <i class="glyphicon glyphicon-circle-arrow-right"></i>
              </button>
              <button type="button" class="btn btn-primary">
                Venta por periodo
                <i class="glyphicon glyphicon-circle-arrow-right"></i>
              </button>
              <button type="button" class="btn btn-primary">
                Promociones
                <i class="glyphicon glyphicon-circle-arrow-right"></i>
              </button>
              <button type="button" class="btn btn-danger">
                Borrar artículo <i class="glyphicon glyphicon-trash"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 2rem">
          <div class="col-xs-6" style="margin-left: 10px">
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                placeholder="Buscar carpetas"
              />
              <span class="input-group-addon">
                <i class="glyphicon glyphicon-search"></i>
              </span>
            </div>
          </div>
          <div>
            <button type="button" class="btn btn-primary">
              <i class="glyphicon glyphicon-plus"></i> Nuevo Departamento
            </button>
          </div>
        </div>

        <div>
          <div
            class="row"
            style="display: flex; column-gap: 10px; margin-top: 2rem"
          >
            <div class="col-md-6">
              <div class="folder-list">
                <div class="folder-item">
                  <i class="glyphicon glyphicon-folder-open"></i>
                  <span>Folder 1</span>
                </div>
                <div class="folder-item">
                  <i class="glyphicon glyphicon-folder-open"></i>
                  <span>Folder 2</span>
                </div>
                <div class="folder-item">
                  <i class="glyphicon glyphicon-folder-open"></i>
                  <span>Folder 3</span>
                </div>
                <div class="folder-item">
                  <i class="glyphicon glyphicon-folder-open"></i>
                  <span>Folder 4</span>
                </div>
                <div class="folder-item">
                  <i class="glyphicon glyphicon-folder-open"></i>
                  <span>Folder 5</span>
                </div>
                <div class="folder-item">
                  <i class="glyphicon glyphicon-folder-open"></i>
                  <span>Folder 6</span>
                </div>
                <div class="folder-item">
                  <i class="glyphicon glyphicon-folder-open"></i>
                  <span>Folder 7</span>
                </div>
                <div class="folder-item">
                  <i class="glyphicon glyphicon-folder-open"></i>
                  <span>Folder 8</span>
                </div>
                <div class="folder-item">
                  <i class="glyphicon glyphicon-folder-open"></i>
                  <span>Folder 9</span>
                </div>
                <div class="folder-item">
                  <i class="glyphicon glyphicon-folder-open"></i>
                  <span>Folder 10</span>
                </div>
              </div>
            </div>
            <div class="">
              <form class="form-group">
                <h2>NUEVO DEPARTAMENTO</h2>
                <div class="form-group">
                  <label for="exampleInputName2">Nombre</label>
                  <input
                    type="text"
                    class="form-control"
                    id="exampleInputName2"
                  />
                </div>
                <div class="row">
                  <div class="col-xs-6">
                    <button type="button" class="btn btn-primary">
                      <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
                      Departamento
                    </button>
                  </div>
                  <div class="col-xs-6">
                    <button type="button" class="btn btn-danger">
                      <i class="glyphicon glyphicon-remove"></i> Cancelar
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <style>
      .folder-list {
        max-height: 300px;
        overflow-y: auto;
        background-color: #f7f7f7;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
      }

      .folder-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        padding: 5px;
        background-color: #fff;
        border-radius: 3px;
        transition: background-color 0.3s ease;
      }

      .folder-item i {
        margin-right: 10px;
      }

      .folder-item span {
        font-size: 16px;
        color: #333;
      }

      .folder-item:hover {
        background-color: #e8f1fc;
        cursor: pointer;
      }
    </style>