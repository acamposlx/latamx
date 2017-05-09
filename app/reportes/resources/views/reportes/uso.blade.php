@extends('template')
@section('content')



<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Consignatario</th>
        <th>Embarque</th>
        <th>Fecha</th>
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
      </tr>
      @endforeach

    </tbody>
  </table>
</div>





@endsection