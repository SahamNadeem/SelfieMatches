<?php
ob_start();
session_start();
require 'Controllers/UserController.php';
include 'Models/User.php';
require 'Controllers/CountryController.php';
require 'Controllers/ChatController.php';
//if (isset($_SESSION["id"])) {
//    header("location: ./dashboard.php");
//}
include("./layout/nav.php");
?>
<style type="text/css">
	
	.sig{
		color: #df080f;
		font-weight: bold;
	}
	.card{
		padding: -50px;
		margin: 50px;
	}
</style>
<?php
if (isset($_GET["mail"])) 
	{
		$email = $_GET["mail"];
		$k = new UserController();
		$r = $k->checkuseremail($email);
		$_SESSION["id"] = $r->id;
	}
?>
<?php
if (isset($_POST["submit"])) {
	if ($_POST["age"]>18 && isset($_SESSION["id"])) {
		$name = $_POST["name"];
		$nick = $_POST["nick"];
		$age = $_POST["age"];
		$dob = $_POST["dob"];
		$country = $_POST["country"];
		$city = $_POST["city"];
		$gander = $_POST["gander"];
		$work = $_POST["work"];
		$password = $_POST["password"];
		$description = $_POST["des"];
		$about = $_POST["about"];
		$hobbies = $_POST["hobbies"];

		$r = new UserController();
		$t = $r->updateusertable('password',$password,$_SESSION["id"]);
		$t = $r->updateusertable('created_at',date('y-d-m'),$_SESSION["id"]);
		$t = $r->value($_SESSION["id"],$name,$nick,$age,$dob,$country,$city,$gander,$work,$description,$about,$hobbies);
		header("location: ./imgup.php");
	}elseif($_POST["age"]<18){
		echo '<div class="col-md-6 col-lg-offset-3" style="margin-top: 30px; border-radius: 10px;">
    <div class="card">
        <div class="card-content" style="background-color:#df080f ; color: white;">
            User are Not an adult You can not signup....<strong>Wait until you are 18!!!</strong>
            </button>
        </div>
        </div>
    </div>';
    $r = new UserController();
    $p =$r->deleteusersh($_SESSION["id"]);
    session_destroy();
	}else{
		header("location: ./email.php");
	}
}
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
		<div class="card">
			<div class="row">
				<h3><center>Fill the details</center></h3>
	<hr/>
			    <div class="col-md-12">
			        <form method="POST" action="./details.php">
			            <div class="row">
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label class="control-label">Name </label>
			                        <input type="text" name="name" placeholder="Entar full name" autofocus autocomplete="on" required minlength="10" class="form-control" />
			                    </div>
			                </div>
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label class="control-label">Nick </label>
			                        <input type="text" maxlength="15" minlength="15" required autocomplete="on" autofocus name="nick" placeholder="Enter Nick" class="form-control" />
			                    </div>
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label class="control-label">Age </label>
			                        <select name="age" required class="form-control">
			                            <option value="" selected>-- Enter your age --</option>
			                            <?php
				                        $userage = new UserController();
				                        $userage->age();
				                        ?>
			                        </select>
			                    </div>
			                </div>
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label class="control-label">Date of Birth</label>
			                        <input type="date" name="dob" required class="form-control" />
			                    </div>
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label class="control-label">Country </label>
			                        <select name="country" required class="form-control">
			                            <option value="" selected>-- Enter your country--</option>
			                            <?php
					                    $ctryObj = new CountryController();
										$rowr = $ctryObj->getdata();
										while ($row = mysqli_fetch_array($rowr)) {
											echo '<option value='.$row[0].'>'.$row[1].'</option>';
										}
					                    ?>
			                        </select>
			                    </div>
			                </div>
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label class="control-label">City </label>
			                        <select name="city" required class="form-control">
			                            <option value="" selected>-- Enter your city--</option>
			                            <?php
										$ctryObj = new CountryController();
										$rows = $ctryObj->getcitydata();
										while ($row = mysqli_fetch_array($rows)) {
											echo '<option value='.$row[0].'>'.$row[1].'</option>';
										}
					                    ?>
			                        </select>
			                    </div>
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label class="control-label">Gander </label>
			                        <select name="gander" required class="form-control">
			                            <option value="" selected>-- Enter your gander--</option>
			                            <option value="M">Male</option>
				                        <option value="F">Female</option>
				                        <option value="O">Others</option>
			                        </select>
			                    </div>
			                </div>
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label class="control-label">Work </label>
			                        <input type="text" name="work" placeholder="what do you work?" required class="form-control" />
			                    </div>
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label class="control-label">Password </label>
			                        <input type="password" name="password" placeholder="Enter password" required minlength="8" maxlength="33" class="form-control" />
			                    </div>
			                </div>
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label class="control-label">Description </label>
			                        <textarea name="des" placeholder="Enter description" required spellcheck="true" class="form-control" wrap="hard"></textarea>
			                    </div>
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label class="control-label">About </label>
			                        <textarea name="about" placeholder="Write something about you" required spellcheck="true" class="form-control" wrap="hard"></textarea>
			                    </div>
			                </div>
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label class="control-label">Hobbies </label>
			                        <textarea name="hobbies" placeholder="Write the things you like the most" required wrap="hard" class="form-control" spellcheck="true"></textarea>
			                    </div>
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-md-12">
			                    <button name="submit" class="btn btn-danger btn-block btn-lg" type="submit">Button</button>
			                </div>
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