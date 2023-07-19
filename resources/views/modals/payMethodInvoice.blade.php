<form class="form" id="pay">

    <button style="border-bottom-style: solid;border-bottom-width: 1px;border-bottom-color: black;" onclick="pay('tarjeta')" class="form-control btn">
        <i class="fa fa-credit-card"> Tarjeta</i>
    </button>
    <button onclick="pay('efectivo')" class="form-control btn">
        <i class="fas fa-money-bill"> Efectivo</i>
    </button>

</form>
<script>
    $('#modaltmp').modal('show');
    if($("#estadoFact span").text() != "Sin cobrar"){
        alerta("error","La factura ya fue cobrada.");
        $('#modaltmp').modal('hide');
        
    }
    function pay(method){
        
        guardar(method);
        $('#modaltmp').modal('hide');
        let data = {
        "unique":`${$("#facunique").text()}`,
        };
        $.post({
            url:"{{route('PDV.post.payInvoice')}}",
            data:{
                _token: '{{ csrf_token() }}',
                data
            },
            success: function(response) {
            $("#estadoFact").html('<span class="label label-success">Cobrada</span>');
            imprimir();
            },
            error: function(xhr) {
            alerta("error","Error al pagar la factura");
            console.log(xhr.responseText);
            }
        })
    }
    $("#pay").on("submit",(e)=>{
        e.preventDefault();
    })
</script>