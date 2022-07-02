<?= $this->extend('plantillas/navbar') ?>

<?= $this->section('titulo') ?>
<title>KiDo | Detalle de mascota</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

  <div class="container">
	<div class="row">
		<div class="col-md-12">
      </br></br></br>
			<img alt="..." src="/Recursos/img/<?=$detalleadopcion[0]->foto?>" class="rounded mx-auto d-block" width="500px" height="500px">
			<div class="row">
				<div class="col-md-12">
          <hr>
					<h2 class="text-center">
          <b><?=$detalleadopcion[0]->mascota?></b>
					</h2>
          <hr>
          <p class="text-center text-muted">
          <b>Ubicado en: </b><?=$detalleadopcion[0]->depto?>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
        <dl>
						<dt><b>Información de la oferta de adopcón</b></dt>
            </br>
            <dt>
            <b>Dirección:</b>
						</dt>
						<dd>
            <?=$detalleadopcion[0]->direccion?>
						</dd>
            <dt>
            <b>Descripción:</b>
						</dt>
						<dd>
            <?=$detalleadopcion[0]->descext?>
						</dd>
            </br>
					</dl>
          <hr>
          <p class="text-muted">
          <b>Fecha de publicacion:</b> <?=$detalleadopcion[0]->fecha?>
					</p>
				</div>
				<div class="col-md-4">
          <dl>
						<dt><b>Información de la mascota</b></dt>
            </br>
						<dt>
            <b>Edad:</b>
						</dt>
						<dd>
              <?=$detalleadopcion[0]->edad?> meses
						</dd>
						<dt>
            <b>Color:</b>
						</dt>
						<dd>
            <?=$detalleadopcion[0]->color?>
						</dd>
            <dt>
            <b>Género:</b>
						</dt>
						<dd>
            <?=$detalleadopcion[0]->genero?>
						</dd>
            <dt>
            <b>Descripción:</b>
						</dt>
						<dd>
            <?=$detalleadopcion[0]->petdesc?>
						</dd>
            <dt>
            <b>Carácter:</b>
						</dt>
						<dd>
            <?=$detalleadopcion[0]->caracter?>
						</dd>
						<dt>
            <b>Tamaño:</b>
						</dt>
						<dd>
            <?=$detalleadopcion[0]->tamaño?>
						</dd>
            </br>
					</dl>
				</div>
				<div class="col-md-4">
        <dl>						
            <dt><b>Información del usuario</b></dt>
            </br>
            <dt>
            <b>Nombre:</b>
						</dt>
						<dd>
            <?=$detalleadopcion[0]->nombresuser?> <?=$detalleadopcion[0]->apellidosuser?>
						</dd>
            <dt>
            <b>Número de teléfono:</b>
						</dt>
						<dd>
            <?=$detalleadopcion[0]->tel?>
						</dd><dt>
            <b>Correo electrónico:</b>
						</dt>
						<dd>
            <?=$detalleadopcion[0]->correo?>
						</dd>
            </br>
					</dl>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>