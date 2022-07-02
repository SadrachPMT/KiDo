<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>KiDo | Inicio de sesión</title>
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
            <h4>Iniciar sesión en KiDo</h4>
          
          <form action="<?= base_url('Auth/login'); ?>" method="post">
            <?= csrf_field(); ?>
            <?php if(!empty(session()->getFlashdata('Error'))) : ?>
              <div class="alert alert-danger"><?= session()->getFlashdata('Error'); ?></div>
            <?php endif?>

            <div class="form-group">
              <br />
              <label for="correo"><b>Correo electrónico</b></label>
              <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo" value="<?= set_value('correo'); ?>">
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'correo') : '' ?></span>
            </div>

            <div class="form-group">
              <br />
              <label for="contraseña"><b>Contraseña</b></label>
              <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña" value="<?= set_value('contraseña'); ?>">
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'contraseña') : '' ?></span>
            </div>

            <div class="form-group d-grid">
              <br />
              <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
            </div>
            <hr/>
            <p class="help-block">
              ¿Aún no tienes una cuenta?
              <a href="<?= site_url('auth/registro') ?>">Crea una acá</a>
            </p>
          </form>
        </div>
        <div class="col-md-4">
		    </div>
      </div>
    </div>
  </body>
</html>