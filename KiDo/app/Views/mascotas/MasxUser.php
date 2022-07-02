<?= $this->extend('plantillas/navbar') ?>

<?= $this->section('titulo') ?>
<title>KiDo | Mis mascotas</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="container">
	<div class="row row-cols-1 row-cols-md-2 g-4">
		<div class="col-md-12">
			<br/><br/><br/>
			<h1><b>Mascotas de <?=$mascotas[0]->nombres?> <?=$mascotas[0]->apellidos?></b></h1>
            </br>
			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  				<a href="<?= site_url('Mascotas')?>" class="btn btn-success" type="button">Agregar mascota</a>
			</div>
			</br>
			<div class="row row-cols-1 row-cols-md-4 g-4">
				<?php foreach ($mascotas as $v) : ?>
					<div class="col">
					<div class="card h-100"><!-- writable\ /-->
					<img src="/Recursos/img/<?=$v->foto?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?=$v->petname?></h5>
						<a href="<?= site_url('DetMascota')?>?idmascota=<?=$v->idmascota?>" class="btn btn-dark">Gestionar...</a>
					</div>
					</div>
				</div>
				<?php endforeach ?>
				
			</div>
		</div>
	</div>
	<br/><br/>
	<!-- <...borrar?= $pager->links() ?> -->
	
	<?= $this->endSection() ?>