
<div class="container bg-light p-0">
  <div class="bg-primary text-white">
    <h2 class="p-2">Módulo de Control de Inventario de Medicamentos</h2>
  </div>
  <div class="container">
    <!-- Botón para abrir el modal -->
    <div class="d-flex">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarModal">
        Agregar Producto
      </button>
      <div class="row flex-grow-1 d-flex justify-content-end">
        <div class="col-md-6 col-md-offset-3">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar medicamento...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Buscar</button>
            </span>
          </div>
        </div>
      </div>
    </div>
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

  <div class="m-3">
    <div style="grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); display: grid; max-height: 721px; overflow-y: auto; gap: 15px; padding: 1rem;">
      <div class="card">
        <div class="product-container">
          <div class="mt-2">
            <h4>Medicamento 2</h4>
            <div class="product-description">
              Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </div>
            <p class="mb-0"><strong>Cantidad:</strong> 8</p>
            <p><strong>Precio*:1</strong> 1200</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="product-container">
          <div class="mt-2">
            <h4>Medicamento 2</h4>
            <div class="product-description">
              Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </div>
            <p class="mb-0"><strong>Cantidad:</strong> 8</p>
            <p><strong>Precio*:1</strong> 1200</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="product-container">
          <div class="mt-2">
            <h4>Medicamento 2</h4>
            <div class="product-description">
              Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </div>
            <p class="mb-0"><strong>Cantidad:</strong> 8</p>
            <p><strong>Precio*:1</strong> 1200</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="product-container">
          <div class="mt-2">
            <h4>Medicamento 2</h4>
            <div class="product-description">
              Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </div>
            <p class="mb-0"><strong>Cantidad:</strong> 8</p>
            <p><strong>Precio*:1</strong> 1200</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="product-container">
          <div class="mt-2">
            <h4>Medicamento 2</h4>
            <div class="product-description">
              Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </div>
            <p class="mb-0"><strong>Cantidad:</strong> 8</p>
            <p><strong>Precio*:1</strong> 1200</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="product-container">
          <div class="mt-2">
            <h4>Medicamento 2</h4>
            <div class="product-description">
              Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </div>
            <p class="mb-0"><strong>Cantidad:</strong> 8</p>
            <p><strong>Precio*:1</strong> 1200</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="product-container">
          <div class="mt-2">
            <h4>Medicamento 2</h4>
            <div class="product-description">
              Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </div>
            <p class="mb-0"><strong>Cantidad:</strong> 8</p>
            <p><strong>Precio*:1</strong> 1200</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="product-container">
          <div class="mt-2">
            <h4>Medicamento 2</h4>
            <div class="product-description">
              Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </div>
            <p class="mb-0"><strong>Cantidad:</strong> 8</p>
            <p><strong>Precio*:1</strong> 1200</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="product-container">
          <div class="mt-2">
            <h4>Medicamento 2</h4>
            <div class="product-description">
              Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </div>
            <p class="mb-0"><strong>Cantidad:</strong> 8</p>
            <p><strong>Precio*:1</strong> 1200</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="product-container">
          <div class="mt-2">
            <h4>Medicamento 2</h4>
            <div class="product-description">
              Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </div>
            <p class="mb-0"><strong>Cantidad:</strong> 8</p>
            <p><strong>Precio*:1</strong> 1200</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="product-container">
          <div class="mt-2">
            <h4>Medicamento 2</h4>
            <div class="product-description">
              Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </div>
            <p class="mb-0"><strong>Cantidad:</strong> 8</p>
            <p><strong>Precio*:1</strong> 1200</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="product-container">
          <div class="mt-2">
            <h4>Medicamento 2</h4>
            <div class="product-description">
              Aenean eu diam odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </div>
            <p class="mb-0"><strong>Cantidad:</strong> 8</p>
            <p><strong>Precio*:1</strong> 1200</p>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
      <i class="fa fa-arrow-circle-left mr-2" style="font-size: 20px;"></i>
      <h2>1</h2>
      <i class="fa fa-arrow-circle-right ml-2" style="font-size: 20px;"></i>
    </div>
  </div>
</div>

<style>
  .product-container {
    margin: 1rem 0;
  }

  .card {
    border: 1px solid gray;
    transition: .25s ease;
    box-shadow: 1px 1px 2px 1px #348fe2;
    text-align: center;
  }

  .card:hover {
    cursor: pointer;
    box-shadow: 1px 1px 5px 1px #348fe2;
  }
</style>