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
			<a href="../index.php">Inicio</a>
			<a href="../html/login.html">Log in</a>
			<a href="#">Productos</a>
			<a href="../html/signup.html">Sign up</a>
		</nav>

		<div class="icons">
			<a href="#" class="fas fa-music"></a>
			<a href="#" class="fas fa-shopping-cart"></a>
			<a href="#" class="fas fa-user"></a>
		</div>
	</header>
<!-- header section end -->

	<section class="spacing"></section>
	<section class="spacing"></section>

<!-- more products section start -->
	<section class="products" id="products">
		<h1 class="heading"> <span> compra </span> antes de que se <span> acaben </span></h1>
		<p>Hemos creado tu nueva maceta inteligente, la cual te acompañará todos los días con tu música favorita.</p>
		<div class="box-container">
			<!-- El box-container debe ser display:flex, flex-wrap:wrap, gap:1.5rem -->
			<?php
				include("../connection.php");
				$sql = mysqli_query($con,"SELECT * FROM macetas WHERE unidades <= '10'");
				// $sql = mysqli_query($con,"SELECT * FROM users WHERE mail = '$mail' AND pass = '$pass'");
				while($row = mysqli_fetch_array($sql)) {
			?>
			<div class="box">
				<div class="image">
					<img src="../img/products/<?php echo $row['imagen']?>" alt="">
					<div class="icons">
						<a href="#" class="fas fa-heart"></a>
						<a href="createPDF.php" class="cart-btn" target="_blank">añade al carrito</a>
						<a href="#" class="fas fa-share"></a>
					</div>
				</div>
				<div class="content">
					<h3><?php echo $row['modelo']?></h3>
					<div class="price"> <?php echo $row['precio']?></div>
				</div>
			</div>
			<?php }	?>
		</div>
	</section>
<!-- more products section end -->

<!-- products section start -->
	<section class="products catalogue">
		<h1 class="heading"> catálogo de <span> productos </span></h1>
		<div class="box-container">
		<?php
				include("../connection.php");
				$q = mysqli_query($con, "SELECT * FROM macetas");
				while($row = mysqli_fetch_array($q)){
		?>
			<div class="box">
				<div class="image">
					<img src="../img/products/<?php echo $row['imagen']?>" alt="">
					<div class="icons">
						<a href="#" class="fas fa-heart"></a>
						<a href="createPDF.php" class="cart-btn" target="_blank">añade al carrito</a>
						<a href="#" class="fas fa-share"></a>
					</div>
				</div>
				<div class="content">
					<h3><?php echo $row['modelo']?></h3>
					<div class="price"> <?php echo $row['precio']?></div>
				</div>
			</div>
			<?php }	?>
		</div>
	</section>
<!-- products section start -->

<!-- footer section start -->
	<footer class="footer">
		<div class="box-container">
			<div class="box">
				<h3>Menú</h3>
				<a href="#banner">inicio</a>
				<a href="#about">sobre nosotros</a>
				<a href="#founders">fundadoras</a>
				<a href="#products">productos</a>
			</div>
			<div class="box">
				<h3>social</h3>
				<a href="https://discord.com">discord</a>
				<a href="https://facebook.com">facebook</a>
				<a href="https://instagram.com">instagram</a>
			</div>
			<div class="box">
				<h3>contacto</h3>
				<p>Tel: 33542983</p>
				<p class="email">tenko_grubimex@gmail.com</p>
				<p>Av. de la Paz 1701, Col Americana, Americana, 44160 Guadalajara, Jal.</p>
				<img src="images/payments.png" alt="">
			</div>
		</div>
		<div class="credit"> created by <span> sly </span> <br> &copy; 2024 Grubi by <span> Tenko </span> | todos los derechos reservados </div>
	</footer>
<!-- footer section end -->
</body>
</html>