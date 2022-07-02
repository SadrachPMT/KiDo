<?= $this->extend('plantillas/navbar') ?>

<?= $this->section('titulo') ?>
<title>KiDo | Editar perfil</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="container">
      <div class="row" style="margin-top:45px">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 col-md-offset-4">

        <br /><br /><br />
        <h4>Editando perfil</h4>
          
            <form action="<?= base_url('GestionarPerfil/actualizar'); ?>" method="post">
                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('Error'))) : ?>
                  <div class="alert alert-danger"><?= session()->getFlashdata('Error'); ?></div>
                <?php endif?>

                <?php if(!empty(session()->getFlashdata('Enhorabuena'))) : ?>
                  <div class="alert alert-success"><?= session()->getFlashdata('Enhorabuena'); ?></div>
                <?php endif?>

                <div class="form-group">
                <label for="nombres"><b>Nombres </b>(Obligatorio)</label>
                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese sus nombres" value="<?php echo $nombres;?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nombres') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <label for="apellidos"><b>Apellidos</b></label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese sus apellidos" value="<?php echo $apellidos;?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'apellidos') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <label for="telefono"><b>Teléfono </b>(Obligatorio)</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su teléfono" value="<?php echo $telefono;?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'telefono') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <label for="correo"><b>Correo electrónico </b>(Obligatorio)</label>
                <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo" value="<?php echo $correo;?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'correo') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <label for="contraseña"><b>Contraseña </b>(Obligatorio)</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'contraseña') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <input type="password" class="form-control" id="ccontraseña" name="ccontraseña" placeholder="Confirme su contraseña">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'ccontraseña') : '' ?></span>
                </div>

                <div class="form-group">
                  <br />
									<label for="tipousuario"><b>Tipo de usuario </b>(Obligatorio)</label>
									<select class = "form-control" name="tipousuario" id="tipousuario" value="<?php echo $idtipousuario;?>">
										<option selected>Seleccionar tipo de usuario</option>
										<option value="1">Persona</option>
										<option value="2">Organización</option>
									</select>
                  <span class="text-danger"><?= isset($validation) ? display_error($validation, 'tipousuario') : '' ?></span>
								</div>

                <div class="form-group d-grid">
                <br />
                <button class="btn btn-outline-success btn-blockk" type="submit">Actualizar</button>
          <br/><br/><br/><br/>
        </div>
        <div class="col-md-4">
		    </div>
      </div>
    </div>

    <?= $this->endSection() ?>