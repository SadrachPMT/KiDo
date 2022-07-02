<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= $this->renderSection('titulo') ?>

    <link rel="stylesheet" href="<?= base_url('/Recursos/bootstrap/css/bootstrap.min.css') ?>">

  </head>
  <body>

		<nav class="navbar fixed-top navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-md">
				<a class="navbar-brand" href="/Inicio">
				<img src="/Recursos/img/login.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">
				<b>KiDo</b>
				</a>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/Inicio">Inicio</a>
						</li>

						<?php if(!session()->has('loggedUser')){
							echo '<li class="nav-item">
							<a class="nav-link" href="/auth">Iniciar sesión</a>
							</li>';
						}						
						?>
						<!-- <li class="nav-item">
						<a class="nav-link" href="/auth">Iniciar sesión</a>
						</li> -->
                        
						<?php if(session()->has('loggedUser')){
							echo '<li class="nav-item">
							<a class="nav-link" href="/Departamentos">Publicar</a>
							</li>';
						}						
						?>
						<?php if(session()->has('loggedUser')){
							echo '<li class="nav-item">
							<a class="nav-link" href="/GestionarPerfil">Mi perfil</a>
							</li>';
						}						
						?>
						<?php if(session()->has('loggedUser')){
							echo '<li class="nav-item">
							<a class="nav-link" href="/Auth/cerrar_sesion">Cerrar sesión</a>
							</li>';
						}						
						?>
						<!-- <li class="nav-item">
						<a class="nav-link" href="/Auth/cerrar_sesion">Cerrar sesión</a>
						</li> -->
					</ul>
					<form class="d-flex" action="<?= base_url('Busqueda'); ?>" method="post">
						<input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" name="buscar" id="buscar">
						<button class="btn btn-outline-success" type="success">Buscar</button>
					</form>
				</div>
			</div>
		</nav>

        <?= $this->renderSection('content') ?>
        
  </body>
</html>