<div style="width:100%">
  <div class="border border-dark">
    <button type="button" class="btn btn-default">M. venta</button>
    <button type="button" class="btn btn-default">M. clientes</button>
    <button type="button" class="btn btn-default">M. productos</button>
  </div>
  <div class="border border-dark bg-danger bg-primary text-white pr-2 pl-2">
    <h1 class="">
      Facturación de punto de venta<i class="glyphicon glyphicon-shopping-cart"></i>
    </h1>
  </div>
  <div class="border border-dark bg-light">
    <form id="add-product" method="post" action="/">
      @csrf
      <div class="row d-flex">
        <div class="col-md-9">
          <div class="input-group">
            <span class="input-group-addon">Código producto <i class="fa fa-barcode ml-1"></i></span>
            <span class="select2-container select2-container--default select2-container--open" style="position: relative;">
              <span class="select2-dropdown select2-dropdown--below" dir="ltr" style="width: 660.266px;">
                <span class="select2-search select2-search--dropdown m-0 p-0">
                    <input id="n-facturas" class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" aria-controls="select2-n_facturas-results">
                  </span>
                  <span class="select2-results d-none">
                    <ul class="select2-results__options" role="listbox" id="select2-n_facturas-results" aria-expanded="true" aria-hidden="false">
                      
                    </ul>
                  </span>
                </span>
              </span>
            </select>
          </div>
        </div>
        <div class="col-md-3 d-flex align-items-end">
          <div class="w-100">
            <button type="submit" class="btn btn-success">
              Enter - agregar producto <i class="fa fa-plus-circle"></i>
            </button>
          </div>
        </div>
      </div>
    </form>
    <div class="my-2 ">
      <div class="row pr-2 pl-2">
        <div class="col-md-12">
          <button type="button" class="btn btn-primary">
            INS varios <i class="glyphicon glyphicon-file"></i>
          </button>
          <button type="button" class="btn btn-primary">
            Art común<i class="glyphicon glyphicon-file"></i>
          </button>
          <button type="button" class="btn btn-primary">
            Entradas <i class="glyphicon glyphicon-circle-arrow-left"></i>
          </button>
          <button type="button" class="btn btn-primary">
            Salidas <i class="glyphicon glyphicon-circle-arrow-right"></i>
          </button>
          <button type="button" class="btn btn-danger">
            Borrar artículo <i class="glyphicon glyphicon-trash"></i>
          </button>
        </div>
      </div>

      <div class="mt-3">
        
        <div style="max-height: 300px; overflow-y: auto">
          <table style="width:100%" id="table_productos"  class="table table-striped">
            <thead>
              <tr>
                <th>Cod.</th>
                <th>Descripción del producto</th>
                <th>Precio venta</th>
                <th>Cantidad</th>
                <th>Importe</th>
                <th>Existencia</th>
              </tr>
            </thead>
            <tbody  style="max-height:400px" >
              
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="border border-dark">
            <div class="row">
              <div class="col-md-9">
                <div class="pr-2 pl-2">
                  <h3>20 productos en la venta actual</h3>
                  <div class="col-md-12">
                    <button type="button" class="btn btn-secondary">
                      Cambiar <i class="glyphicon glyphicon-repeat"></i>
                    </button>
                    <button type="button" class="btn btn-secondary">
                      Pendiente <i class="glyphicon glyphicon-hourglass"></i>
                    </button>
                    <button type="button" class="btn btn-secondary">
                      Eliminar <i class="glyphicon glyphicon-trash"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center">
                <button type="button" class="btn btn-success">
                  Cobrar <i class="glyphicon glyphicon-ok"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="border border-dark">
            <div class="px-2 py-2">
              <h2 class="fs-3">$4,200</h2>
              <p class="fs-5">Subtotal: <span>$4,200</span></p>
            </div>
          </div>
        </div>
      </div>

      <div class="row pr-2 pl-2">
        <div class="col-md-4">
          <div class="input-group">
            <span class="input-group-addon">Recibido</span>
            <input type="text" id="fecha" class="form-control" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="input-group">
            <span class="input-group-addon">Cambio</span>
            <input type="text" id="cedula" class="form-control" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="input-group">
            <span class="input-group-addon">Total</span>
            <input type="text" id="buscador_punto-venta" class="form-control" />
          </div>
        </div>
      </div>

      <div class="row mt-3 pr-2 pl-2">
        <div class="col-md-3">
          <button type="button" class="btn btn-success btn-block mb-2">
            Guardar <i class="glyphicon glyphicon-folder-open"></i>
          </button>
        </div>
        <div class="col-md-3">
          <button type="button" class="btn btn-secondary btn-block mb-2">
            Imprimir <i class="glyphicon glyphicon-print"></i>
          </button>
        </div>
        <div class="col-md-3">
          <button type="button" class="btn btn-primary btn-block mb-2">
            Ventas y devoluciones del día <i class="glyphicon glyphicon-shopping-cart"></i>
          </button>
        </div>
        <div class="col-md-3">
          <button type="button" class="btn btn-danger btn-block mb-2">
            Salir <i class="glyphicon glyphicon-arrow-left"></i>
          </button>
        </div>
      </div>

    </div>
  </div>
</div>