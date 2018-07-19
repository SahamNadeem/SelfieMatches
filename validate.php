<?php
session_start();
require 'Controllers/UserController.php';
include 'Models/User.php';
if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $usercont = new UserController();
    $user =  new User();
    $user = $usercont->login($username,$password);
    if ($user!=null && $user->role==0) {
    	$_SESSION["id"]=$user->id;
    	header("location: ./admin/");
    }elseif($user!=null && $user->role == 1){
        $_SESSION["admin"]=$user->id;
        header("location: ./admin/"); 
    }else{
    	header("location: ./login.php?x=0");
    }
}
if (isset($_POST['pass'])) {
    $password = $_POST['passd'];
    $usercont = new UserController();
    $password = $usercont->updateusertable('password',$password,$_SESSION['id']);
    header("location: ./myprof.php");

}
if (isset($_POST['updateinfo'])) {
    $nick = $_POST['nick'];
    $qualification = $_POST['qualification'];
    $m_status = $_POST['m_status'];
    $nationality = $_POST['nationality'];
    $height = $_POST['height'];
    $ethnicity = $_POST['ethnicity'];
    $bodytype = $_POST['bodytype'];
    $trade = $_POST['trade'];
    $haircolor = $_POST['haircolor'];
    $eyecolor = $_POST['eyecolor'];
    $religion = $_POST['religion'];
    $smoking = $_POST['smoking'];
    $start_sigh = $_POST['star_sigh'];
    $driniking = $_POST['drinking'];
    $usercont = new UserController();
    $save = $usercont->valll($qualification,$m_status,$nationality,$height,$ethnicity,$bodytype,$trade,$haircolor,$eyecolor,$religion,$smoking,$start_sigh,$driniking);
    //$ni = $usercont->updatenick($nick);
    header("location: ./myprof.php");
}
?>