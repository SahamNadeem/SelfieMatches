<?php
session_start();
ob_start();
require 'Controllers/UserController.php';
include 'Models/User.php';
require 'Controllers/ChatController.php';
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
	$r = new UserController();
	$k = $r->checkemail($email);
	if ($k == false) {
		$j = $r->saveuser('username',$email);
		echo $o;
		header("location: ./details.php?mail=".$email);
	}else{
		echo '<div class="col-md-6 col-lg-offset-3" style="margin-top: 30px; border-radius: 10px;">
    <div class="card">
        <div class="card-content" style="background-color:#df080f ; color: white;">
            Email already Exist. <strong>Try Again!!!</strong>
            </button>
        </div>
        </div>
    </div>';
	}
}
?>
	<div class="row" id="downrow">
		<center class="sig"><h3>what aare you waiting for...?</h3>
		<h3>Sign Up now</h3></center>
	    <div class="col-md-6 col-md-offset-3">
			<div class="card">
				<div class="row">
				    <div class="col-md-12">
				        <form action="./email.php" method="POST">
				            <div class="form-group">
				                <label class="control-label">Enter Email </label>
				                <input type="email" placeholder="Email Address" name="email" autofocus autocomplete="off" required class="form-control" id="email" />
				            </div>
				            <div class="form-group">
				                <button name="submit" class="btn btn-danger btn-block" type="submit">Button</button>
				            </div>
				        </form>
				    </div>
				</div>           
			</div>
		</div>
	</div>
<?php
include("./layout/footer.php");
?>