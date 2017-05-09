<?php include('head.php'); ?>
<div id="wrapper">
  <div class="container">
    <div class="row">
      <div class="col-lg-offset-4 col-lg-4" style="margin-top: 100px">
        <div class="block-unit" style="text-align: center; padding: 8px 8px 8px 8px;"> <img src="Images/logo-latamxpress-blanco.png" /> <br>
          <br>
          <form action="checklogin.php" method="post" >
            <label>Nombre Usuario:</label>
            <br>
            <input name="username" type="text" id="username" required>
            <br>
            <br>
            <label>Password:</label>
            <br>
            <input name="password" type="password" id="password" required>
            <br>
            <br>
            <input type="submit" name="Submit" value="LOGIN">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('pie.php'); ?>