<?php


/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
*/

error_reporting(-1);
ini_set('display_errors', 0);

require_once("include/conf.php");


?>

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
		<link type="text/css" href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link type="text/css" href="assets/css/simply-toast.css" rel="stylesheet" />
		<link type="text/css" href="assets/css/jquery.toast.css" rel="stylesheet" />
		<!-- styles --->
		<style></style>
		
	</head>
<body>

	<header class="navbar navbar-expand  flex-column flex-md-row bd-navbar  bg-gray">
	  <div class="container-fluid bd-highlight d-flex align-items-center">
		<a class="navbar-brand mr-0 mr-md-2 p-2 bd-highlight " href="./" aria-label="">
			<img class="header-logo" src="assets/images/logo-xl.png" alt="Red Efectiva">
		</a>
		<div>v 1.0</div>
		<span class="flex-row ml-md-auto pr-4 d-none d-md-flex" id="headerUserName"></span>
		<ul class="navbar-nav flex-row d-md-flex">
			<div class="btn-group">
				<button type="button"  class="btn btn-options btn-link text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><div data-row="even" class="img-circle rounded-circle" id="image-usuario" style="background: url(<?php echo $login->image;?>);"></div></button>
				<div class="dropdown-menu dropdown-options dropdown-menu-right text-center">
					<div class="arrow"></div>
					<div class="container my-2">
						<div class="row m-0">
						    <div class="col-10 p-0">
						    	<div class="d-flex flex-column align-items-start">
									<img src="<?php echo $login->image;?>" id="figUserImage" width="39px" class="figure-img img-fluid rounded" alt="<?php echo $login->first_name." ".$login->last_name;?>" />
								</div>
						    </div>
						    <div class="col-2 p-0">
						    	<div class="d-flex flex-column align-items-end">
						    		<button type="button" class="btn btn-link p-0" onclick="javascript:window.location='./cuenta'">
										<h4><i class="fa fa-sun-o" aria-hidden="true"></i></h4>
									</button>
								</div>
						    </div>
						</div>
						<div class="row m-0">
						    <div class="col-12 p-0">
						    	<div class="d-flex flex-column align-items-start">
							    	<figcaption class="figure-caption" id="figUsername">usuario</figcaption>
							  		<figcaption class="figure-caption" id="figUseremail">usuario@gmail.com</figcaption>
						  		</div>
						    </div>
						</div>
					</div>
					<div class="dropdown-divider"></div>
					<button type="button" class="btn btn-sm btn btn-link" onclick="javascript:window.location='./logout'">Cerrar sesión</button>
				</div>
			</div>
		</ul>
	 </div>
	</header>



