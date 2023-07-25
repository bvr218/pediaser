<h1 class="page-header">Nueva Nota<small> (<b>Cliente:</b> {{$paciente->nombres." ".$paciente->apellidos}})</small></h1>
<form class="row" action="form">
    <label style="font-size:14px" class="col-2 mt-auto"><b>Elija el tipo de nota</b></label>
    <select class="form-control col-6" id="Tipo">
        <option value="">Seleccione</option>
        <option value="Rapida">Nota rapida</option>
        <option value="Evolution">Nota de evolucion</option>
        <option value="Registro">Registrar ingreso</option>
    </select>
</form>
<div class="container">

</div>