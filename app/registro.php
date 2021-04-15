<?php

require( dirname( __FILE__ ) .'/header.php' );

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $hostMaster."/api.php?action=get_generos");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
curl_close($ch);

$generos = json_decode($res);

$alumno = new stdClass();
if(isset($_GET['alumnoid']) && (int)$_GET['alumnoid']>0){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $hostMaster."/api.php?object=alumno&action=get_alumno&id=".$_GET['alumnoid']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$res = curl_exec($ch);
	curl_close($ch);


	if(count($res)>0)
		$alumno = json_decode($res)[0];


}

?>

<div class="container pb-4">
	<div class="main">
		<div class="py-5 text-center">
	      <!--<img class="d-block mx-auto mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
	      <h2>Registro de nuevo estudiante</h2>
	      <!--<p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>-->
	    </div>
		<div class="row">
			<div class="d-xs-none  col-md-2 col-lg-2 col-xl-2"></div>
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8  flex-column justify-content-center align-items-center">
				<form class="pb-4 needs-validation" novalidate action="#" id="form-nalumno">

				  <fieldset class="pb-4">
				    <div class="form-label-group mb-3">
					    <label for="matricula" >* Matrícula</label>
					    <input type="number" id="matricula" name="matricula" class="form-control" placeholder="Ej. 452865" min="1" max="999999999999" value="<?php echo isset($alumno->matricula)? $alumno->matricula: '0';?>" required>
						<div class="invalid-feedback">
					        Por favor ingresa la matrícula.
					    </div>

					    <input type="hidden" id="idalumno" name="idalumno" value="<?php echo isset($alumno->id)? $alumno->id: '0';?>">
				    </div>
				    <div class="form-label-group mb-3">
				      <label for="nombre" class="form-label">* Nombre</label>
				      <input type="text" id="nombre" name="nombre" value="<?php echo isset($alumno->nombre)? $alumno->nombre: '';?>" minlength="3" maxlength="70" class="form-control" placeholder="Ej. Edilberto" required>
				      <div class="invalid-feedback">
					        Por favor ingresa la nombre del alumno.
					  </div>
				    </div>
				    <div class="form-label-group mb-3">
				      <label for="appat" class="form-label">* Apellido paterno</label>
				      <input type="text" id="appat" name="appat" value="<?php echo isset($alumno->appat)? $alumno->appat: '';?>" minlength="3" maxlength="40" class="form-control" placeholder="Ej. Llanas" required>
				      <div class="invalid-feedback">
					        Por favor ingresa la apellido paterno del alumno.
					  </div>
				    </div>
				    <div class="form-label-group mb-3">
				      <label for="apmat" class="form-label">* Apellido materno</label>
				      <input type="text" id="apmat" name="apmat" value="<?php echo isset($alumno->apmat)? $alumno->apmat: '';?>"  minlength="3" maxlength="40" class="form-control" placeholder="Ej. Martinez" required>
				      <div class="invalid-feedback">
					        Por favor ingresa la apellido materno del alumno.
					  </div>
				    </div>
				    <div class="form-label-group mb-3">
				      <label for="fecnac" class="form-label">* Fecha nacimiento</label>
				      <input type="date" id="fecnac" name="fecnac" value="<?php echo isset($alumno->fnac)? $alumno->fnac: '';?>"  class="form-control" pattern="^([0-2][0-9]||3[0-1])/(0[0-9]||1[0-2])/([0-9][0-9])?[0-9][0-9]$" placeholder="2021/04/19" required>
				      <div class="invalid-feedback">
					        Por favor ingresa la fecha de nacimiento del alumno.
					  </div>
				    </div>
				    <div class="form-label-group mb-3">
				      <label for="genero" class="form-label">* Genero</label>
				      <select id="genero" name="genero" class="form-select" required>
				      <?php foreach ($generos as $key => $genero) {
				      	# code...
				      	?>
				      		<option value="<?php echo $genero->id;?>" <?php echo isset($alumno->generos_id)? (($genero->id==$alumno->generos_id)? "selected": '' ):'';?>><?php echo $genero->nombre;?></option>
				      	<?php
				      }
				      ?>
				      
				        
				      </select>
				      <div class="invalid-feedback">
					        Por favor selecciona el genero del alumno.
					  </div>
				    </div>
				    <div class="form-label-group mb-3">
				      <label for="grado" class="form-label">* Grado escolar</label>
				      <input type="number" min="1" max="6" step="1" value="<?php echo isset($alumno->grado_ingresar)? $alumno->grado_ingresar: '1';?>" id="grado" name="grado" class="form-control" placeholder="Ej. 1" required>
				      <div class="invalid-feedback">
					        Por favor ingresa el grado escolar.
					  </div>
				    </div>
				    <div class="form-label-group mb-3 text-center">
				    	<button type="submit" class="btn btn-primary">Guardar</button>
				    </div>
				  </fieldset>
				</form>
			</div>
			<div class="d-xs-none  col-md-2 col-lg-2 col-xl-2"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	(function () {
  		'use strict'

  		var forms = document.querySelectorAll('.needs-validation')

	  	Array.prototype.slice.call(forms)
	    .forEach(function (form) {
	      form.addEventListener('submit', function (event) {
	        if (!form.checkValidity()) {
	          event.preventDefault()
	          event.stopPropagation()
	        }

	        form.classList.add('was-validated')
	      }, false)
	    })
	})()

</script>

<?php 
require( dirname( __FILE__ ) .'/footer.php' );
?>