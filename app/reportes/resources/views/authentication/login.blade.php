@extends('template')
@section('content')
<div class="jumbotron">
	<div class="container">
    	<h1>Login en VivirChevere</h1>
        <p>Aqui se puede colocar una explicacion o bienvenida.</p>
	</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Login VivirChevere</h3>
        </div>
        <div class="panel-body">
          {!! Form::open(['route'=>['login.post'], 'method'=>'POST']) !!}
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="email@email.com" value="">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" value="">
              </div>
            </div>
            <div class="form-group">
              <input type="submit" name="registrar" class="btn btn-info pull-right" value="Ingresar">
            </div>
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
