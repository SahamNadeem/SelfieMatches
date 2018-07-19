<?php
session_start();
ob_start();
include("./layout/nav.php");
include 'Controllers/LikeController.php';
include 'Controllers/BlockController.php';
include 'Controllers/UserController.php';
include 'Controllers/CountryController.php';
include 'Models/User.php';

if (isset($_SESSION['id'])) {
    $blocked = new BlockController();
    $bkloo = $blocked->check($_GET["profile"]);
    if ($bkloo == true)
    {
        header("location: ./dashboard.php");
    }
}
?>
<script type="text/javascript" src="./assets/js/js.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- The Modal -->
<style type="text/css">
div#profile{
  margin:30px;
  margin-top: -20px;
  width:150px;
  height:150px;
  display:inline-block;
  padding:5px;
  background-color:rgba(180,179,179,0.5);
  border-radius: 50%;
  background-size: cover;
  cursor: pointer;
  transition: 0.3s;
}
div#people{
	width: 60px;
	height: 60px;
	background-color: grey;
	display: inline-block;
	margin: 2px;
}

===================================

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
.circle{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin: 10px;
    border: 1px solid #0000;
}
.fire{
    border:2px solid #ff1414;
    color: white;
}
.fireliked{
     background-color: #ff9999;
    color: white;
}
.message{
    background-color: #2095fc;
    color: white;
}
.block{
    background-color: black;
    color: white;
}
.unblock{
     background-color: white;
    color: white;
    border:1px solid black;
}
.smenu {
    list-style-type: none;
    margin: 10px;
    padding: 0;
    overflow: hidden;
    background-color: #0000;
}

.smenuitem {
    margin: 5px;
    float: left;
}

.smenuitem a {
    display: block;
    color: white;
    text-align: center;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    text-decoration: none;
}

/* Change the link color to #111 (black) on hover */

===============================

</style>

<?php
if (isset($_GET["profile"])) {
    $id = $_GET["profile"];
    $userdata = new UserController();
    $result = $userdata->singleuser($id);
}
?>

<div class="row">
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
            	<?php
               echo '<div id="profile" data-toggle="modal" data-target="#myModal" style="background-image : url('.$result["image"].')">';
               ?>
                </div>
                <h4 class="text-center" style="margin-top: -20px;"><?php echo "".$result["Name"].""; ?></h4>
                <hr/>
                <?php
                if (isset($_SESSION['id'])) {
                ?>
                <ul class="smenu">
                    <?php 
                        $like = new LikeController();
                        $klo = $like->check($id);
                        if ($klo == true)
                        {
                            echo '<li style="display : none; " id="likebtn" class="smenuitem">
                            <a  onclick="javascript:like('.$id.');" class="fire" href="#" ></a>
                                </li>';

                                echo '<li id="dislikebtn" class="smenuitem">
                                <a onclick="javascript:dislike('.$id.');" class="fireliked" href="#"></a>
                                </li>';
                        }else{

                            echo '<li id="likebtn" class="smenuitem">
                            <a onclick="javascript:like('.$id.');" class="fire" href="#" ></a>
                                </li>';
                            echo '<li style="display : none; " id="dislikebtn" class="smenuitem">
                            <a onclick="javascript:dislike('.$id.');" class="fireliked" href="#" ></a>
                                </li>';
                        }
                    ?> 
                <li class="smenuitem"><a class="message" href<?php echo "=./msg.php?chat=".$result["user_id"]; ?>></a></li>
                <?php 
                        $block = new BlockController();
                        $bklo = $block->check($id);
                        if ($bklo == true)
                        {
                            echo '<li style="display : none; " id="block" class="smenuitem">
                            <a onclick="javascript:block('.$id.');" class="unblock" href="#"></a>
                                </li>';

                                echo '<li id="unblock" class="smenuitem">
                               <a onclick="javascript:unblock('.$id.');"class="block" href="#"></a>
                                </li>';
                        }else{

                            echo '<li id="block" class="smenuitem">
                            <a onclick="javascript:block('.$id.');" class="unblock" href="#"></a>
                                </li>';
                            echo '<li style="display : none; " id="unblock" class="smenuitem">
                           <a onclick="javascript:unblock('.$id.');" class="block" href="#"></a>
                                </li>';
                        }
                    ?> 
                </ul>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 style="margin-top: -20px;">People near you.....</h3></div>
        </div>
        <div class="row" style="margin-top: -40px;">
            <div id="people"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-left">About </h3>
                <hr />
                <p><?php echo $result["about"]; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-left">Interests </h3>
                <hr />
                <p><?php echo $result["interestes"]; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-left">Description </h3>
                <hr />
                <p><?php echo $result["description"]; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-left">Hobbies </h3>
                <hr />
                <p><?php echo $result["hobbies"]; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Height</td>
                                <td><?php echo $result["height"]; ?></td>
                            </tr>
                            <tr>
                                <td>Body Type</td>
                                <td><?php echo $result["bodytype"]; ?></td>
                            </tr>
                            <tr>
                                <td>Hair Color</td>
                                <td><?php echo $result["haircolor"]; ?></td>
                            </tr>
                            <tr>
                                <td>Eye Color</td>
                                <td><?php echo $result["eyecolor"]; ?></td>
                            </tr>
                            <tr>
                                <td>Qualification</td>
                                <td><?php echo $result["qualification"]; ?></td>
                            </tr>
                            <tr>
                                <td>Maricial Status</td>
                                <td><?php echo $result["m_status"]; ?></td>
                            </tr>
                            <tr>
                                <td>Nationality</td>
                                <td><?php echo $result["nationality"]; ?></td>
                            </tr>
                            <tr>
                                <td>Ethnicity</td>
                                <td><?php echo $result["ethnicity"]; ?></td>
                            </tr>
                            <tr>
                                <td>Religion</td>
                                <td><?php echo $result["religion"]; ?></td>
                            </tr>
                            <tr>
                                <td>Smoking</td>
                                <td><?php echo $result["smoking"]; ?></td>
                            </tr>
                            <tr>
                                <td>Drinker</td>
                                <td><?php echo $result["drinking"]; ?></td>
                            </tr>
                            <tr>
                                <td>Smoker</td>
                                <td><?php echo $result["smoking"]; ?></td>
                            </tr>
                            <tr>
                                <td>Star Sign</td>
                                <td><?php echo $result["star_sigh"]; ?></td>
                            </tr>
                            <tr>
                                <td>Basic City</td>
                                <td><?php echo $result["tradecity"]; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="add"></div>
            </div>
        </div>
    </div>
</div>
<img id="Img" src=<?php echo '"'.$result["image"].'"';  echo "alt='".$result["Name"]."'"; ?> width="0" height="0">
<div id="myModal" class="modal">
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<style type="text/css">
    #Img{
        visibility: hidden;
    }
</style>

<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('profile');
var image = document.getElementById('Img');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = image.src;
    captionText.innerHTML = image.alt;
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
<?php
include("./layout/footer.php");
?>