<?= $this->extend('plantillas/navbar') ?>

<?= $this->section('titulo') ?>
<title>KiDo | Resultados de la busqueda</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="container">
	<div class="row row-cols-1 row-cols-md-2 g-4">
		<div class="col-md-12">
			<br/><br/><br/>
			<h1><b>Resultados de la busqueda...</b></h1>
            </br>
			<div class="row row-cols-1 row-cols-md-4 g-4">
				<?php foreach ($adopcion as $v) : ?>
					<div class="col">
					<div class="card h-100"><!-- writable\ /-->
					<img src="/Recursos/img/<?=$v->foto?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?=$v->mascota?></h5>
						<p class="card-text"><?=$v->depto?></p>
						<a href="<?= site_url('DetalleAdopcion')?>?idadop=<?=$v->idAdopcion?>">Ver detalles...</a>
					</div>
					<div class="card-footer">
						<small class="text-muted"><?=$v->fecha?></small>
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