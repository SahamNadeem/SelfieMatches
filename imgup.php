<?php
session_start();
ob_start();
require 'Controllers/UserController.php';
include 'Models/User.php';
include("./layout/nav.php");
$userdata = new UserController();
$test = $userdata->singleuser($_SESSION['id']);
if ($test['use_id'] == null) {
	$query = "insert into personal_details (use_id) values (".$_SESSION['id'].")";
	echo $query;
	$connection = new Connection();
	$result = $connection->execute($query);
}
?>
<script type="text/javascript" src="./assets/js/js.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);

};
</script>
<div class="row" id="downrow">
		<center class="sig"><h3>Upload Your Own Image</h3></center>
	    <div class="col-md-6 col-md-offset-3">
			<div class="card">
				<div class="row">
				    <div class="col-md-12">
				        <form action="./imgup.php" method="POST" enctype="multipart/form-data">
				            <div class="form-group">
				            	<center>
				            		<img id="myImg" src="#" height="260px"   style="border-radius: 50%; background-size: cover; width: 50%;" alt="your image" />
				            	<input type='file' id="filegh" name="imgup" /></center>
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
	if (isset($_POST["submit"]) && isset($_SESSION["id"])) {
		$r = $_FILES["imgup"];
		$target_dir = "assets/img/";
		$target_file = $target_dir . basename($_FILES["imgup"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if ($_FILES["imgup"]["size"] > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		if (move_uploaded_file($_FILES["imgup"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imgup"]["name"]). " has been uploaded.";
        echo $target_file;
        $y = new UserController();
        $o = $y->uploadimgname('image',$target_file,$_SESSION["id"]);
        header("location: ./dashboard.php");
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}else{
		echo "Error";
	}
	?>
<?php
include("./layout/footer.php");
?>

