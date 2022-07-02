<?= $this->extend('plantillas/navbar') ?>

<?= $this->section('titulo') ?>
<title>KiDo | Gestionar adopciones</title>
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
                    <div class="d-grid gap-2 col-2 mx-auto">
                        <a href="<?= site_url('Departamentos/cambiar')?>?idadop=<?=$detalleadopcion[0]->idAdopcion?>" class="btn btn-outline-success" type="button">Cambiar ubicación</a>
                    </div>
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
                        <a href="<?= site_url('Adopciones/editmostrardatos')?>?idadop=<?=$detalleadopcion[0]->idAdopcion?>&direccion=<?=$detalleadopcion[0]->direccion?>&descripcion=<?=$detalleadopcion[0]->descext?>" class="btn btn-outline-success" type="button">Editar</a>
                        <a href="<?= site_url('Adopciones/borraradopcion')?>?idadop=<?=$detalleadopcion[0]->idAdopcion?>" class="btn btn-outline-danger" type="button">Borrar</a>
						</br></br></br>
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
					</dl>                    
                <a href="<?= site_url('Mascotas/cambiar')?>?idadop=<?=$detalleadopcion[0]->idAdopcion?>" class="btn btn-outline-success" type="button">Cambiar mascota</a>
                </br></br></br>
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