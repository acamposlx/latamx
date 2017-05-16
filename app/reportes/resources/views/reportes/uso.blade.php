@extends('template')
@section('content')



<div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Modulo de Reportes</h1>
        <p>Reporte de Uso
        </p>
      </div>


	  <table class="table table-striped">
    <thead>
      <tr>
        <td>Fecha de Inicio</td>
        <td><input type="date" name="fechainicio" class="form-control"></td>
        <th>Fecha fin</th>
        <td><input type="date" name="fechafin" class="form-control"></td>
        <td>Tipo Embarque</td>
        <th><select class="" name="">

        </select></th>

      </tr>
    </thead>
    <tbody>



  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Consignatario</th>
        <th>Embarque</th>
        <th>Fecha</th>
		<th>Tipo de Envio</th>
      </tr>
    </thead>
    <tbody>

        @foreach($consignatarios as $c)

        <tr>
        <td>{{ $c->Name }}</td>
        <td>{{ $c->apellido }}</td>
        <td>{{ $c->Email }}</td>
        <td>{{ $c->ConsigneeCode}}</td>
        <td>{{ $c->receipt}}</td>
        <td>{{ $c->date}}</td>
		<td>{{ $c->type}}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>





@endsection
