<?php
session_start();
require 'Controllers/UserController.php';
include 'Models/User.php';
include 'Models/Adds.php';
require 'Controllers/CountryController.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Mockup-iPhone-6.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
</head>

<body>
	<div class="logo" style="margin-top: -110px;">
		<a href="./"><img src="./assets/img/28535951_2055949101085215_2063033274_n.jpg" width="250px" height="75px" style="margin-top: 2.5px;" /></a>
	</div>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="active" role="presentation"><a href="./dashboard.php">Search</a></li>
                    <li role="presentation"><a href="./">Home</a></li>
                </ul>
                <?php
                    if (!isset($_SESSION["id"])) {
                        echo '<ul class="nav navbar-nav navbar-right">
                    <li role="presentation" class="active"><a href="./login.php">Login </a></li>
                </ul>';
                    }
                ?>
            </div>
        </div>
    </nav>
    <div class="jumbotron jmbo">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="jumbotron tron">
                        <h1 class="text-center">Welcome !!</h1>
                        <p class="text-center">Its Free Join Us Now !!!</p>
                        <p><a class="btn btn-default show" role="button" href="./email.php">Join us now</a></p>
                    </div>
                </div>
            </div>
            <form>
                <div class="row clearfix" id="saham">
                    <div class="col-md-2 small">
                        <label class="lable">Age From</label>
                         <select class="form-control" name="aget">
                                <option value="">Age</option>
                                    <?php
                                    $userage = new UserController();
                                    $userage->age();
                                    ?>
                            </select>
                    </div>
                    <div class="col-md-2 small">
                        <label class="lable">Age To</label>
                       <select class="form-control" name="aget">
                                <option value="">Age</option>
                                    <?php
                                    $userage = new UserController();
                                    $userage->age();
                                    ?>
                            </select>
                    </div>
                    <div class="col-md-6 small">
                        <label class="lable">Location </label>
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
                    <div class="col-md-2 small super">
                        <a href="./email.php" class="btn btn-default active" id="btn">Search </button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="row">
                    <h1>Recent users</h1>
                    <hr>
                   <?php
                    $userctr = new UserController();
                        $userOBJs = $userctr->getallusers();
                        while ($row = mysqli_fetch_array($userOBJs)) {
                                echo '<a href="./profiles.php?profile='.$row["id"].'" ><div class="user" style="background-image : url('.$row["image"].'); background-size:cover; ">

                                </div></a>';
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php 
                    $add_id = 3;
                    $add = new Adds();
                    $adds = $add->getadd($add_id);
                    if ($adds) {
                        while ($row = mysqli_fetch_array($adds)) {
                            $date = new DateTime($row['sto']);
                            $now = new DateTime();
                            $ro = $date->diff($now)->format("d");
                            if ($ro && $ro > '0') {
                                echo "string";
                                echo '<div class="well">'.$row['addcode'].'</div>';
                            }
                        }
                    }
                ?>
            </div>

        </div>
    </div>
    <footer></footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>