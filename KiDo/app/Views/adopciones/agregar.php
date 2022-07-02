<?= $this->extend('plantillas/navbar') ?>

<?= $this->section('titulo') ?>
<title>KiDo | Publicar adopción</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="container">
      <div class="row" style="margin-top:45px">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 col-md-offset-4">
          
            <br />
            <img src="/Recursos/img/login.jpg" class="rounded-circle mx-auto d-block" alt="..." width="150" height="150">
            <br />
            <h4>Publicando mascota</h4>
            <p>Solicitamos que nuestros usuarios sean responsables en las publicaciones de adopciones, ya que el bienestra animal no es un tema que deba tomarse a la ligera...</p>
            
            <form action="<?= base_url('Adopciones/agregar'); ?>" method="post">
                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('Error'))) : ?>
                  <div class="alert alert-danger"><?= session()->getFlashdata('Error'); ?></div>
                <?php endif?>

                <?php if(!empty(session()->getFlashdata('Enhorabuena'))) : ?>
                  <div class="alert alert-success"><?= session()->getFlashdata('Enhorabuena'); ?></div>
                <?php endif?>

                <div class="form-group">
                <label for="direccion"><b>Dirección </b>(Obligatorio)</label>
                <textarea class="form-control" aria-label="With textarea" id="descripcion" name="direccion" placeholder="Ingrese una dirección"></textarea>
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'direccion') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <label for="descripcion"><b>Descripción </b>(Obligatorio)</label>
                <textarea class="form-control" aria-label="With textarea" id="descripcion" name="descripcion" placeholder="Ingrese una descripción"></textarea>
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'descripcion') : '' ?></span>
                </div>

                <div class="form-group d-grid">
                  <br />
                  <button class="btn btn-primary btn-block" type="submit">Guardar</button>
                </div>
                <br/><br/><br/><br/>
              </div>
        <div class="col-md-4">
		    </div>
      </div>
    </div>
    
    <?= $this->endSection() ?>