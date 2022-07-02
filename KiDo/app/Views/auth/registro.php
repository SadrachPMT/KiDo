<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>KiDo | Registro</title>
    <link rel="stylesheet" href="<?= base_url('/Recursos/bootstrap/css/bootstrap.min.css') ?>">

  </head>

  <body>
    <div class="container">
      <div class="row" style="margin-top:45px">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 col-md-offset-4">

        <img src="/Recursos/img/login.jpg" class="rounded-circle mx-auto d-block" alt="..." width="150" height="150">
            <br />
            <h4>Registrarte</h4>
            <p>Es rápido y fácil.</p>
          
            <form action="<?= base_url('Auth/guardar'); ?>" method="post">
                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('Error'))) : ?>
                  <div class="alert alert-danger"><?= session()->getFlashdata('Error'); ?></div>
                <?php endif?>

                <?php if(!empty(session()->getFlashdata('Enhorabuena'))) : ?>
                  <div class="alert alert-success"><?= session()->getFlashdata('Enhorabuena'); ?></div>
                <?php endif?>

                <div class="form-group">
                <br />
                <label for="nombres"><b>Nombres </b>(Obligatorio)</label>
                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese sus nombres" value="<?= set_value('nombres'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nombres') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <label for="apellidos"><b>Apellidos</b></label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese sus apellidos" value="<?= set_value('apellidos'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'apellidos') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <label for="telefono"><b>Teléfono </b>(Obligatorio)</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su teléfono" value="<?= set_value('telefono'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'telefono') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <label for="correo"><b>Correo electrónico </b>(Obligatorio)</label>
                <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo" value="<?= set_value('correo'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'correo') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <label for="contraseña"><b>Contraseña </b>(Obligatorio)</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña" value="<?= set_value('contraseña'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'contraseña') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <input type="password" class="form-control" id="ccontraseña" name="ccontraseña" placeholder="Confirme su contraseña" value="<?= set_value('ccontraseña'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'ccontraseña') : '' ?></span>
                </div>

                <div class="form-group">
                  <br />
									<label for="tipousuario"><b>Tipo de usuario </b>(Obligatorio)</label>
									<select class = "form-control" name="tipousuario" id="tipousuario" value="<?= set_value('tipousuario'); ?>">
										<option selected>Seleccionar tipo de usuario</option>
										<option value="1">Persona</option>
										<option value="2">Organización</option>
									</select>
                  <span class="text-danger"><?= isset($validation) ? display_error($validation, 'tipousuario') : '' ?></span>
								</div>

                <div class="form-group d-grid">
                <br />
                <button class="btn btn-primary btn-block" type="submit">Registrarme</button>
                <hr/>
                <a href="<?= site_url('auth') ?>" class="btn btn-success" role="button">Ya tengo una cuenta</a>
                </div>
            </form>
          <br/><br/><br/><br/>
        </div>
        <div class="col-md-4">
		    </div>
      </div>
    </div>
  </body>
</html>