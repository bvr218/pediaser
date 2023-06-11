<!-- <div style="width:100%">
  <div class="border border-dark">
    <button type="button" class="btn btn-default">M. venta</button>
    <button type="button" class="btn btn-default">M. clientes</button>
    <button type="button" class="btn btn-default">M. productos</button>
  </div>
  <div class="border border-dark bg-danger bg-primary text-white pr-2 pl-2">
    <h1 class="">
      Facturación de punto de venta<i class="fa fa-cart-plus"></i>
    </h1>
  </div>
  <div class="border border-dark bg-light">
    <form id="add-product" method="post" action="/">
      @csrf
      <div class="row d-flex">
        <div class="col-md-9">
          <div class="input-group" style="display: flex;">
            <span class="input-group-addon">Código producto <i class="fa fa-barcode ml-1"></i></span>
            <span class="select2-container select2-container--default select2-container--open" style="flex-grow: 1;">
              <span class="select2-dropdown select2-dropdown--below" dir="ltr">
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
            <button type="submit" class="btn btn-success d-flex align-items-center">
              Enter - agregar producto <i class="fa fa-plus-circle ml-1"></i>
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
          <table style="width:100%" id="table_productos" class="table table-striped">
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
                  <h3>20 productos</h3>
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
</div> -->

<!-- TABLA DE CLIENTES -->

<!-- <div style="width:100%">
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
</div> -->

<!-- TABLA PRODUCTOS -->

<!-- <div style="width: 100%">
  <div class="border border-dark">
    <button type="button" class="btn btn-default">M. venta</button>
    <button type="button" class="btn btn-default">M. clientes</button>
    <button type="button" class="btn btn-default">M. productos</button>
  </div>
  <div class="border border-dark bg-primary text-white pr-2 pl-2">
    <h1 class="">
      Productos <i class="fa fa-cart-plus"></i>
    </h1>
  </div>
  <div class="border border-dark bg-light">
    <form class="ml-xs-1 mr-xs-1" id="add-product" method="post" action="/">
      <div class="row d-flex pt-2 pt-xs-0">
        <div class="col-md-3">
          <div class="input-group mt-xs-2">
            <span class="input-group-addon">Código producto <i class="fa fa-barcode ml-1"></i></span>
            <input type="text" id="codigo_producto" class="form-control mr-xs-2" placeholder="Código" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="input-group mt-xs-2">
            <span class="input-group-addon">Cantidad</span>
            <input type="text" id="cantidad_producto" class="form-control mr-xs-2" placeholder="Cantidad" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="input-group mt-xs-2">
            <span class="input-group-addon">Descripción</span>
            <input type="text" id="descripcion_producto" class="form-control mr-xs-2" placeholder="Descripción" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="input-group mt-xs-2">
            <span class="input-group-addon">Precio</span>
            <input type="text" id="precio_producto" class="form-control mr-xs-2" placeholder="Precio" />
          </div>
        </div>
        <div class="col-md-3 mt-xs-2">
          <button type="submit" class="btn btn-success btn-block mr-2">
            Agregar producto <i class="fa fa-plus-circle ml-1"></i>
          </button>
        </div>
      </div>
    </form>
    <div class="my-2">
      <div class="row pr-2 pl-2">
        <div class="col-md-12">
          <button type="button" class="btn btn-danger">
            Borrar producto <i class="glyphicon glyphicon-trash"></i>
          </button>
        </div>
      </div>
      <div class="mt-3">
        <div style="max-height: 300px; overflow-y: auto">
          <table style="width: 100%" id="table_productos" <table style="width: 100%" id="table_productos" class="table table-striped">
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
            <tbody style="max-height: 400px">

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
                  <h3>20 productos</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="border border-dark">
            <div class="px-2 py-2">
              <h2 class="fs-3 text-end" style="text-align: end;">$4,200</h2>
            </div>
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
          <button type="button" class="btn bg-success btn-block mb-2">
            Imprimir <i class="glyphicon glyphicon-print"></i>
          </button>
        </div>
        <div class="col-md-3">
          <button type="button" class="btn btn-danger btn-block mb-2">
            Cancelar <i class="glyphicon glyphicon-remove"></i>
          </button>
        </div>
        <div class="col-md-3">
          <button type="button" class="btn btn-warning btn-block mb-2">
            Limpiar <i class="glyphicon glyphicon-erase"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div> -->

<!-- INVENTARIO -->
<div class="container border border-dark">
  <h2>Módulo de Control de Inventario de Medicamentos</h2>
  <div class="container">
    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarModal">
      Agregar Producto
    </button>

    <!-- Modal para agregar producto -->
    <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="agregarModalLabel">Agregar Producto</h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del producto">
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" placeholder="Ingrese la descripción del producto"></textarea>
              </div>
              <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" placeholder="Ingrese la cantidad de productos">
              </div>
              <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" placeholder="Ingrese el precio del producto">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Agregar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Buscador -->
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Buscar medicamento...">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">Buscar</button>
        </span>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="product-container">
        <div class="product-image">
          <img src="https://via.placeholder.com/200x200" alt="Medicamento 1" class="img-responsive">
        </div>
        <h4>Medicamento 1</h4>
        <div class="product-description">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer consequat turpis sit amet mi faucibus, eget congue erat lobortis.
        </div>
        <p class="mb-0"><strong>Cantidad:</strong> 8</p>
        <p><strong>Precio*1:</strong> 1200</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-container">
        <div class="product-image">
          <img src="https://via.placeholder.com/200x200" alt="Medicamento 2" class="img-responsive">
        </div>
        <h4>Medicamento 2</h4>
        <div class="product-description">
          Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
        </div>
        <p class="mb-0"><strong>Cantidad:</strong> 8</p>
        <p><strong>Precio*:1</strong> 1200</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-container">
        <div class="product-image">
          <img src="https://via.placeholder.com/200x200" alt="Medicamento 3" class="img-responsive">
        </div>
        <h4>Medicamento 3</h4>
        <div class="product-description">
          Integer consequat turpis sit amet mi faucibus, eget congue erat lobortis. Nulla facilisi. Cras luctus, nunc et dapibus commodo, mauris ligula condimentum risus, vel malesuada justo dui vel ligula.
        </div>
        <p class="mb-0"><strong>Cantidad:</strong> 8</p>
        <p><strong>Precio*1:</strong> 1200</p>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#openModalBtn').click(function() {
      $('#agregarModal').modal('show');
    });
  });
</script>
