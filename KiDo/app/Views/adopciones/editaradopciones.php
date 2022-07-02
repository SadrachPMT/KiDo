<?= $this->extend('plantillas/navbar') ?>

<?= $this->section('titulo') ?>
<title>KiDo | Editar adopciones</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
      <div class="row" style="margin-top:45px">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 col-md-offset-4">
          
            <br />
            <br />
            <h4>Editando publicación</h4>
            <p>Solicitamos que nuestros usuarios sean responsables en las publicaciones de adopciones, ya que el bienestra animal no es un tema que deba tomarse a la ligera...</p>
            
            <form action="<?= base_url('Adopciones/editaradopcion'); ?>" method="post">
                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('Error'))) : ?>
                  <div class="alert alert-danger"><?= session()->getFlashdata('Error'); ?></div>
                <?php endif?>

                <?php if(!empty(session()->getFlashdata('Enhorabuena'))) : ?>
                  <div class="alert alert-success"><?= session()->getFlashdata('Enhorabuena'); ?></div>
                <?php endif?>

                <div class="form-group">
                <label for="direccion"><b>Dirección </b>(Obligatorio)</label>
				<textarea class="form-control" aria-label="With textarea" id="direccion" name="direccion" placeholder="Ingrese una dirección"><?php echo $direc;?></textarea>
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'direccion') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <label for="descripcion"><b>Descripción </b>(Obligatorio)</label>
                <textarea class="form-control" aria-label="With textarea" id="descripcion" name="descripcion" placeholder="Ingrese una descripción"><?php echo $descripcion;?></textarea>
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'descripcion') : '' ?></span>
                </div>

                <div class="form-group d-grid">
                  <br />
                  <button class="btn btn-outline-success btn-block" type="submit">Guardar</button>
                </div>
                <br/><br/><br/><br/>
              </div>
        <div class="col-md-4">
		    </div>
      </div>
    </div>
	
	<?= $this->endSection() ?>