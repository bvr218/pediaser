<div style="height:100%; border-color:#b9acac !important;padding-bottom: 42px;" class="border" >
  <nav  class="navbar navbar-expand p-0 m-0">
    
    <ul id="nav-interno" style="overflow-x:scroll;" class="navbar-nav">
      <li style="min-width:150px;position:fixed;background-color:#6c757d;z-index:99;" class="nav-item border-right border-dark rounded pt-1 pb-1 pr-3 pl-1 ml-0">
        <div class="row pr-1">
          <div class="col-5 pr-1">
            <div style="background-size: cover;background-repeat:no-repeat; background-image:url('{{asset('images/logo.png')}}') ;overflow:hidden; border-radius:100%; height:30px; width:30px">
            </div>
          </div>
          <div class="col-6 pl-0 d-flex text-truncate">
            <p style="color:white" class="m-auto font-weight-bold" >
              Categorias
            </p>
          </div>
        </div>
      </li>
      <li style="min-width:150px;background-color:#00000000;" class="nav-item rounded pt-1 pb-1 pr-3 pl-1 ml-0">
      </li>
    @foreach($categorias as $categoria)
      <li onClick="changeCategoria({{$categoria->id}})" style="min-width:150px" title="{{$categoria->categoria}}" class="element nav-item border-right border-dark rounded pt-1 pb-1 pr-3 pl-1 ml-1">
        <div class="row pr-1">
          <div class="col-5 pr-1">
            <div style="background-size: cover;background-repeat:no-repeat; background-image:url('{{asset($categoria->imagen)}}') ;overflow:hidden; border-radius:100%; height:30px; width:30px">
            </div>
          </div>
          <div class="col-6 pl-0 d-flex text-truncate">
            <p class="m-auto font-weight-bold" >
              {{$categoria->codigo}}
            </p>
          </div>
        </div>
      </li>
    @endforeach
    </ul>
  </nav>
  <div id="container-productos" class="mt-0 border-right rounded" style="height:100%;overflow-y: auto;width: 205px; padding-bottom:20px;background-color:#6c757d">
  <div style="min-width:200px;z-index: 99;" data-html2canvas-ignore="true" class="searchbars nav-header position-fixed p-2 ">
      <form class="navbar-form">
        <div class="form-group mb-0">
          <div class="m-auto">
            <input type="text" id="searchcliente" class="form-control m-auto" autofocus="" placeholder="Buscar Producto...">
          </div>
          <div class="position-absolute" style="top: 2px;right: 0%;">
            <button type="button" class="btn btn-search">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
</div>
    <ul id="productos" class="nav" style="padding-top: 40px;">
      
    </ul>
  </div>
</div>
<style>
  .element>.active{
    background-color:#5fa8bd;
  }
  .element:hover{
    background-color:#5fa8bd;
  }
  .element{
    background-color:#49b6d6;
  }
  /* Estilos para el track del scroll */

  #container-productos::-webkit-scrollbar {
    width: 4px;
  }
  #container-productos::-webkit-scrollbar-thumb {
    background-color: #2d353c;
    border-radius: 5px;
    width: 4px;
  }
  #container-productos::-webkit-scrollbar-thumb:hover {
    background-color: #4c555d;
  }
  #container-productos::-webkit-scrollbar-track {
    background-color: #f1f1f100;
  }


  #nav-interno::-webkit-scrollbar {
    height: 4px;
  }
  
  /* Estilos para el thumb del scroll */
  #nav-interno::-webkit-scrollbar-thumb {
    background-color: #2d353c;
    border-radius: 5px;
    height: 4px;
  }
  #nav-interno::-webkit-scrollbar-thumb:hover {
    background-color: #4c555d;
  }
  
  /* Estilos para el fondo del track del scroll */
  #nav-interno::-webkit-scrollbar-track {
    background-color: #f1f1f100;
  }
</style>

