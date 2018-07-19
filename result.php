<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location: ./login.php");
}
if (!isset($_GET["watch"])) {
    header("location: ./dashboard.php");
}
include("./layout/nav.php");

include 'Controllers/UserController.php';
include 'Models/User.php';
include 'Controllers/CountryController.php';
?>
<div class="row" id="rowsearch" style="background-color: #df080f;">
    <div class="col-md-12">
        <form method="POST" action="./dashboard.php">
            <div class="col-md-1" id="sahamcol" style="padding: 10px;">
            	<label style="color: white;">From</label>
                <select class="form-control" name="agef">
                	<option value="">Age</option>
                        <?php
                        $userage = new UserController();
                        $userage->age();
                        ?>
                </select>
            </div>
            <div class="col-md-1" id="saham" style="padding: 10px;">
            	<label style="color: white;">To</label>
                <select class="form-control" name="aget">
                	<option value="">Age</option>
                       	<?php
                        $userage->age();
                        ?>
                </select>
            </div>
            <div class="col-md-2" id="saham" style="padding: 10px;">
            	<label style="color: white;">Gander</label>
                <select class="form-control" name="gander">
                		<option value="">Select Gander</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Others</option>
                </select>
            </div>
            <div class="col-md-2" id="saham" style="padding: 10px;">
            	<label style="color: white;">country</label>
                <select class="form-control" name="country">
                	<option value="">Select Country</option>
                    <?php
                    $ctryObj = new CountryController();
					$rowr = $ctryObj->getdata();
					while ($row = mysqli_fetch_array($rowr)) {
						echo '<option value='.$row[0].'>'.$row[1].'</option>';
					}
                    ?>
                </select>
            </div>
            <div class="col-md-2" id="saham" style="padding: 10px;">
            	<label style="color: white;">city</label>
                <select class="form-control" name="city">
                	<option value="">Select City</option>
                    <?php
					$ctryObj = new CountryController();
					$rows = $ctryObj->getcitydata();
					while ($row = mysqli_fetch_array($rows)) {
						echo '<option value='.$row[0].'>'.$row[1].'</option>';
					}
                    ?>
                </select>
            </div>
             <div class="col-md-2" id="saham" style="padding: 10px;">
            	<label style="color: white;">status</label>
                <select class="form-control" name="state">
                	<option value="">Select Status</option>
                    <option value="1">Online</option>
                    <option value="0">All</option>
                </select>
            </div>
            <div class="col-md-2" id="saham" style="padding: 10px;">
                <button class="btn btn-default" type="submit" name="search" id="sahambtn" style="background-color: white; color: black; width: 100%; margin-top: 25px;">Search</button>
            </div>
        </form>
    </div>
</div>
<br/>
<div class="container">

<?php
if (isset($_GET['watch'])) {
    $pars=$_GET["watch"];
    $link  = explode('/', $pars);
    $agef=$link[0];
    $aget=$link[1];
    $gander=$link[2];
    $country=$link[3];
    $city=$link[4];
    $status=$link[5];
    $seruser =  new UserController();
    if ($agef=="x" && $aget=="x" && $gander=="x" && $country=="x" && $city=="x" && $status=="x") 
    {
    	echo '<div class="col-md-6 col-lg-offset-3" style="margin-top: 30px; border-radius: 10px;">
    <div class="card">
        <div class="card-content" style="color: #df080f;">
            <h1><center>No Data Found.....</center></h1>
        </div>
        </div>
    </div>';
    }else{

    	$rows  = $seruser->searchuser($agef,$aget,$gander,$country,$city,$status);
    	if ($rows!=false) {
    		while ($row = mysqli_fetch_array($rows)) {
			if ($row["id"]!=null) {
			$x=0;
			echo '<a href="./profiles.php?profile='.$row["id"].'"><div id="id" style="background-image : url('.$row["image"].')">';
			$check = new UserController();
			$fn =  $check->newdate($row["created_at"]);
			if ($fn == true) {
				echo '<span class="label label-default" id="pera">New </span>';
				$x=$x+1;
			}
			if ($row["status"]==1) {
				echo '<span class="label label-default" id="pera">Online </span>';
				$x=$x+1;
			}
			if ($x<1) {
				echo '<span class="label label-default" id="pera">Online 5 mins ago </span>';
			}
			echo '<label id="lable">'.$row["nick"].'</label>
			</div></a>';
		}
			}
    	}else{
    		echo '<div class="col-md-6 col-lg-offset-3" style="margin-top: 30px; border-radius: 10px;">
		    <div class="card">
		        <div class="card-content" style="color: #df080f;">
		            <h1><center>No Data Found.....</center></h1>
		        </div>
		        </div>
		    </div>';
    	}
    }
}else{
	$userctr = new UserController();
    $userOBJs = $userctr->getallusers();
    while ($row = mysqli_fetch_array($userOBJs)) {
        if ($row["id"]!=null && $row["id"]!=$_SESSION["id"]) {
            $x=0;
            echo '<a href="./profiles.php?profile='.$row["id"].'"><div id="id" style="background-image : url('.$row["image"].')">';
            $check = new UserController();
            $fn =  $check->newdate($row["created_at"]);
            if ($fn == true) {
                echo '<span class="label label-default" id="pera">New </span>';
                $x=$x+1;
            }
            if ($row["status"]==1) {
                echo '<span class="label label-default" id="pera">Online </span>';
                $x=$x+1;
            }
            if ($x<1) {
                echo '<span class="label label-default" id="pera">Online 5 mins ago </span>';
            }
            echo '<label id="lable">'.$row["nick"].'</label>
            </div></a>';
        }
    }
}
?>

<style type="text/css">
div#id{
  margin:5px;
  width:150px;
  height:150px;
  display:inline-block;
  padding:5px;
  background-color:rgba(180,179,179,0.5);
  border-radius: 10px;
  background-size: cover;
  -webkit-box-shadow: inset 0 0 80px #000;
  -moz-box-shadow: inset 0 0 80px #000;
  box-shadow: inset 0 0 80px #000;
  cursor: pointer;
}

#pera{
  margin-top:100px;
}

span#pera.label.label-default{
  background-color:rgb(58,157,62);
  margin-right:5px;
}

label#lable{
  margin-top:100px;
  color: white;
}
</style>


</div>
<?php
include("./layout/footer.php");
?>
