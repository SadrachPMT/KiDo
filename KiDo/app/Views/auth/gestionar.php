<?= $this->extend('plantillas/navbar') ?>

<?= $this->section('titulo') ?>
<title>KiDo | Gestionar perfil</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

  <div class="container">
	<div class="row">
		<div class="col-md-12">
      </br></br></br>
            <img src="/Recursos/img/login.jpg" class="rounded-circle mx-auto d-block" alt="..." width="150" height="150">
			<div class="row">
				<div class="col-md-12">
          <hr>
					<h2 class="text-center">
          <b><?=$result[0]->nombres?> <?=$result[0]->apellidos?></b>
					</h2>
          <hr>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
            <dl>						
            <dt><b>Información del usuario</b></dt>
            </br>
            <dt>
            <b>Tipo de usuario:</b>
						</dt>
						<dd>
            <?=$result[0]->tipousuario?>
						</dd>
            <dt>
            <b>Número de teléfono:</b>
						</dt>
						<dd>
            <?=$result[0]->telefono?>
						</dd><dt>
            <b>Correo electrónico:</b>
						</dt>
						<dd>
            <?=$result[0]->correo?>
						</dd>
            </br>
					</dl>
                    <div class="form-group d-grid">
                        <a href="<?= site_url('GestionarPerfil/edit')?>?idusuario=<?=$result[0]->idusuario?>&nombres=<?=$result[0]->nombres?>&apellidos=<?=$result[0]->apellidos?>&contraseña=<?=$result[0]->contraseña?>&correo=<?=$result[0]->correo?>&telefono=<?=$result[0]->telefono?>&idtipousuario=<?=$result[0]->idtipousuario?>" class="btn btn-outline-success" type="button">Editar mi información</a>
                        </br>
                        <a href="<?= site_url('/ListarxUser')?>?idusuario=<?=$result[0]->idusuario?>" class="btn btn-outline-success" type="button">Gestionar publicaciones</a>
                        </br>
                        <a href="<?= site_url('/MasxUser')?>" class="btn btn-outline-success" type="button">Gestionar mascotas</a>
                    </div>
						</br></br></br>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>