<?php  
session_start();
include 'Controllers/ChatController.php';
include 'Controllers/UserController.php';
include 'Models/User.php';
if (isset($_GET["data"]) && isset($_GET["recv"])) {
  $r = new ChatController();
  $j = $r->send($_GET["data"],$_GET["recv"]);
}

