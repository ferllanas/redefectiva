<!doctype html>
<html class="" ng-app="qrforceApp" lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Fernando Llanas.">
		<meta name="generator" content="">
		<link rel="icon" type="image/vnd.microsoft.icon" href="" sizes="16x16">
		<title>Dasboard</title>

		<!-- Bootstrap core CSS -->
		<link type="text/css" href="app/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link type="text/css" href="app/assets/css/simply-toast.css" rel="stylesheet" />
		<link type="text/css" href="app/assets/css/jquery.toast.css" rel="stylesheet" />
		<link type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
		<link type="text/css" href="https://unpkg.com/ionicons@4.5.10-1/dist/css/ionicons.min.css" rel="stylesheet">

		<!-- styles --->
		<style>
			.container {
			    width: auto;
			    max-width: 680px;
			    padding: 0 15px;
			}
		</style>
	</head>
<body class="d-flex flex-column h-100">
	<!-- header -->
	<header class="navbar navbar-expand  flex-column flex-md-row bd-navbar  bg-gray">
		  <div class="container-fluid bd-highlight d-flex align-items-center">
			<a class="navbar-brand mr-0 mr-md-2 p-2 bd-highlight " href="./" aria-label="">
				<img class="header-logo" src="app/assets/images/logo.png" alt="Red Efectiva">
			</a>
			<span class="flex-row ml-md-auto pr-4 d-none d-md-flex" id="headerUserName">v 1.0</span>
		 </div>
	</header>
	<!-- header -->

	<!-- main -->
	<main class="flex-shrink-0 pb-4">
		<div class="container pb-4">
		    <h1 class="mt-5">Evaluación QA-MySQL</h1>
		    <p class="lead">Requirimiento:</p>
		    <p>Desarrollo de un aplicativo que considere el proceso de inscripción de alumnos. Los datos mínimos a considerar son:
		    	<ul>
					<li> Mátricula.</li>
					<li> Nombre (Nombre, apellido paterno, nombre).</li>
					<li> F. Nacimiento.</li>
					<li> Género.</li>
					<li> Grado escolar a ingresar.</li>
				</ul>
			</p>

			
			<p class="lead">La funcionalidad solicitada es:</p>
			<p>
		    	<ul>
					<li> Alta o registro de un nuevo alumno.</li>
					<li> Modificación de los datos del alumno.</li>
					<li> Baja de un alumno.</li>
					<li> Consultas.
						<ul>
							<li>Consulta/Listado de los alumnos de un cierto grado. (se indica cual es el grado a consultar).
							<li>Consulta donde se muestre el total de alumnos activos por grado.</li>
						</ul>
					</li>
				</ul>
			</p>	
			<hr>

			<h1 class="mt-5">API y Aplicación</h1>
			<p class="lead">API</p>
				<ul>
					<li>api.hp <span class="text-muted">API REST aplicación alumnos.</span>
								<p>Parámetros: 
									<ul>
										<li>object: <span class="text-muted">Modelo(alumno, genero).</span></li>
										<li>action: <span class="text-muted">Método(save, delete, search...).</span></li>
									</ul>
								</p>
					</li>
					<li>include/ 
						<ul>
							<li>class.DBPDO.php <span class="text-muted">Clase para la conexión con base de datos y llamadas a procedimientos almacenados.</span></li>
							<li>config.php <span class="text-muted">Archivo configuración y variables globales.</span></li>
							<li>objectColumns.php <span class="text-muted">Clase para obtener las columnas de una tabla determinada.</span></li>
						</ul>
					</li>
				</ul>
			<p class="lead">APP <a href="app/">Click aquí para empezar</a></p>
		</div>
	</main>
	<!-- main -->
	
	<!-- Footer -->
	<footer class="bg-light text-center text-lg-start fixed-bottom">
		<!-- Copyright -->
		<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
		    © 2021 Copyright:
			<a class="text-dark" href="docs/Currículum Fernando Llanas.pdf">J. Fernando Llanas Rodríguez</a>
		</div>
		<!-- Copyright -->
	</footer>
	<!-- Footer -->
		
	<script src="app/assets/jquery/jquery.min.js"></script>
	<script src="app/assets/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
	<script src="app/assets/jquery/jquery.toast.js"></script>

	<!-- Add in any FooTable dependencies we may need	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>	
	 -->
	<!-- Add in FooTable itself -->
	<script src="app/assets/footable-bootstrap/js/footable.js"></script>
	<!--<script src="assets/uploadifive/jquery.uploadifive.js"></script>-->
	<!--<script src="assets/js/jquery.mask.min.js"></script>-->

	<script src="app/assets/app/app.js"></script>
</body>
</html>