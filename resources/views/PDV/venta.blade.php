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
        <h2 style="padding: 1rem">Reporte de productos vendidos</h2>
      </div>
      <div
        class="border border-dark bg-light"
        style="display: flex; flex-direction: column"
      >
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
              Promociones <i class="glyphicon glyphicon-circle-arrow-right"></i>
            </button>
            <button type="button" class="btn btn-danger">
              Borrar artículo <i class="glyphicon glyphicon-trash"></i>
            </button>
          </div>
        </div>

        <div style="margin-top: 2rem">
          <div class="form-group col-md-4">
            <label for="exampleInputName2">Mostrar ventas de</label>
            <select id="select" class="form-control" onchange="onSelected()">
              <option value="1">hoy</option>
              <option value="2">ayer</option>
              <option value="3">hace 3 días</option>
              <option value="4">1 semana</option>
              <option value="5">1 mes</option>
              <option value="6">Desde un periodo en particular</option>
            </select>
          </div>
          <div class="row" style="display: flex; justify-content: center">
            <div id="input_date-1" class="col-md-5" style="display: none">
              <div class="form-group">
                <label for="fechaDesde">Desde:</label>
                <div class="input-group date">
                  <input type="date" class="form-control" id="fechaDesde" />
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                </div>
              </div>
            </div>
            <div id="input_date-2" class="col-md-5" style="display: none">
              <div class="form-group">
                <label for="fechaHasta">Hasta:</label>
                <div class="input-group date">
                  <input type="date" class="form-control" id="fechaHasta" />
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <h3 style="padding: 1rem">
          No se encontraron productos vendidos para el periodo seleccionado
        </h3>
        <div class="table-responsive" style="margin: 0 1em">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Código</th>
                <th>Descripción del Producto</th>
                <th>Cantidad</th>
                <th class="price-column">Precio Venta</th>
                <th>Departamento</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>001</td>
                <td>Producto 1</td>
                <td>10</td>
                <td class="price-column">9.99</td>
                <td>Departamento 1</td>
              </tr>
              <tr>
                <td>002</td>
                <td>Producto 2</td>
                <td>5</td>
                <td class="price-column">14.99</td>
                <td>Departamento 2</td>
              </tr>
              <tr>
                <td>003</td>
                <td>Producto 3</td>
                <td>3</td>
                <td class="price-column">7.99</td>
                <td>Departamento 1</td>
              </tr>
              <tr>
                <td>004</td>
                <td>Producto 4</td>
                <td>8</td>
                <td class="price-column">12.99</td>
                <td>Departamento 2</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-5">
        <button type="button" class="btn btn-info">
          <i class="glyphicon glyphicon-export"></i> Exportar
        </button>

        <button type="button" class="btn btn-primary">
          <i class="glyphicon glyphicon-print"></i> Imprimir
        </button>
      </div>
    </div>

    <style>
      .price-column {
        background-color: #f5f5f5;
      }
    </style>

    <script>
      function onSelected() {
        const select = document.getElementById("select");
        const selectValue = select.value;
        const inputDate1 = document.getElementById("input_date-1");
        const inputDate2 = document.getElementById("input_date-2");

        if (selectValue === "6") {
          inputDate1.style.display = "block";
          inputDate2.style.display = "block";
        } else {
          inputDate1.style.display = "none";
          inputDate2.style.display = "none";
        }
      }
    </script>