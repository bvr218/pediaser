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
      <div class="border border-dark bg-light" style="display: flex; flex-direction: column;">
        <div class="my-2 col-md-8">
          <div class="row pr-2 pl-2">
            <div class="col-md-12">
              <button type="button" class="btn btn-primary">
                Nuevo <i class="glyphicon glyphicon-file"></i>
              </button>
              <button type="button" class="btn btn-primary">
                Modificar<i class="glyphicon glyphicon-file"></i>
              </button>
              <button type="button" class="btn btn-primary">
                Eliminar <i class="glyphicon glyphicon-circle-arrow-left"></i>
              </button>
              <button type="button" class="btn btn-primary">
                Departamentos <i class="glyphicon glyphicon-circle-arrow-right"></i>
              </button>
              <button type="button" class="btn btn-primary">
                Venta por periodo <i class="glyphicon glyphicon-circle-arrow-right"></i>
              </button>
              <button type="button" class="btn btn-primary">
                Promociones <i class="glyphicon glyphicon-circle-arrow-right"></i>
              </button>
              <button type="button" class="btn btn-danger">
                Borrar artículo <i class="glyphicon glyphicon-trash"></i>
              </button>
            </div>
          </div>
        </div>
        <form" style="display: flex; flex-direction: column; margin-top: 1rem;">
          <div class="form-group col-md-5">
            <label for="exampleInputName2">Código de barras</label>
            <input type="text" class="form-control" id="exampleInputName2" />
          </div>
          <div class="form-group col-md-5">
            <label for="exampleInputEmail2">Descripción</label>
            <textarea
              name=""
              class="form-control"
              id=""
              cols="30"
              rows="2"
            ></textarea>
          </div>
          <div
            class="col-md-7"
            style="display: flex; align-items: center; margin-bottom: 15px"
          >
            <h4 style="margin: 0%; padding-right: 1rem">Se vende</h4>
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox1" value="option1" /> Por
              unidad/Pza
            </label>
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox1" value="option1" /> A
              granel(Usa decimales)
            </label>
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox1" value="option1" />
              Como paquete(kit)
            </label>
          </div>
          <div class="form-group col-md-5">
            <label for="exampleInputName2">Precio costo</label>
            <input
              type="number"
              class="form-control"
              id="exampleInputName2"
              placeholder="$0.00"
            />
          </div>
          <div class="form-group col-md-5">
            <label for="exampleInputName2">Precio venta</label>
            <input
              type="number"
              class="form-control"
              id="exampleInputName2"
              placeholder="$0.00"
            />
          </div>
          <div class="form-group col-md-5">
            <label for="exampleInputName2">Precio venta 1</label>
            <input
              type="number"
              class="form-control"
              id="exampleInputName2"
              placeholder="$0.00"
            />
          </div>
          <div class="form-group col-md-5">
            <label for="exampleInputName2">Precio venta 2</label>
            <input
              type="number"
              class="form-control"
              id="exampleInputName2"
              placeholder="$0.00"
            />
          </div>
          <div class="form-group col-md-5">
            <label for="exampleInputName2">Precio venta 3</label>
            <input
              type="number"
              class="form-control"
              id="exampleInputName2"
              placeholder="$0.00"
            />
          </div>
          <div class="form-group col-md-5">
            <label for="exampleInputName2">Precio mayoreo</label>
            <input
              type="number"
              class="form-control"
              id="exampleInputName2"
              placeholder="$0.00"
            />
          </div>

          <div class="form-group col-md-5">
            <label for="exampleInputName2">Nombre de proveedores</label>
            <select class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="col-md-5">
            <h3>Inventario</h3>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1" />
              Este producto si utliza inventario
            </label>
            <div
              class="form-group"
              style="display: flex; flex-direction: column"
            >
              <div class="form-group">
                <label for="exampleInputName2">Cantidad actual</label>
                <input
                  type="number"
                  class="form-control"
                  id="exampleInputName2"
                  placeholder="$0.00"
                />
              </div>
              <div class="form-group">
                <label for="exampleInputName2">Minimo</label>
                <input
                  type="number"
                  class="form-control"
                  id="exampleInputName2"
                  placeholder="$0.00"
                />
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-success col-md-5" style="margin: 0 1rem;">
            Guardar el producto <i class="fa fa-check" aria-hidden="true"></i>
          </button>
        </form>
      </div>
    </div>