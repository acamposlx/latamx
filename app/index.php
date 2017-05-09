<?php $pagina = "login"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>...::: LatamXpress :::...</title>
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">
    <link rel="stylesheet" href="assets/lib/onoffcanvas/onoffcanvas.css">
    <link rel="stylesheet" href="assets/lib/animate.css/animate.css">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>
<body class="login">
<div class="form-signin">
  <div class="text-center">
    <img src="img/logolatamxpress.png" alt="Logo">
  </div>
  <hr>
  <div class="tab-content">
    <div id="login" class="tab-pane active">
      <form action="checklogin.php" method="post">
        <p class="text-muted text-center">Indique sus Datos</p>
        <input type="text" name="username" id="username" placeholder="Username" class="form-control top">
        <input type="password" id="password" name="password" placeholder="Password" class="form-control bottom">
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Ingresar">
      </form>
    </div>
  </div>
  <hr>
  <div class="tab-content" style="text-align: center;">
    <a href="recuperarDatos.php">Recuperar Contraseña</a>
  </div>
</div>
<script src="assets/lib/jquery/jquery.js"></script>
<script src="assets/lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
(function($) {
  $(document).ready(function() {
    $('.list-inline li > a').click(function() {
      var activeForm = $(this).attr('href') + ' > form';
      $(activeForm).addClass('animated fadeIn');
      setTimeout(function() {
        $(activeForm).removeClass('animated fadeIn');
      }, 1000);
    });
  });
})(jQuery);
</script>
</body>
</html>