<?php
session_start();
include 'Controllers/LikeController.php';
include 'Models/Connection.php';

if (isset($_GET["id"])) {
	$like = new LikeController();
	$result  = $like->likeuser($_SESSION["id"],$_GET["id"]);
	if ($result) {
		echo "Ho gya!";
	}
}
if (isset($_GET["did"])) {
	$like = new LikeController();
	$result  = $like->dislikeuser($_SESSION["id"],$_GET["did"]);
	if ($result) {
		echo "Ho gya!";
	}
}