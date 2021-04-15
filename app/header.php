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
		<link type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
		<link type="text/css" href="https://unpkg.com/ionicons@4.5.10-1/dist/css/ionicons.min.css" rel="stylesheet">

		<link type="text/css" href="assets/css/app.css" rel="stylesheet" />
		<!-- styles --->
		<style></style>
		
	</head>
<body>

	<header class="navbar navbar-expand  flex-column flex-md-row bd-navbar  bg-gray">
	  <div class="container-fluid bd-highlight d-flex align-items-center">
		<a class="navbar-brand mr-0 mr-md-2 p-2 bd-highlight " href="./" aria-label="">
			<img class="header-logo" src="assets/images/logo.png" alt="Red Efectiva">
		</a>
		<span class="flex-row ml-md-auto pr-4 d-none d-md-flex" >v 1.0</span>
		
	 </div>
	</header>



