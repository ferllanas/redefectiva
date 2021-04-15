# redefectiva
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
			<p class="lead">Documentos</p>
				<ul>
          <li><a href="docs/Examen PHP-MySQL-Inscripcion alumnos.pdf">Requisitos Evaluación QA-MySQL</a></li>
					<li><a href="docs/redefectivaeval.sql">Script de Base de datos</a></li>
					<li><a href="docs/redefectivaeval.mwb">Modelo entidad relación en Workbench</a></li>
					<li><a href="https://bitbucket.org/ferllanas2017/redefectiva">Repositorio Bitbucket</a>
					<li><a href="https://github.com/ferllanas/redefectiva.git">Repositorio Github</a>
				</ul>
			<p class="lead">APP <a href="app/">Click aquí para empezar</a></p>
      <p class="lead ">Nota: </p>
			<p>El desarrollo de este proyecto en la parte del frontend se ha ralizado haciendo uso de php y javascript, el api(backend) es totalmente php y se utiliza conexion a base de datos por medio de pdo.</p>
		</div>
	</main>
