<?php

?>

<div class="container container-fluid text-center pb-4">
	<h4 id="titleDasboard">Alumnos</h4>
	<button id="cancelSearch" class="btn btn-secondary btn-sm d-none">Cancelar busqueda</button>
	<!--<div class="btn-group-vertical">
	  <a href="registro.php" type="button" class="btn btn-primary" >Registro de nuevo Alumno</a>
	  <button type="button" class="btn btn-primary">Modificación de datos del Alumno</button>
	  <button type="button" class="btn btn-primary">Baja de Alumno</button>
	  <button type="button" class="btn btn-primary">Consultas</button>
	</div>-->

	<div id="lista-alumnos" class="d-flex px-4 justify-content-between flex-wrap flex-md-nowrap align-items-center pb-4">
  		<div class="box-body w-100">
  			<table class="table table-bordered table-hover table_alumnos" data-filtering="true" data-editing-allow-edit="true" data-filter-placeholder="Buscar" data-empty="Aún no tienes alumnos registrados" data-editing="true" data-show-toggle="false" data-toggle-column="last" data-editing-position="right" data-editing-always-show="true" ></table>
	    </div>
	</div>
	<div class="d-block d-sm-block d-md-flex flex-column justify-content-center align-items-center">
		<form class="pb-4 needs-validation" novalidate action="#" id="form-ver-listxgrupo">
			<div class="form-label-group mb-3">
				<label for="matricula" >* Grado</label>
				<input type="number" value="" id="grado" name="grado" placeholder="Ingresa grado a buscar. Ej: 6" class="form-control" min="1" max="6" required style="width: 200px;">
				<div class="invalid-feedback">
					        Por favor ingresa el grado escolar.
					  </div>
			</div>
			<div class="form-label-group mb-3">
				<button class="btn btn-primary">Buscar</button>
			</div>
		</form>
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