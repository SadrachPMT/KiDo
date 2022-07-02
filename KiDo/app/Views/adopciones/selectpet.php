<?= $this->extend('plantillas/navbar') ?>

<?= $this->section('titulo') ?>
<title>KiDo | Seleccionar mascota</title>
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
            <h4>Seleccionando la mascota</h4>
            <p>A continuación, selecciona la mascota que quieres publicar para dar en adopción.</p>
            <p>Si no tienes una, puedes añadirla siguiendo en enlace en la parte inferior.</p>

            <form action="<?= base_url('Mascotas/siguiente'); ?>" method="post">
            
                <div class="form-group">
                  <label for="mascota"><b>Mascota </b>(Obligatorio)</label>
                  <select class = "form-control" name="mascota" id="mascota">
                    <option value="">Seleccionar la mascota</option>
                    <?php
                    foreach($mascota as $pet)
                    {
                        echo '<option value="'.$pet->idMascota.'">'.$pet->Nombre.'</option>';
                    }
                    ?>
				          </select>
				        </div>

                <div class="form-group d-grid">
                  <br />
                  <button class="btn btn-primary btn-block" type="submit">Siguiente</button>
                </div>
                <hr/>
                <p class="help-block">
                  ¿Aún no tienes una mascota registrada?
                  <a href="<?= site_url('Mascotas') ?>">Hazlo acá</a>
                </p>
                
              </div>
                <div class="col-md-4">
		        </div>
      </div>
    </div>
    
    <?= $this->endSection() ?>