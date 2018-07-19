<?php
session_start();
ob_start();
require 'Controllers/UserController.php';
include 'Models/User.php';
require 'Controllers/MessageController.php';
require 'Models/Messages.php';

if (isset($_SESSION["id"])) {
    header("location: ./dashboard.php");
}
include("./layout/nav.php");
?>
<style type="text/css">
	#downrow{
		margin: 80px;
	}
	.sig{
		color: #df080f;
		font-weight: bold;
	}
</style>
<?php
if (isset($_POST["submit"])) {
	$email = $_POST["email"];
	$r = new MessageController();
	$k = $r->sendtofgps($email);
	if ($k == true) {
		header("location: ./forget.php?send=".$email."");
	}else{
		header("location: ./forget.php");
	}
}
if (!isset($_GET['send'])) {
		echo '<div class="row" id="downrow">
		<center class="sig"><h3>Forget Your old Password?</h3>
		<h3>Recover it now....</h3></center>
	    <div class="col-md-6 col-md-offset-3">
			<div class="card">
				<div class="row">
				    <div class="col-md-12">
				        <form action="./forget.php" method="POST">
				            <div class="form-group">
				                <label class="control-label">Enter Email </label>
				                <input type="email" placeholder="Email Address" name="email" autofocus autocomplete="off" required class="form-control" id="email" />
				            </div>
				            <div class="form-group">
				                <button name="submit" class="btn btn-danger btn-block" type="submit">Send</button>
				            </div>
				        </form>
				    </div>
				</div>           
			</div>
		</div>
	</div>';
	}else{
		echo '<div class="row" id="downrow">
		<center class="sig"><h3>Forget Your old Password?</h3>
		<h3>Recover it now....</h3></center>
	    <div class="col-md-6 col-md-offset-3">
		<div class="alert alert-info" role="alert">
			  your request has been succesfully sent you be shortly receive and email at <strong>'.$_GET['send'].'</strong>
			</div></div></div></div>';
	}
?>
<?php
include("./layout/footer.php");
?>