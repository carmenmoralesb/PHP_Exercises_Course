<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Tienda de Camisetas</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/styles.css" />
	</head>
	<body>
		<div class="container-fluid">
			<?php $categorias = Utils:: mostrarCats(); ?>
			<nav class="navbar navbar-expand-lg static-top" style="background-color:#1C1B1B">
			<a class="navbar-brand" href="index.php">
				<img class="img-fluid" src="https://www.ellisons.co.uk/media/image/fd/43/db/sw-Sleek-logo.png" width="100%" style="max-width: 30%" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive" style="color:white">
			<ul class="navbar-nav">
					<?php while($categoria = $categorias->fetchObject()) { ?>
						<li class="nav-item">
							<a class="nav-link" href="index.php?c=Categoria&a=ver&id=<?=$categoria->id?>"><?=$categoria->nombre?></a>
						</li>
					<?php } ?>
				</ul>
			</nav>

			<div id="content">