<?php
	include "../connection.php";
	session_start();
	$sql = mysqli_query($con, "SELECT * FROM bitacora");
	if(!isset($_SESSION['id_owner'])){
		$msg = "No se ha iniciado sesión";
		session_destroy();
		header("refresh:1; url=../html/login.html");
		echo '<div>'.$msg.'</div>';
		echo '<p>Serás redirigido al log in en 5 segundos.</p>';
	// header("Location: products.php");
	exit;
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Productos</title>

	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

	<!-- css file -->
	<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<!-- header section start -->
	<header>
		<input type="checkbox" id="toggler">
		<label for="toggler" class="fas fa-bars"></label>

		<!-- <a href="#" class="logo">Grub<span>i</span></a> -->
		<a href="#" class="logo"><img src="../img/decorations/grubi-logo.jpg" alt=""></a>

		<nav class="navbar">
			<a href="admin.php">Volver</a>
			<!-- <a href="#">Administrador</a> -->
			<!-- <a href="delproducts.php">Eliminar</a> -->
			<!-- <a href="modproducts.php">Modificar</a> -->
		</nav>

		<div class="icons">
			<a href="perfil.php" class="fas fa-user"></a>
			<a href="logout.php" class="fas fa-right-from-bracket"></a>
		</div>
	</header>
<!-- header section end -->

	<section class="spacing"></section>
	<section class="spacing"></section>

<!-- products section start -->
	<section class="products catalogue">
		<h1 class="heading"><span> Bitácora </span>de Macetas</h1>
		<div class="admin products">
			<table class="table">
				<thead>
					<tr>
						<th class = "table">id</th>
						<th class = "table">accion</th>
						<th class = "table">usuario</th>
						<th class = "table">fecha</th>
						<th class = "table">sentencia</th>
						<th class = "table">contra-sentencia</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($row = mysqli_fetch_array($sql)) {
					?>
					<tr>
						<td class = "table" data-label = "idBitacora"><?php echo $row['idBitacora']?></td>
						<td class = "table" data-label = "accion"><?php echo $row['accion']?></td>
						<td class = "table" data-label = "user"><?php echo $row['user']?></td>
						<td class = "table" data-label = "fecha"><?php echo $row['fecha']?></td>
						<td class = "table" data-label = "executedSQL"><?php echo $row['executedSQL']?></td>
						<td class = "table" data-label = "reverseSQL"><?php echo $row['reverseSQL']?></td>
					</tr>
					<?php }	?>
				</tbody>
			</table>
		</div>
	</section>
<!-- products section start -->

<!-- footer section start -->
	<footer class="footer">
		<div class="credit"> created by <span> sly </span> <br> &copy; 2024 Grubi by <span> Tenko </span> | todos los derechos reservados </div>
	</footer>
<!-- footer section end -->
</body>
</html>