<?php

@include 'config.php';

session_start();
if(!isset($_SESSION['admin_name'])){
	echo "<script>alert('You have to login first.')</script>";
	header('location:index.php');
}
session_unset();
session_destroy();

header('location:index.php');

?>