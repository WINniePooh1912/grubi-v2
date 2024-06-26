<?php
	include "../connection.php";
	$sql = mysqli_query($con, "SELECT * FROM macetas");
	session_start();
	if(!isset($_SESSION['id_owner'])){
		$msg = "No se ha iniciado sesión";
		header("refresh:1; url=../html/login.html");
		echo '<div>'.$msg.'</div>';
		echo '<p>Serás redirigido al log in en 5 segundos.</p>';
	// header("Location: products.php");
	exit;
	}
?>

<?php
	if(!isset($_GET['sku'])){
		header("Location: admin.php");
	}

	// ubicar el sku del producto a editar
	$sku = $_GET['sku'];
	$sql = mysqli_query($con, "SELECT * FROM macetas WHERE sku = '$sku'");
	while($row = mysqli_fetch_array($sql)){
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registra macetas</title>

	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

	<!-- css file -->
	<link href="../css/style.css" rel="stylesheet">
</head>
<body class="signup-login">
	<!-- header section start -->
	<header>
		<input type="checkbox" id="toggler">
		<label for="toggler" class="fas fa-bars"></label>

		<a href="../index.php" class="logo"><img src="../img/decorations/grubi-logo.jpg" alt=""></a>

		<nav class="navbar">
			<a href="admin.php">Inicio de Administrador</a>
		</nav>

		<div class="icons">
			<a href="perfil.php" class="fas fa-user"></a>
			<a href="logout.php" class="fas fa-right-from-bracket"></a>
		</div>
	</header>
<!-- header section end -->


<!-- edición section start -->
<section class="form">
		<div class="container edit">
			<form action="editProduct.php" method="post">
				<h1 class = "edit">Maceta #<?php echo $row['sku']; ?></h1>
					<input type="hidden" name="sku" value="<?php echo $row['sku']; ?>">
				<label>categoría</label>
				<div class="input-box edit">
					<input type="text"  name="categoria" placeholder="<?php echo $row['categoria']; ?>">
					<i class="fas fa-gears"></i>
				</div>
				<label>características</label>
				<div class="input-box edit">
					<input type="text"  name="caracteristicas" placeholder="<?php echo $row['caracteristicas']; ?>">
					<i class="fas fa-note-sticky"></i>
				</div>
				<label>precio</label>
				<div class="input-box edit">
					<input type="text"  name="precio" placeholder="<?php echo $row['precio']; ?>">
					<i class="fas fa-money-bill"></i>
				</div>
				<label>unidades</label>
				<div class="input-box edit">
					<input type="number"  name="unidades" placeholder="<?php echo $row['unidades']; ?>">
					<i class="fas fa-hashtag"></i>
				</div>
				<label>modelo</label>
				<div class="input-box edit">
					<input type="text"  name="modelo" placeholder="<?php echo $row['modelo']; ?>">
					<i class="fas fa-pen-to-square"></i>
				</div>
				<label>imagen</label>
				<div class="input-box edit">
					<input type="text"  name="imagen" placeholder="<?php echo $row['imagen']; ?>">
					<i class="fas fa-image"></i>
				</div>

				<input type="submit" class="btn" value="Editar producto">
			</form>
		</div>
	</section>
<!-- edición section end -->

<?php
    }
?>
</body>
</html>