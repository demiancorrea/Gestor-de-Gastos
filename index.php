<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$msg = ''; // Inicializamos la variable $msg

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$query = mysqli_query($con, "SELECT ID FROM tbluser WHERE Email='$email' AND Password='$password'");
	$ret = mysqli_fetch_array($query);
	if ($ret > 0) {
		$_SESSION['detsuid'] = $ret['ID'];
		header('location:dashboard.php');
	} else {
		$msg = "Datos inválidos.";
	}
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestor de Gastos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
<head>

	
    <div class="card text-center">
  <div class="card-header">
  </div>
  <div class="card-body">
        <div class="row-center">
		<h1 class="text-center">Inicio de Sesión</h1>
		<hr />
        <h5 class="card-title">Ingresar Datos</h5>
		<div class="col-xs-** col-xs-offset-** col-sm-** col-sm-offset-** col-md-** col-md-offset-**">
			<div class="login-panel panel panel-default">
				<div class="text-center">Iniciar Sesión</div>
				<div class="panel-body">
					<?php if ($msg): ?>
						<p style="font-size:16px; color:red" class="text-center"><?php echo $msg; ?></p>
					<?php endif; ?>
					<form role="form" action="" method="post" id="login" name="login">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Correo electrónico" name="email" type="email" autofocus required>
							</div>
							<a href="forgot-password.php">¿Olvidaste tu contraseña?</a>
							
                            <div class="form-group">
								<input class="form-control" placeholder="Contraseña" name="password" type="password" required>
							</div>
							
                            <div class="form-group">
								<button style="margin-left: -1665px;" type="submit" value="login" name="login" class="btn btn-primary" >Iniciar Sesión</button>
								<a href="register.php" class="btn btn-primary float-end">Registrarse</a>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
  </div>
  <div class="card-footer text-body-secondary">
  </div>
</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>