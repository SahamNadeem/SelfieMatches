<?php
session_start();
include 'Controllers/BlockController.php';
include 'Models/Connection.php';

if (isset($_GET["id"])) {
	$block = new BlockController();
	$result  = $block->block($_SESSION["id"],$_GET["id"]);
	if ($result) {
		echo "Ho gya!";
	}
}
if (isset($_GET["did"])) {
	$block = new BlockController();
	$result  = $block->unblock($_SESSION["id"],$_GET["did"]);
	if ($result) {
		echo "Ho gya!";
	}
}