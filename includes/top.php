<?php
	$level = "";
	$bodyclass = "";
	$extras = "";
	echo "
	<!DOCTYPE html>
	<html lang='pt-br'>
	<head>
		<title>$page_title</title>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
		<meta name='description' content=''>
		<meta name='author' content='Ewerton H Marschalk'>
		<link rel='icon' href='https://getbootstrap.com/favicon.ico'>
		<!-- Bootstrap CSS -->
		<link href='$level/node_modules/bootstrap/compiler/bootstrap.css' rel='stylesheet'>
		<!-- Bootstrap Custom CSS -->
		<link href='$level/node_modules/bootstrap/compiler/style.css' rel='stylesheet'>";
		echo $extras;
	
	echo "
	</head>
	<body class='$bodyclass'>";
?>