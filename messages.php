<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location: ./login.php");
}
include("./layout/nav.php");

include 'Controllers/UserController.php';
include 'Models/User.php';
include 'Controllers/CountryController.php';

$Status = new UserController();
$pstate = $Status->checkdata("status",$_SESSION["id"]);
if ($pstate != true) {
	$Status->updatestatus($_SESSION["id"],"status",1);
}
?>
<?php
if (isset($_POST['search'])) {
    $agef=$_POST["agef"];
    $aget=$_POST["aget"];
    $gander=$_POST["gander"];
    $country=$_POST["country"];
    $city=$_POST["city"];
    $status=$_POST["state"];
    $search = new UserController();
    $search->searchresult($agef,$aget,$gander,$country,$city,$status);
}
?>
<?php
include("./layout/footer.php");
?>
