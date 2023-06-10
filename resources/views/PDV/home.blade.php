<div class="container-fluid">
    <div class="border border-dark px-2 py-2">
      <button type="button" class="btn btn-secondary">M. venta</button>
      <button type="button" class="btn btn-secondary">M. clientes</button>
      <button type="button" class="btn btn-secondary">M. productos</button>
    </div>
    <div class="border border-dark bg-danger bg-gradient">
      <h1 class="badge fs-2 d-flex gap">
        Facturación de punto de venta<i class="bi bi-cart-check"></i>
      </h1>
    </div>
    <div class="border border-dark bg-light bg-gradient">
      <form action="POST">
        <div class="row d-flex flex-wrap justify-content-center justify-content-lg-start py-3 px-3">
          <div class="col d-flex gap-2">
            <div class="col input-group">
              <span class="input-group-text d-flex align-items-center gap-2" id="basic-addon1">Código producto<i class="bi bi-newspaper"></i></span>
              <input type="text" id="n_facturas" class="form-control" />
            </div>
            <button type="button" class="btn btn-success d-flex align-items-center gap-2 rounded">
              Enter - agregar producto <i class="bi bi-plus-circle"></i>
            </button>
          </div>
        </div>
      </form>
      <form action="post" class="container-fluid my-2 px-3 py-3 d-flex flex-column gap-3">
        <div class="row">
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary flex-grow-1 d-flex align-items-center gap-2 justify-content-center">
              INS varios <i class="bi bi-file-earmark-break"></i>
            </button>
            <button type="button" class="btn btn-primary flex-grow-1 d-flex align-items-center gap-2 justify-content-center">
              Art común<i class="bi bi-file-earmark-text"></i>
            </button>
            <button type="button" class="btn btn-primary flex-grow-1 d-flex align-items-center gap-2 justify-content-center">
              Entradas <i class="bi bi-box-arrow-in-left"></i>
            </button>
            <button type="button" class="btn btn-primary flex-grow-1 d-flex align-items-center gap-2 justify-content-center">
              Salidas <i class="bi bi-box-arrow-in-right"></i>
            </button>
            <button type="button" class="btn btn-danger flex-grow-1 d-flex align-items-center gap-2 justify-content-center">
              Borrar artículo <i class="bi bi-trash"></i>
            </button>
          </div>
        </div>

        <div>
          <div class="border border-dark bg-danger bg-gradient d-flex align-items-center">
            <div class="flex-grow-1">
              <h2 class="badge fs-3">
                Datos <i class="bi bi-clipboard-data"></i>
              </h2>
            </div>
            <div class="col input-group py-1 px-1">
              <span class="input-group-text d-flex align-items-center gap-2" id="basic-addon1">Buscar
                <i class="bi bi-search"></i>
              </span>
              <input type="text" id="buscador_punto-venta" class="form-control" />
            </div>
          </div>
          <div style="max-height: 300px; overflow-y: auto">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th>Cod. de barras</th>
                  <th>Descripción del producto</th>
                  <th>Precio venta</th>
                  <th>Cantidad</th>
                  <th>Importe</th>
                  <th>Existencia</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                </tr>
                <tr>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                </tr>
                <tr>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                </tr>
                <tr>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                </tr>
                <tr>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                </tr>
                <tr>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                </tr>
                <tr>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                  <td>hola</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row d-flex">
          <div class="d-flex">
            <div class="d-flex border flex-grow-1 border-dark px-2 py-2 rounded">
              <div class="flex-grow-1">
                <h3>20 productos en la venta actual</h3>
                <div class="col">
                  <button type="button" class="btn btn-secondary">
                    Cambiar <i class="bi bi-arrow-clockwise"></i>
                  </button>
                  <button type="button" class="btn btn-secondary">
                    Pendiente <i class="bi bi-hourglass"></i>
                  </button>
                  <button type="button" class="btn btn-secondary">
                    Eliminar <i class="bi bi-trash"></i>
                  </button>
                </div>
              </div>
              <button type="button" class="btn btn-success px-4">
                Cobrar <i class="bi bi-bag-check-fill"></i>
              </button>
            </div>
            <div class="px-2 py-2 d-flex flex-column align-items-center bg-secondary badge">
              <h2 class="fs-3">$4,200</h2>
              <p class="fs-5">Subtotal:<span>$4,200</span></p>
            </div>
          </div>
        </div>

        <div class="row d-flex flex-wrap justify-content-center justify-content-lg-start">
          <div class="col d-flex justify-content-center input-group">
            <span class="input-group-text d-flex align-items-center gap-2" id="basic-addon1">Recibido
            </span>
            <input type="text" id="fecha" class="form-control" />
          </div>
          <div class="col d-flex input-group">
            <span class="input-group-text" id="basic-addon1">Cambio </span>
            <input type="text" id="cedula" class="form-control" />
          </div>
          <div class="col input-group">
            <span class="input-group-text" id="basic-addon1">Total </span>
            <input type="text" id="buscador_punto-venta" class="form-control" />
          </div>
        </div>

        <div class="row d-flex flex-wrap justify-content-center justify-content-lg-start">
          <div class="col d-flex gap-3">
            <button type="button" class="btn btn-success flex-grow-1 d-flex align-items-center justify-content-center gap-2">
              Guardar <i class="bi bi-folder2"></i>
            </button>
            <button type="button" class="btn btn-secondary flex-grow-1 d-flex align-items-center justify-content-center gap-2">
              Imprimir <i class="bi bi-printer"></i>
            </button>
            <button type="button" class="btn btn-primary flex-grow-1 d-flex align-items-center justify-content-center gap-2">
              Ventas y devoluciones del día <i class="bi bi-cart2"></i>
            </button>
            <button type="button" class="btn btn-danger flex-grow-1 d-flex align-items-center justify-content-center gap-2">
              Salir <i class="bi bi-box-arrow-left"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>