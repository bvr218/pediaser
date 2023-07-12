<!-- `<div style="width:100%">
  <div class="border border-dark">
    <button type="button" class="btn btn-default">M. venta</button>
    <button type="button" class="btn btn-default">M. clientes</button>
    <button type="button" class="btn btn-default">M. productos</button>
  </div>
  <div class="border border-dark bg-primary text-white pr-2 pl-2">
    <h1 class="d-flex align-items-center >
      Facturación de clientes<i class=" fa fa-users ml-2"></i>
    </h1>
  </div>
  <div class="border border-dark bg-light">
    <div class="row d-flex flex-wrap justify-content-center justify-content-lg-start pt-2">
      <div class="col input-group">
        <span class="input-group-addon d-flex align-items-center">
          N° facturas <i class="bi bi-newspaper"></i>
        </span>
        <input type="text" id="n_facturas" class="form-control" />
      </div>
      <div class="col d-flex justify-content-center input-group">
        <span class="input-group-addon d-flex align-items-center">
          Fecha
        </span>
        <input type="date" id="fecha" class="form-control" />
      </div>
      <div class="col d-flex input-group">
        <span class="input-group-addon d-flex align-items-center">
          Nit o cédula
          <i class="bi bi-file-earmark-person"></i>
        </span>
        <input type="text" id="cedula" class="form-control" />
      </div>
    </div>
    <div class="mt-2 ">
      <div class="row pr-2 pl-2 d-flex">
        <div class="col input-group flex-grow-1 pr-0 pl-2">
          <span class="input-group-addon d-flex align-items-center">
            Precio venta <i class="bi bi-newspaper"></i>
          </span>
          <input type="text" id="n_facturas" class="form-control" />
        </div>
        <div class="col input-group flex-grow-1 pl-2 pr-2">
          <span class="input-group-addon d-flex align-items-center">
            Productos <i class="bi bi-newspaper"></i>
          </span>
          <input type="text" id="n_facturas" class="form-control" />
        </div>
      </div>
      <div class="row pr-2 pl-2 d-flex mt-2">
        <div class="col input-group flex-grow-1 pr-0 pl-2">
          <span class="input-group-addon d-flex align-items-center">
            Descuento <i class="bi bi-newspaper"></i>
          </span>
          <input type="text" id="n_facturas" class="form-control" />
        </div>
        <div class="col input-group flex-grow-1 pl-2 pr-2">
          <span class="input-group-addon d-flex align-items-center">
            I.V.A <i class="bi bi-newspaper"></i>
          </span>
          <input type="text" id="n_facturas" class="form-control" />
        </div>
        <div class="col input-group flex-grow-1 pl-2 pr-2">
          <span class="input-group-addon d-flex align-items-center">
            Ipoconsumo <i class="bi bi-newspaper"></i>
          </span>
          <input type="text" id="n_facturas" class="form-control" />
        </div>
      </div>

      <div class="row d-flex flex-wrap justify-content-center justify-content-lg-start mt-3">
        <div class="col d-flex justify-content-center input-group">
          <div>
            <p class="fs-5">R.Fte inventario</p>
          </div>
          <div class="d-flex">
            <div class="d-flex input-group">
              <span class="input-group-addon">% </span>
              <input type="text" id="fecha" class="form-control" placeholder="0.00" />
              <input type="text" id="fecha" class="form-control" placeholder="valor" />
            </div>
          </div>
        </div>
        <div class="col d-flex justify-content-center input-group">
          <div>
            <p class="fs-5">R.Fte servicio</p>
          </div>
          <div class="d-flex">
            <div class="d-flex input-group">
              <span class="input-group-addon">% </span>
              <input type="text" id="fecha" class="form-control" placeholder="0.00" />
              <input type="text" id="fecha" class="form-control" placeholder="valor" />
            </div>
          </div>
        </div>
        <div class="col input-group align-items-end">
          <span class="input-group-addon">R.Fte cree</span>
          <input type="text" id="buscador_punto-venta" class="form-control" />
        </div>
        <div class="col input-group align-items-end">
          <span class="input-group-addon">A.I.U</span>
          <input type="text" id="buscador_punto-venta" class="form-control" />
        </div>
      </div>

      <div class="row d-flex mt-2 mr-2 ml-2 ">
        <textarea class="flex-grow-1" name="descricion" id="descripcion" cols="15" placeholder="Descripción"></textarea>
      </div>

      <div class="row d-flex flex-wrap justify-content-center justify-content-lg-start mt-3">
        <div class="col d-flex justify-content-center input-group">
          <div>
            <p class="fs-5">R.Fte inventario</p>
          </div>
          <div class="d-flex">
            <div class="d-flex input-group">
              <span class="input-group-addon">% </span>
              <input type="text" id="fecha" class="form-control" placeholder="0.00" />
              <input type="text" id="fecha" class="form-control" placeholder="valor" />
            </div>
          </div>
        </div>
        <div class="col d-flex justify-content-center input-group">
          <div>
            <p class="fs-5">R.Fte servicio</p>
          </div>
          <div class="d-flex">
            <div class="d-flex input-group">
              <span class="input-group-addon">% </span>
              <input type="text" id="fecha" class="form-control" placeholder="0.00" />
              <input type="text" id="fecha" class="form-control" placeholder="valor" />
            </div>
          </div>
        </div>
        <div class="col input-group align-items-end">
          <span class="input-group-addon">R.Fte cree</span>
          <input type="text" id="buscador_punto-venta" class="form-control" />
        </div>
        <div class="col input-group align-items-end">
          <span class="input-group-addon">A.I.U</span>
          <input type="text" id="buscador_punto-venta" class="form-control" />
        </div>
      </div>

      <div class="mt-4">
        <div style="max-height: 300px; overflow-y: auto">
          <table style="width:100%" id="table_productos" class="table table-striped">
            <thead>
              <tr>
                <th>Cod.</th>
                <th>Descripción del producto</th>
                <th>Descuento</th>
                <th>Cantidad</th>
                <th>Precio venta</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody style="max-height:400px">

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
                  <h3>0 Clientes</h3>
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
              <div class="col-md-3 d-flex justify-content-center justify-content-xs-start align-items-end">
                <button type="button" class="btn btn-success ml-xs-4 mt-xs-2 ml-md-0 mt-md-0 flex-grow-1">
                  Cobrar <i class="glyphicon glyphicon-ok"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="border border-dark">
            <div class="px-2 py-2">
              <h2 class="fs-3 text-end" style="text-align: end;">$4,200</h2>
              <p class="fs-5 text-end" style="text-align: end;">Subtotal: <span>$4,200</span></p>
            </div>
          </div>
        </div>
      </div>

      <div class="row pr-2 pl-2 mt-sm-2">
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
</div> ` -->
<div class="panel panel-blue panel-usuarios">
  <div class="panel-heading">
    <h4 class="panel-title">Lista Usuarios</h4>
    <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
        <i class="fas fa-expand"></i>
      </a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-reload" onclick="updateusuarios()">
        <i class="fas fa-sync-alt"></i>
      </a>
    </div>
  </div>
  <div class="panel-body">
    <table id="data-registro-clients" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Hola</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            Hola
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
</div>

