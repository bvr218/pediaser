<div style="width: 100%">
      <div class="border border-dark">
        <button type="button" class="btn btn-default">M. venta</button>
        <button type="button" class="btn btn-default">M. clientes</button>
        <button type="button" class="btn btn-default">M. productos</button>
      </div>
      <div class="border border-dark bg-danger bg-primary text-white pr-2 pl-2">
        <h1 class="" style="padding: 1rem">
          Nuevo producto<i class="fa fa-cart-plus"></i>
        </h1>
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
      </div>
      <div class="col-md-7" style="margin-top: 2rem">
        <form
          style="border: 1px solid black; border-radius: 5px; padding: 2rem"
        >
          <div>
            <h1 class="text-center">Modificar producto</h1>
            <p class="text-center">Código del producto</p>
          </div>
          <div class="form-group text-center">
            <input type="text" class="form-control" />
          </div>
          <div class="text-center">
            <button
              class="btn btn-primary"
              type="button"
              data-toggle="modal"
              data-target="#modalForm"
              style="width: 100%"
            >
              Modificar
            </button>
          </div>
        </form>
      </div>
    </div>