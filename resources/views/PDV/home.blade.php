
  <style>
    .activeClass{
      background-color:#0c5cb3 !important;
      color:white !important;
    }
  </style>
  <div class="border border-dark bg-danger bg-primary text-white pr-2 pl-2">
    <h1 style="padding-top: 7px;" class="row">
      <span class="col-6">
        Facturación de punto de venta<i class="fa fa-cart-plus"></i>
      </span>
      <div class="col m-0 p-0" id="estadoFact">
        <span class="label label-warning">Sin cobrar</span>
      </div>
      <div class="col row">
        <a onclick="facback()" class="btn btn-sm btn-icon btn-circle btn-success m-auto" href="javascript:;">
          <i class="fa fa-angle-left"></i>
        </a>
        <small style="text-align: center;color:black" class="col m-auto">
          Factura No: <b id="facunique">{{substr(uniqid("",true),0,10)}}</b>
        </small>
        <a onclick="facnext()" class="btn btn-sm btn-icon btn-circle btn-success m-auto" href="javascript:;">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
    </h1>
  </div>
  <div class="border border-dark bg-light">
    <form id="add-product" method="post" action="/">
      @csrf
      <div styles="flex-direction: column;">
        <div class="col-md-11 d-flex  position:relative; z-index:9;">
          <div class="input-group" style="display: flex;">
            <span class="input-group-addon">Código producto <i class="fa fa-barcode ml-1"></i></span>
            <span class="select2-container select2-container--default select2-container--open" style="flex-grow: 1; z-index:9">
              <span class="select2-dropdown select2-dropdown--below" dir="ltr">
                <span class="select2-search select2-search--dropdown m-0 p-0">
                  <input id="n-facturas" class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" aria-controls="select2-n_facturas-results">
                </span>
                <span style="z-index:99" class="select2-results d-none">
                  <ul class="select2-results__options" role="listbox" id="select2-n_facturas-results" aria-expanded="true" aria-hidden="false">
                  </ul>
                </span>
              </span>
            </span>
            </select>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <div class="w-100">
            <button type="submit" class="btn btn-success d-flex align-items-center">
              Enter - agregar producto <i class="fa fa-plus-circle ml-1"></i>
            </button>
          </div>
        </div>
        </div>
      </div>
      <div class="row ml-1">
        <div class="col-md-3 d-flex" style="margin-top: 10px; position:relative; z-index:8;">
          <div class="input-group" style="display: flex;">
            <span class="input-group-addon">TEL</span>
            <span class="select2-container select2-container--default select2-container--open" style="flex-grow: 1;">
              <span class="select2-dropdown select2-dropdown--below" dir="ltr">
                <span class="select2-search select2-search--dropdown m-0 p-0">
                  <input id="n-cliente" class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" aria-controls="select2-n_facturas-results">
                </span>
                <span class="select2-results-clients d-none">
                  <ul style=" list-style-type: none;"  class="select2-results__options-clients pl-0 mb-0" role="listbox" id="select2-n_facturas-results-clientes" aria-expanded="true" aria-hidden="false">
                  </ul>
                </span>
              </span>
            </span>
            </select>
          </div>
        </div>
        <div class="col-md-3 d-flex" style="margin-top: 10px; position:relative; z-index:8;">
          <div class="input-group" style="display: flex;">
            <span class="input-group-addon">Cliente</span>
            <span class="select2-container select2-container--default select2-container--open" style="flex-grow: 1;">
              <span class="select2-dropdown select2-dropdown--below" dir="ltr">
                <span class="select2-search select2-search--dropdown m-0 p-0">
                  <input id="nombre-cliente" class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" aria-controls="select2-n_facturas-results">
                </span>
              </span>
            </span>
            </select>
          </div>
        </div>
      </div>
    </form>
    <div class="my-2 ">
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
                <th></th>
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
                <div class="pr-2 pl-3">
                  <h3 id="nProductos"></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="border border-dark">
            <div class="px-2 py-2">
              <h2 class="fs-3 text-end" style="text-align: end;"><b>Total:</b> <span id="totalPrice">$0</span></h2>
            </div>
          </div>
        </div>
      </div>

      <div class="row pr-2 pl-2 mt-sm-2">
        <div class="col-md-4">
          <div class="input-group">
            <span class="input-group-addon">Recibido</span>
            <input type="number" id="totalRecibido" class="form-control" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="input-group">
            <span class="input-group-addon">Cambio</span>
            <input type="text" readonly id="totalCambio" class="form-control" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="input-group">
            <span class="input-group-addon">Total</span>
            <input type="text" readonly id="totalTotal" class="form-control" />
          </div>
        </div>
      </div>

      <div class="row mt-3 pr-2 pl-2">
        <div class="col-md-4">
          <button onclick="guardar()" type="button" class="btn btn-success btn-block mb-2">
            Guardar <i class="glyphicon glyphicon-folder-open"></i>
          </button>
        </div>
        <div class="col-md-4">
          <button onclick="imprimir()" type="button" class="btn btn-secondary btn-block mb-2">
            Imprimir <i class="glyphicon glyphicon-print"></i>
          </button>
        </div>
        <div class="col-md-4">
          <button onclick="cobrar()" type="button" class="btn btn-primary btn-block mb-2">
            Cobrar <i class="glyphicon glyphicon-shopping-cart"></i>
          </button>
        </div>
      </div>

    </div>
  </div>
</div>

@section('extrajs')
<script>

 let indicativo;

  function guardar(metodo="efectivo"){

    let items = [];
    table_productos.rows().every(function () {
      let data = {
        cantidad: $(`#${this.data().cod}i`).val(),
        id_elemento: this.data().cod,
        factura_unique: $("#facunique").text(),
        tipo:"producto",
        precio_venta:this.data().precio
      }
      items.push(data);
    })
    let data = {
      "tipo":"venta",
      "facturador":"{{Auth::user()->id}}",
      "identificacion":`${$("#n-cliente").val()}`,
      "tipo_pago":metodo,
      "nombre_paciente":`${$("#nombre-cliente").val()}`,
      "unique":`${$("#facunique").text()}`,
      "estado":`0`,
      "recibido":`${$("#totalRecibido").val()}`,
      items
    };
    var csrfToken = '{{ csrf_token() }}';
    $.post({
        url:"{{route('PDV.post.saveInvoice')}}",
        data:{
            _token: csrfToken,
            data
        },
        dataType: 'json',
        success: function(response) {
            alerta(response.salida,response.message);
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    })
  }
  function imprimir(){

    if($("#estadoFact span").text() == "Sin cobrar"){
      alerta("error","Debe cobrar la factura primero.");
    }else{
      
      let data = {
        "unique":`${$("#facunique").text()}`,
      };
      var csrfToken = '{{ csrf_token() }}';
      $.post({
          url:"{{route('PDV.post.printInvoice')}}",
          data:{
              _token: csrfToken,
              data
          },
          success: function(response) {
            if(response == "0"){
              alerta("error","Debe guardar la factura primero.");
            }else{
              printer(response);
            }
          },
          error: function(xhr) {
            console.log(xhr.responseText);
          }
      })
    }
  }
  function cobrar(){
    if($("#totalRecibido").val() == 0 || $("#totalRecibido").val() == ""){
      alerta("error","El valor recibio es 0");
      return false;
    }
    var csrfToken = '{{ csrf_token() }}';
    getmodal("{{route('PDV.post.modalMethod')}}","Metodo de pago","sm",csrfToken);
    
  }


  function convertirBase64aURL(base64Data) {
    var byteCharacters = atob(base64Data);
    var byteArrays = [];
    for (var i = 0; i < byteCharacters.length; i++) {
      byteArrays.push(byteCharacters.charCodeAt(i));
    }
    var byteArray = new Uint8Array(byteArrays);
    var blob = new Blob([byteArray], { type: 'application/pdf' });
    var url = URL.createObjectURL(blob);
    return url;
  }


  function printer(response) {
    $('#printframe').remove();
    var t = $("<iframe></iframe>");
    t.attr("id", "printframe").attr("name", "printframe").attr("src", "about:blank").css("width", "300").css("height", "100").css("position", "absolute").css("left", "-9999px").appendTo($("body:first"));
    if (t !== null && response !== null) {
      var url = convertirBase64aURL(response); // Construir la URL con el contenido Base64
      t.attr("src", url);
      t.on('load', function() {
        if (getChromeVersion() > 76) {
          t.get(0).contentWindow.print();
        }
      });
    }
  } 

  function updatePrice(){
    //totalPrice
    total=0;
    table_productos.rows().every(function () {
      total += Number(this.data().precio * $(`#${this.data().cod}i`).val());
    })
    $("#totalPrice").html(`$${total}`);
  }

  $("#totalRecibido").on("input",function(){
    total=0;
    table_productos.rows().every(function () {
      total += Number(this.data().precio * $(`#${this.data().cod}i`).val());
    })
    let recibido = $("#totalRecibido").val();
    !isNaN(Number(recibido))?(false):(alerta("error","Escriba un numero valido"));
    let cambio = recibido-total;
    cambio<0?($("#totalCambio").val(cambio).css("color","red")):($("#totalCambio").val(cambio).css("color","black"));
    $("#totalTotal").val(total);
  })

  $("#n-facturas").keydown(function(event) {
    switch (event.keyCode) {
      case 13:
        event.preventDefault();
        if($(".select2-results").hasClass("d-none")){
          $("#add-product").submit();
        }else{
          changeCodigo($('#select2-n_facturas-results .activeClass').attr("id"));
          $(".select2-results").addClass("d-none")
        }
        break;
      case 40:
        event.preventDefault();
        $('#select2-n_facturas-results .activeClass').removeClass("activeClass");
        $('#select2-n_facturas-results').children().length>indicativo?(indicativo++):(indicativo);
        var primerElemento = $(`#select2-n_facturas-results li:eq(${indicativo})`).addClass("activeClass");
        break;
      case 38:
        event.preventDefault();
        $('#select2-n_facturas-results .activeClass').removeClass("activeClass");
        indicativo>0?(indicativo--):(indicativo);
        var primerElemento = $(`#select2-n_facturas-results li:eq(${indicativo})`).addClass("activeClass");
        break;
      case 8:
        $(".select2-results__options").html("");
        $(".select2-results").addClass("d-none")
        break;
    }

  });
  $("#n-cliente").keydown(function(event) {
    switch (event.keyCode) {
      case 13:
        event.preventDefault();
        if($(".select2-results-clients").hasClass("d-none")){
          if($("#nombre-cliente").val().lenght<=0){
            alerta("error","No existe un cliente con esa cedula, escribe su nombre para registrarlo");
          }
        }else{
          changeCliente($('#select2-n_facturas-results-clientes .activeClass').attr("id"),$('#select2-n_facturas-results-clientes .activeClass').text());
          $(".select2-results-clients").addClass("d-none")
        }
        break;
      case 40:
        event.preventDefault();
        $('#select2-n_facturas-results-clientes .activeClass').removeClass("activeClass");
        $('#select2-n_facturas-results-clientes').children().length>indicativo?(indicativo++):(indicativo);
        var primerElemento = $(`#select2-n_facturas-results-clientes li:eq(${indicativo})`).addClass("activeClass");
        break;
      case 38:
        event.preventDefault();
        $('#select2-n_facturas-results-clientes .activeClass').removeClass("activeClass");
        indicativo>0?(indicativo--):(indicativo);
        var primerElemento = $(`#select2-n_facturas-results-clientes li:eq(${indicativo})`).addClass("activeClass");
        break;
      case 8:
        $(".select2-results__options-clients").html("");
        $(".select2-results-clients").addClass("d-none")
        break;
    }

  });

  let productos = [];
    //$("#table_productos").DataTable();
    $('#n-facturas').on('input', function() {
        hint = $('#n-facturas').val();
        if(hint.length >= 3){
            $(".select2-results").removeClass("d-none");
            
            var csrfToken = '{{ csrf_token() }}';
            $.post({
                url:"{{route('PDV.post.getproductos')}}",
                data:{
                    _token: csrfToken,
                    hint
                },
                dataType: 'json',
                success: function(response) {
                    let productos = "";
                    
                    if(response.length>0){
                        for(let i = 0; i < response.length; i++){
                            productos += `
                                <li id='${response[i].codigo}' class="select2-results__option" role="option" aria-selected="false" onClick="changeCodigo('${response[i].codigo}')"> ${response[i].producto}</li>
                            `
                        }
                    }else{
                        productos = `<li role="alert" aria-live="assertive" class="select2-results__option select2-results__message">Ningún registro</li>`;
                    }
                    
                    $(".select2-results__options").html(productos);
                    indicativo = 0;
                    $('#select2-n_facturas-results li:first').addClass("activeClass");
                  
                    
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            })
        }else{
            $(".select2-results").addClass("d-none");
        }
    });
    $('#n-cliente').on('input', function() {
        hint = $('#n-cliente').val();
        if(hint.length >= 3){
            $(".select2-results-clients").removeClass("d-none");
            
            var csrfToken = '{{ csrf_token() }}';
            $.post({
                url:"{{route('PDV.post.getclientes')}}",
                data:{
                    _token: csrfToken,
                    hint
                },
                dataType: 'json',
                success: function(response) {
                    let clientes = "";
                    
                    if(response.length>0){
                        for(let i = 0; i < response.length; i++){
                            clientes += `
                                <li id='${response[i].telefono}' class="select2-results__option" role="option" aria-selected="false" onClick="changeCliente('${response[i].telefono}','${response[i].nombres} ${response[i].apellidos}')"> ${response[i].nombres} ${response[i].apellidos}</li>`
                        }
                    }else{
                        clientes = `<li role="alert" aria-live="assertive" class="select2-results__option select2-results__message">Ningún registro</li>`;
                    }
                    
                    $(".select2-results__options-clients").html(clientes);
                    indicativo = 0;
                    $('#select2-n_facturas-results-clientes li:first').addClass("activeClass");
                  
                    
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            })
        }else{
            $(".select2-results-clients").addClass("d-none");
        }
    });
    

    $('#n-facturas').on('blur', function() {
        setTimeout(() => {
            $(".select2-results").addClass("d-none");
        }, 200);
    });
    $('#n-cliente').on('blur', function() {
        setTimeout(() => {
            $(".select2-results-clients").addClass("d-none");
        }, 200);
    });

    $("#add-product").on("submit",function(e){
        e.preventDefault()
        hint = $('#n-facturas').val();
        var csrfToken = '{{ csrf_token() }}';
        $.post({
            url:"{{route('PDV.post.getproductoById')}}",
            data:{
                _token: csrfToken,
                hint
            },
            dataType: 'json',
            success: function(response) {
                var datosExistentes = table_productos.data().toArray();
                var duplicado = datosExistentes.some(function(dato) {
                    return dato.cod === response.codigo;
                });

                if(response?.id!=undefined && !duplicado){
                    table_productos.row.add({
                                            "cod":response.codigo,
                                            "descripcion":response.producto,
                                            "precio":response.valor,
                                            "cantidad":"<input value='1' id='"+response.codigo+"i' type='number' onChange='validaMax(\""+response.cantidad+"\",\""+response.codigo+"i\")' max='"+response.cantidad+"' min='0' style='max-width:50px'>",
                                            "impuesto":response.iva,
                                            "existencia":response.cantidad,
                                            "tools":`<a href='javascript:;'><i onclick='removeProducto("${response.codigo}")' class='fa fa-trash'></i></a>`
                                            }).draw();
                  
                  $("#n-facturas").val(""); 
                  updatePrice() 
                }else{
                    if(duplicado){
                        alerta("error","Ya agrego este producto")
                    }else{

                        alerta("error","No existe ningun producto con ese codigo")
                    }
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        })
    })

    function validaMax(max,codigo){
        
        max = parseInt(max)
        valor = parseInt($("#"+codigo).val())
        if(valor<=0){
          $("#"+codigo).val(1)
        }else{
            if(valor>max){
              $("#"+codigo).val(max)
              
            }
        }
        updatePrice()

    }

    function removeProducto(codigo = null){
      codigo == null ? (codigo = $("#n-facturas").val()) : (false); 

      table_productos.rows().every(function () {
        this.data().cod == codigo ? (this.remove()) : (false);
      })
      table_productos.draw();
      $("#n-facturas").val("");
      updatePrice()
    }

    function changeCliente(dni,cliente) {
      if(dni == null || dni == ""){
        alerta("error","No existe un cliente con ese telefono, escribe su nombre para registrarlo");
      }else{
        $('#n-cliente').val(dni);
        $('#nombre-cliente').val(cliente);
      }
      
    }

    function facnext(){
      if($("#estadoFact span").text() == "Sin cobrar"){
        $.confirm({
          theme: 'supervan',
          draggable: false,
          closeIcon: true,
          animationBounce: 2.5,
          escapeKey: false,
          content: 'Si no ha guardado los datos de esta factura, estos se perderan, esta seguro de continuar?',
          title: '<i class="far fa-question-circle fa-lg icodialog"></i> Eliminar',
          buttons: {
            Cancelar: {
              text: '<i class="fa fa-times icodialog"></i> No, regresame', // With spaces and symbols
              action: function () {
                
              }
            },
            Continuar: {
              text: '<i class="far fa-trash-alt icodialog"></i> Si, borralo', // With spaces and symbols
              action: function () {
                
                let data = {
                  "unique":`${$("#facunique").text()}`,
                };
                var csrfToken = '{{ csrf_token() }}';
                $.post({
                    url:"{{route('PDV.post.getInvoiceNext')}}",
                    data:{
                        _token: csrfToken,
                        data
                    },
                    dataType: 'json',
                    success: function(response) {
                      response.salida == "error"?(alerta("error","No hay mas facturas")):(false);
                      if(response.salida == "error"){
                        return false;
                      }
                      table_productos.clear().draw();
                      response.estado==0?($("#estadoFact").html('<span class="label label-warning">Sin cobrar</span>')):($("#estadoFact").html('<span class="label label-success">Cobrada</span>'));
                      $("#n-cliente").val(response.identificacion);
                      $("#nombre-cliente").val(response.nombre_paciente);
                      $("#facunique").text(response.factura.unique);
                      for (let i = 0; i < response.items.length; i++) {
                        const element = response.items[i];
                        $.post({
                          url:"{{route('PDV.post.getproductoById')}}",
                          data:{
                              _token: csrfToken,
                              hint:element.id_elemento
                          },
                          dataType: 'json',
                          success: function(response) {
                            table_productos.row.add({
                                                    "cod":response.codigo,
                                                    "descripcion":response.producto,
                                                    "precio":element.valor,
                                                    "cantidad":"<input value='"+element.cantidad+"' id='"+response.codigo+"i' type='number' onChange='validaMax(\""+response.cantidad+"\",\""+response.codigo+"i\")' max='"+response.cantidad+"' min='0' style='max-width:50px'>",
                                                    "impuesto":response.iva,
                                                    "existencia":response.cantidad,
                                                    "tools":`<a href='javascript:;'><i onclick='removeProducto("${response.codigo}")' class='fa fa-trash'></i></a>`
                                                    }).draw();
                            
                            $("#n-facturas").val(""); 
                            updatePrice()
                          },
                          error: function(xhr) {
                              console.log(xhr.responseText);
                          }
                        })
                      }
                      
                      $("#totalRecibido").val(response.factura.recibido);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                })
              }
            },
            Guardar: {
              text: '<i class="fa fa-save icodialog"></i> Guarda y continua', // With spaces and symbols
              action: function () {
                guardar();
               
                let data = {
                  "unique":`${$("#facunique").text()}`,
                };
                var csrfToken = '{{ csrf_token() }}';
                $.post({
                    url:"{{route('PDV.post.getInvoiceNext')}}",
                    data:{
                        _token: csrfToken,
                        data
                    },
                    dataType: 'json',
                    success: function(response) {
                      response.salida == "error"?(alerta("error","No hay mas facturas")):(false);
                      if(response.salida == "error"){
                        return false;
                      }
                      table_productos.clear().draw();
                      response.estado==0?($("#estadoFact").html('<span class="label label-warning">Sin cobrar</span>')):($("#estadoFact").html('<span class="label label-success">Cobrada</span>'));
                      $("#n-cliente").val(response.identificacion);
                      $("#nombre-cliente").val(response.nombre_paciente);
                      $("#facunique").text(response.factura.unique);
                      for (let i = 0; i < response.items.length; i++) {
                        const element = response.items[i];
                        $.post({
                          url:"{{route('PDV.post.getproductoById')}}",
                          data:{
                              _token: csrfToken,
                              hint:element.id_elemento
                          },
                          dataType: 'json',
                          success: function(response) {
                            table_productos.row.add({
                                                    "cod":response.codigo,
                                                    "descripcion":response.producto,
                                                    "precio":element.precio_venta,
                                                    "cantidad":"<input value='"+element.cantidad+"' id='"+response.codigo+"i' type='number' onChange='validaMax(\""+response.cantidad+"\",\""+response.codigo+"i\")' max='"+response.cantidad+"' min='0' style='max-width:50px'>",
                                                    "impuesto":response.iva,
                                                    "existencia":response.cantidad,
                                                    "tools":`<a href='javascript:;'><i onclick='removeProducto("${response.codigo}")' class='fa fa-trash'></i></a>`
                                                    }).draw();
                            
                            $("#n-facturas").val(""); 
                            updatePrice()
                          },
                          error: function(xhr) {
                              console.log(xhr.responseText);
                          }
                        })
                      }
                      $("#totalRecibido").val(response.factura.recibido);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                })
              }
            }
          }
        });
      }else{
       
        let data = {
          "unique":`${$("#facunique").text()}`,
        };
        var csrfToken = '{{ csrf_token() }}';
        $.post({
            url:"{{route('PDV.post.getInvoiceNext')}}",
            data:{
                _token: csrfToken,
                data
            },
            dataType: 'json',
            success: function(response) {
              response.salida == "error"?(alerta("error","No hay mas facturas")):(false);
              if(response.salida == "error"){
                return false;
              }
              table_productos.clear().draw();
              response.estado==0?($("#estadoFact").html('<span class="label label-warning">Sin cobrar</span>')):($("#estadoFact").html('<span class="label label-success">Cobrada</span>'));
              $("#n-cliente").val(response.identificacion);
              $("#nombre-cliente").val(response.nombre_paciente);
              $("#facunique").text(response.factura.unique);
              for (let i = 0; i < response.items.length; i++) {
                const element = response.items[i];
                $.post({
                  url:"{{route('PDV.post.getproductoById')}}",
                  data:{
                      _token: csrfToken,
                      hint:element.id_elemento
                  },
                  dataType: 'json',
                  success: function(response) {
                    table_productos.row.add({
                                            "cod":response.codigo,
                                            "descripcion":response.producto,
                                            "precio":element.precio_venta,
                                            "cantidad":"<input value='"+element.cantidad+"' id='"+response.codigo+"i' type='number' onChange='validaMax(\""+response.cantidad+"\",\""+response.codigo+"i\")' max='"+response.cantidad+"' min='0' style='max-width:50px'>",
                                            "impuesto":response.iva,
                                            "existencia":response.cantidad,
                                            "tools":`<a href='javascript:;'><i onclick='removeProducto("${response.codigo}")' class='fa fa-trash'></i></a>`
                                            }).draw();
                    
                    $("#n-facturas").val(""); 
                    updatePrice()
                  },
                  error: function(xhr) {
                      console.log(xhr.responseText);
                  }
                })
              }
              $("#totalRecibido").val(response.factura.recibido);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        })
      }

    }

    function facback(){
      if($("#estadoFact span").text() == "Sin cobrar"){
        $.confirm({
          theme: 'supervan',
          draggable: false,
          closeIcon: true,
          animationBounce: 2.5,
          escapeKey: false,
          content: 'Si no ha guardado los datos de esta factura, estos se perderan, esta seguro de continuar?',
          title: '<i class="far fa-question-circle fa-lg icodialog"></i> Eliminar',
          buttons: {
            Cancelar: {
              text: '<i class="fa fa-times icodialog"></i> No, regresame', // With spaces and symbols
              action: function () {
                
              }
            },
            Continuar: {
              text: '<i class="far fa-trash-alt icodialog"></i> Si, borralo', // With spaces and symbols
              action: function () {
                
                let data = {
                  "unique":`${$("#facunique").text()}`,
                };
                var csrfToken = '{{ csrf_token() }}';
                $.post({
                    url:"{{route('PDV.post.getInvoiceBack')}}",
                    data:{
                        _token: csrfToken,
                        data
                    },
                    dataType: 'json',
                    success: function(response) {
                      response.salida == "error"?(alerta("error","No hay mas facturas")):(false);
                      if(response.salida == "error"){
                        return false;
                      }
                      table_productos.clear().draw();
                      response.estado==0?($("#estadoFact").html('<span class="label label-warning">Sin cobrar</span>')):($("#estadoFact").html('<span class="label label-success">Cobrada</span>'));
                      $("#n-cliente").val(response.identificacion);
                      $("#nombre-cliente").val(response.nombre_paciente);
                      $("#facunique").text(response.factura.unique);
                      for (let i = 0; i < response.items.length; i++) {
                        const element = response.items[i];
                        $.post({
                          url:"{{route('PDV.post.getproductoById')}}",
                          data:{
                              _token: csrfToken,
                              hint:element.id_elemento
                          },
                          dataType: 'json',
                          success: function(response) {
                            table_productos.row.add({
                                                    "cod":response.codigo,
                                                    "descripcion":response.producto,
                                                    "precio":element.precio_venta,
                                                    "cantidad":"<input value='"+element.cantidad+"' id='"+response.codigo+"i' type='number' onChange='validaMax(\""+response.cantidad+"\",\""+response.codigo+"i\")' max='"+response.cantidad+"' min='0' style='max-width:50px'>",
                                                    "impuesto":response.iva,
                                                    "existencia":response.cantidad,
                                                    "tools":`<a href='javascript:;'><i onclick='removeProducto("${response.codigo}")' class='fa fa-trash'></i></a>`
                                                    }).draw();
                            
                            $("#n-facturas").val(""); 
                            updatePrice()
                          },
                          error: function(xhr) {
                              console.log(xhr.responseText);
                          }
                        })
                      }
                      $("#totalRecibido").val(response.factura.recibido);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                })
              }
            },
            Guardar: {
              text: '<i class="fa fa-save icodialog"></i> Guarda y continua', // With spaces and symbols
              action: function () {
                guardar();
                
                let data = {
                  "unique":`${$("#facunique").text()}`,
                };
                var csrfToken = '{{ csrf_token() }}';
                $.post({
                    url:"{{route('PDV.post.getInvoiceBack')}}",
                    data:{
                        _token: csrfToken,
                        data
                    },
                    dataType: 'json',
                    success: function(response) {
                      response.salida == "error"?(alerta("error","No hay mas facturas")):(false);
                      if(response.salida == "error"){
                        return false;
                      }
                      table_productos.clear().draw();
                      response.estado==0?($("#estadoFact").html('<span class="label label-warning">Sin cobrar</span>')):($("#estadoFact").html('<span class="label label-success">Cobrada</span>'));
                      $("#n-cliente").val(response.identificacion);
                      $("#nombre-cliente").val(response.nombre_paciente);
                      $("#facunique").text(response.factura.unique);
                      for (let i = 0; i < response.items.length; i++) {
                        const element = response.items[i];
                        $.post({
                          url:"{{route('PDV.post.getproductoById')}}",
                          data:{
                              _token: csrfToken,
                              hint:element.id_elemento
                          },
                          dataType: 'json',
                          success: function(response) {
                            table_productos.row.add({
                                                    "cod":response.codigo,
                                                    "descripcion":response.producto,
                                                    "precio":element.precio_venta,
                                                    "cantidad":"<input value='"+element.cantidad+"' id='"+response.codigo+"i' type='number' onChange='validaMax(\""+response.cantidad+"\",\""+response.codigo+"i\")' max='"+response.cantidad+"' min='0' style='max-width:50px'>",
                                                    "impuesto":response.iva,
                                                    "existencia":response.cantidad,
                                                    "tools":`<a href='javascript:;'><i onclick='removeProducto("${response.codigo}")' class='fa fa-trash'></i></a>`
                                                    }).draw();
                            
                            $("#n-facturas").val(""); 
                            updatePrice()
                          },
                          error: function(xhr) {
                              console.log(xhr.responseText);
                          }
                        })
                      }
                      $("#totalRecibido").val(response.factura.recibido);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                })
              }
            }
          }
        });
      }else{
        let data = {
          "unique":`${$("#facunique").text()}`,
        };
        var csrfToken = '{{ csrf_token() }}';
        $.post({
            url:"{{route('PDV.post.getInvoiceBack')}}",
            data:{
                _token: csrfToken,
                data
            },
            dataType: 'json',
            success: function(response) {
              response.salida == "error"?(alerta("error","No hay mas facturas")):(false);
              if(response.salida == "error"){
                return false;
              }
              table_productos.clear().draw();
              response.estado==0?($("#estadoFact").html('<span class="label label-warning">Sin cobrar</span>')):($("#estadoFact").html('<span class="label label-success">Cobrada</span>'));
              $("#n-cliente").val(response.identificacion);
              $("#nombre-cliente").val(response.nombre_paciente);
              $("#facunique").text(response.factura.unique);
              for (let i = 0; i < response.items.length; i++) {
                const element = response.items[i];
                $.post({
                  url:"{{route('PDV.post.getproductoById')}}",
                  data:{
                      _token: csrfToken,
                      hint:element.id_elemento
                  },
                  dataType: 'json',
                  success: function(response) {
                    table_productos.row.add({
                                            "cod":response.codigo,
                                            "descripcion":response.producto,
                                            "precio":element.precio_venta,
                                            "cantidad":"<input value='"+element.cantidad+"' id='"+response.codigo+"i' type='number' onChange='validaMax(\""+response.cantidad+"\",\""+response.codigo+"i\")' max='"+response.cantidad+"' min='0' style='max-width:50px'>",
                                            "impuesto":response.iva,
                                            "existencia":response.cantidad,
                                            "tools":`<a href='javascript:;'><i onclick='removeProducto("${response.codigo}")' class='fa fa-trash'></i></a>`
                                            }).draw();
                    
                    $("#n-facturas").val(""); 
                    updatePrice()
                  },
                  error: function(xhr) {
                      console.log(xhr.responseText);
                  }
                })
              }
              $("#totalRecibido").val(response.factura.recibido);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        })
      }

    }

    function changeCodigo(codigo) {
      $('#n-facturas').val(codigo);
      $("#n-facturas").focus();
    }
    let table_productos = $("#table_productos").DataTable({
        lengthChange: false,
        paging: false,
        scrollX: false,
        info:false,
        "aoColumns": [
            { mData: 'cod',sWidth:'40px'},
            { mData: 'descripcion'},
            { mData: 'precio',sWidth:'80px'/*sClass: 'text-center'*/},
            { mData: 'cantidad',sWidth:'40px'},
            { mData: 'impuesto',visible:false},
            { mData: 'existencia',sWidth:'40px'},
            { mData: 'tools',sWidth:'40px'}
        ],
        initComplete:function(){
            $("#table_productos_filter").prepend("<label>Buscar producto</label>")
        }
    });
    table_productos.on('draw.dt', function () {
      table_productos.rows().count()<2 ? ($("#nProductos").html(`${table_productos.rows().count()} Producto`)) : ($("#nProductos").html(`${table_productos.rows().count()} Productos`));  
    });

</script>
@stop