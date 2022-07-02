<?= $this->extend('plantillas/navbar') ?>

<?= $this->section('titulo') ?>
<title>KiDo | Gestionar adopciones</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

  <div class="container">
	<div class="row">
		<div class="col-md-12">
      </br></br></br>
			<img alt="..." src="/Recursos/img/<?=$mascotas[0]->foto?>" class="rounded mx-auto d-block" width="500px" height="500px">
			<div class="row">
				<div class="col-md-12">
          <hr>
					<h2 class="text-center">
          <b><?=$mascotas[0]->petname?></b>
					</h2>
          <hr>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
          <dl>
						<dt><b>Información de la mascota</b></dt>
            </br>
						<dt>
            <b>Edad:</b>
						</dt>
						<dd>
              <?=$mascotas[0]->edad?> meses
						</dd>
						<dt>
            <b>Color:</b>
						</dt>
						<dd>
            <?=$mascotas[0]->color?>
						</dd>
            <dt>
            <b>Género:</b>
						</dt>
						<dd>
            <?=$mascotas[0]->genero?>
						</dd>
            <dt>
            <b>Descripción:</b>
						</dt>
						<dd>
            <?=$mascotas[0]->descr?>
						</dd>
            <dt>
            <b>Carácter:</b>
						</dt>
						<dd>
            <?=$mascotas[0]->caracter?>
						</dd>
						<dt>
            <b>Tamaño:</b>
						</dt>
						<dd>
            <?=$mascotas[0]->tamaño?>
						</dd>
					</dl>                    
                <a href="/DetMascota/editar" class="btn btn-info" type="button">Editar</a>
				<a href="/DetMascota/borrar" class="btn btn-danger" type="button">Borrar</a>
                </br></br></br>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>