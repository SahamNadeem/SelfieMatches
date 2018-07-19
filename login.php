<?php
session_start();
require 'Controllers/UserController.php';
include 'Models/User.php';
include 'Models/Adds.php';
if (isset($_SESSION["id"])) {
    header("location: ./dashboard.php");
}elseif (isset($_SESSION['admin'])){
    header("location: ./admin/dashboard.php");
}
include("./layout/nav.php");
?>
<?php
    if (isset($_GET["x"]) && $_GET["x"] == 0 ) {
        echo '<div class="col-md-6 col-lg-offset-3" style="margin-top: 30px; border-radius: 10px;">
    <div class="card">
        <div class="card-content" style="background-color:#df080f ; color: white;">
            <strong>Ohhhh snap!!!!</strong> You should check in on some of those fields below.
            </button>
        </div>
        </div>
    </div>';
    }
?>

       <div class="row" style="margin-top: 20px;">
        <div class="col-md-3">
                <?php 
                    $add_id = 1;
                    $add = new Adds();
                    $adds = $add->getadd($add_id);
                    if ($adds) {
                        while ($row = mysqli_fetch_array($adds)) {
                            $date = new DateTime($row['sto']);
                            $now = new DateTime();
                            $ro = $date->diff($now)->format("d");
                            if ($ro && $ro > '0') {
                                echo '<div class="well"><p style="word-wrap: break-word;">'.$row['addcode'].'</p></div>';
                            }
                        }
                    }
                ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="sahamdiv">
                        <h1 class="text-nowrap text-center" id="sahamhead">Login </h1>
                        <p class="text-center" id="login">_______</p>
                    </div>
                    <div class="card-content">
                        <label>Login with social media:</label>
                        <br>
                        <center>
                            <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                            </fb:login-button>
                            
                        &nbsp&nbsp&nbsp&nbsp
                    <a href="./facebook.php"><img style="width: 50px;
                         height: 50px;" src="./assets/img/TWIT-FINAL-BLU.png"></a>
                        </center>

                    </div>
                    <div class="card-content">
                        <label>Login with registed details:</label>
                        <form method="POST" action="./validate.php" style="color: #79858b">
                            <div class="row">
                                <div class="col-lg-12 col-lg-offset-0 col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" name="username" type="text" placeholder="username" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="password" type="password" placeholder="password" required>
                                    </div>
                                    <input type="checkbox" name="remember">&nbsp&nbspKeep me signed in 
                                    <button name="submit" class="btn btn-primary" type="submit" 
                                id="btuonlo" style="background-color: #df080f;">Log In</button>
                                </div>
                            </div>
                        </form>
                        <div class="links">
                            <a class="text-danger" href="./forget.php">Forgot Password?</a>
                        <a href="./email.php" style="float: right;font-weight:bold;color:#79858b;">Don't have an account? click Here</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <?php 
                    $add_id = 2;
                    $add = new Adds();
                    $adds = $add->getadd($add_id);
                    if ($adds) {
                        while ($row = mysqli_fetch_array($adds)) {
                            $date = new DateTime($row['sto']);
                            $now = new DateTime();
                            $ro = $date->diff($now)->format("d");
                            if ($ro && $ro > '0') {
                                echo '<div class="well"><p style="word-wrap: break-word;">'.$row['addcode'].'<p></div>';
                            }
                        }
                    }
                ?>
            </div>
        </div>
<?php
include("./layout/footer.php");
?>
