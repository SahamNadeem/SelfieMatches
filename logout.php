<?php
session_start();
include 'Controllers/UserController.php';
include 'Models/User.php';
if (isset($_SESSION["id"])) {
	$status = new UserController();
	$r = $status->updateusertable('status',0,$_SESSION["id"]);
	session_destroy();
	header('location: ./login.php');
}else{
    header('location: ./login.php');
}
if (isset($_SESSION['admin'])) {
	session_destroy();
	header('location: ./login.php');
}else{
    header('location: ./login.php');
}
?>