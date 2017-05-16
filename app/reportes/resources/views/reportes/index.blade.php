@extends('template')
@section('content')
{!! Form::open(['route'=>'consignatarios.filtro']) !!}

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Modulo de Reportes</h1>
        <p>Reporte de Consignatarios Registrados por rango de fecha
        </p>
      </div>
<div class="row">
	<div class="col-md-2">Fecha de Inicio</div>
	<div class="col-md-2">
		<input type="date" name="fechainicio" id="fechainicio" data-date="" data-date-format="Y-m-d" class="form-control">
	</div>
	<div class="col-md-2">Fecha Fin</div>
	<div class="col-md-2">
		<input type="date" name="fechafin" id="fechainicio" data-date="" data-date-format="Y-m-d" class="form-control">
	</div>
	<div class="col-md-4">
		<input type="submit" name="enviar" class="btn btn-info" value="Buscar"> 
	</div>	
</div>
<br>
<br>
<br>
{!! Form::close() !!}

<?php 
if(isset($datos)){ 
?>
	<table class="table table-bordered">
	<tr>
		<th>Nombre</th>
		<th>Email</th>
		<th>Telefono</th>
		<th>Cedula</th>
	</tr>
	@foreach ($datos as $d)
		<tr>
			<td>{{ $d->Name }}</td>
			<td>{{ $d->Email }}</td>
			<td>{{ $d->Phone1 }}</td>
			<td>{{ $d->cedula }}</td>
		</tr>
	@endforeach	
	</table>
<?php 
} 
?>
@endsection