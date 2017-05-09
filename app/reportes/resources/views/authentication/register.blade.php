@extends('template')
@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Registro en VivirChevere</h3>
        </div>
        <div class="panel-body">
          {!! Form::open(['route'=>['registration.post'], 'method'=>'POST']) !!}
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="email@email.com" value="">
              </div>
            </div>


            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="first_name" class="form-control" placeholder="Nombre" value="">
              </div>
            </div>



            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="last_name" class="form-control" placeholder="Apellido" value="">
              </div>
            </div>




            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" value="">
              </div>
            </div>


            <div class="form-group">
              <input type="submit" name="registrar" class="btn btn-info pull-right" value="Registrar">
            </div>


            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
