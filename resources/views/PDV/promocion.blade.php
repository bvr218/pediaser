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
        <h2 style="padding: 1rem">Nueva promoción</h2>
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
        <form style="display: flex; flex-direction: column; margin-top: 1rem">
          <div class="form-group col-md-5">
            <label for="exampleInputName2">Nombre promoción</label>
            <input type="text" class="form-control" id="exampleInputName2" />
          </div>
          <div class="form-group col-md-5">
            <label for="exampleInputName2">Código de barras</label>
            <input type="text" class="form-control" id="exampleInputName2" />
          </div>

          <div class="form-group col-md-5">
            <label for="exampleInputName2">Valor desde</label>
            <input
              type="number"
              class="form-control"
              id="exampleInputName2"
              placeholder="$0.00"
            />
          </div>
          <div class="form-group col-md-5">
            <label for="exampleInputName2">Valor hasta</label>
            <input
              type="number"
              class="form-control"
              id="exampleInputName2"
              placeholder="$0.00"
            />
          </div>
          <button
            type="submit"
            class="btn btn-success col-md-5"
            style="margin: 0 1rem"
          >
            Guardar el producto <i class="fa fa-check" aria-hidden="true"></i>
          </button>
        </form>
        <div class="table-responsive" style="margin-top: 2rem">
          <table class="table">
            <thead>
              <tr>
                <th>Nombre Promoción</th>
                <th>Código Producto</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Precio Promoción</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Promoción 1</td>
                <td>001</td>
                <td>2023-06-01</td>
                <td>2023-06-30</td>
                <td>$19.99</td>
                <td><i class="glyphicon glyphicon-trash"></i></td>
              </tr>
              <tr>
                <td>Promoción 2</td>
                <td>002</td>
                <td>2023-07-01</td>
                <td>2023-07-31</td>
                <td>$24.99</td>
                <td><i class="glyphicon glyphicon-trash"></i></td>
              </tr>
              <tr>
                <td>Promoción 3</td>
                <td>003</td>
                <td>2023-08-01</td>
                <td>2023-08-31</td>
                <td>$29.99</td>
                <td><i class="glyphicon glyphicon-trash"></i></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>