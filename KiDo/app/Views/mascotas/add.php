<?= $this->extend('plantillas/navbar') ?>

<?= $this->section('titulo') ?>
<title>KiDo | Agregar mascota</title>
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
            <h4>Agregando mascota</h4>
            <p>Se solicita seriedad al añadir mascotas.</p>
            <p>KiDo es un sitio para dar oportunidades a mascotas que por diversos motivos no pueden estar más en su hogar.</p>
            <p>Por favor evitar registrar mascotas de memes o las de tus amigos solamente porque te parece divertido...</p>
            
            <form action="<?= base_url('Mascotas/agregar'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <?php
                  if(!empty(session()->getFlashdata('Error'))) : ?>
                  <div class="alert alert-danger"><?= session()->getFlashdata('Error'); ?></div>
                <?php endif?>

                <div class="form-group">
					        <label for="categoria"><b>Categoría </b>(Obligatorio)</label>
					        <select class = "form-control" name="categoria" id="categoria">
                  <option selected>Seleccionar la categoría</option>
                  <option value="1">Perro</option>
                  <option value="2">Gato</option>
					        </select>
                  <span class="text-danger"><?= isset($validation) ? display_error($validation, 'categoria') : '' ?></span>
				        </div>

                <div class="form-group">
                <br />
                <label for="nombre"><b>Nombre </b>(Obligatorio)</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la mascota">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nombre') : '' ?></span>
                </div>

                <div class="form-group">
                <br />
                <label for="edad"><b>Edad (meses)</b></label>
                <input type="text" class="form-control" id="edad" name="edad" placeholder="Ingrese la edad de la mascota">
                </div>

                <div class="form-group">
                <br />
                <label for="color"><b>Color</b></label>
                <input type="text" class="form-control" id="color" name="color" placeholder="Ingrese el color de la mascota" >
                </div>

                <div class="form-group">
                <br />
                <label for="descripcion"><b>Descripción </b>(Obligatorio)</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de la mascota">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'descripcion') : '' ?></span>
                </div>

                <div class="form-group">
                  <br />
                  <label for="genero"><b>Género</b></label>
                  <select class = "form-control" name="genero" id="genero">
                    <option selected>Seleccionar el género</option>
                    <option value="1">Macho</option>
                    <option value="2">Hembra</option>
                    <option value="3">Desconocido</option>
					        </select>
                  <span class="text-danger"><?= isset($validation) ? display_error($validation, 'genero') : '' ?></span>
				        </div>

                <div class="form-group">
                  <br />
                  <label for="caracter"><b>Carácter </b>(Obligatorio)</label>
                  <select class = "form-control" name="caracter" id="caracter">
                    <option selected>Seleccionar el carácter</option>
                    <option value="1">Tímido</option>
                    <option value="2">Agresivo</option>
                    <option value="3">Alegre</option>
                    <option value="4">Cariñoso</option>
                    <option value="5">Amigable</option>
					        </select>
                  <span class="text-danger"><?= isset($validation) ? display_error($validation, 'caracter') : '' ?></span>
				        </div>

                <div class="form-group">
                  <br />
                  <label for="tamaño"><b>Tamaño </b>(Obligatorio)</label>
                  <select class = "form-control" name="tamaño" id="tamaño">
                    <option selected>Seleccionar el tamaño</option>
                    <option value="1">Enano</option>
                    <option value="2">Pequeño</option>
                    <option value="3">Mediano</option>
                    <option value="4">Grande</option>
                    <option value="5">Muy grande</option>
					        </select>
                  <span class="text-danger"><?= isset($validation) ? display_error($validation, 'tamaño') : '' ?></span>
				        </div>

                <div class="form-group">
                  <br />
                <label for="userfile"><b>Agregar foto </b>(Obligatorio)</label>
                  <input type="file" name="userfile" class="form-control" id="userfile"/>
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