<?= $this->extend('plantillas/navbar') ?>

<?= $this->section('titulo') ?>
<title>KiDo | Seleccionar departamento</title>
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
            <h4>Seleccionando ubicación</h4>
            <p>Iniciemos indicando el lugar donde se ubica la mascota que será publicada...</p>

            <form action="<?= base_url('Departamentos/siguiente'); ?>" method="post">
            
                <div class="form-group">
                  <label for="depto"><b>Departamento </b>(Obligatorio)</label>
                  <select class = "form-control" name="depto" id="depto">
                    <option value="">Seleccionar el departamento</option>
                    <?php
                    foreach($departameto as $depto)
                    {
                        echo '<option value="'.$depto->idDepartamento.'">'.$depto->Nombre.'</option>';
                    }
                    ?>
				          </select>
				        </div>

                <div class="form-group d-grid">
                  <br />
                  <button class="btn btn-primary btn-block" type="submit">Siguiente</button>
                </div>
                
              </div>
                <div class="col-md-4">
		        </div>
      </div>
    </div>
    <?= $this->endSection() ?>