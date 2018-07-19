<?php
session_start();
include('./layout/nav.php');
include 'Controllers/UserController.php';
include 'Models/User.php';
?>
<style type="text/css">
img#profile{
  margin-left:70px;
  margin-bottom: -30px;
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
</style>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
               <?php
                	$userdata = new UserController();
    				$result = $userdata->singleuser($_SESSION['id']);
               echo '<img id="profile" data-toggle="modal" data-target="#myModal" style="background-image : url('.$result["image"].')"></img>';
               ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="./validate.php">
                        <div class="form-group">
                            <label class="control-label">Username / Email</label>
                            <input type="text" readonly class="form-control form-control" value=<?php echo '"'.$result["username"].'"'; ?>/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password </label>
                            <input type="password" name="passd" class="form-control form-control" value=<?php echo '"'.$result["password"].'"'; ?> />
                        </div>
                        <button class="btn btn-primary btn-block" type="submit" name="pass">Update </button>
                    </form>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-12">
            		<h3>Personal Information</h3>
            		<p style="margin-top: -12px; color:red;">Not changeable</p>
                	<hr/>
                	<div class="form-group">
                        <label class="control-label">Date of birth </label>
                        <input type="text" class="form-control form-control" readonly value=<?php echo '"'.$result["dob"].'"'; ?> />
                     </div>
                     <div class="form-group">
                        <label class="control-label">Gander </label>
                        <input type="text" class="form-control form-control" readonly value=<?php echo '"'.$result["gander"].'"'; ?> />
                     </div>
                     <div class="form-group">
                        <label class="control-label">age</label>
                        <input type="text" class="form-control form-control" readonly value=<?php echo '"'.$result["age"].'"'; ?> />
                     </div>
            	</div>
            </div>
        </div>
        <div class="col-md-8">
            <form method="POST" action="./validate.php">
                <div class="row">
                	<h3>Personal Status</h3>
                	<hr/>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">City</label>
                            <input type="text" class="form-control"  value=<?php echo '"'.$result["city"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Country</label>
                            <input type="text" class="form-control"  value=<?php echo '"'.$result["country"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nick</label>
                            <input type="text" class="form-control" name="nick"  value=<?php echo '"'.$result["nick"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Height</label>
                            <input type="text" class="form-control" name="height"  value=<?php echo '"'.$result["height"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Body Type</label>
                            <input type="text" class="form-control" name="bodytype"  value=<?php echo '"'.$result["bodytype"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Hair Color</label>
                            <input type="text" class="form-control" name="haircolor"  value=<?php echo '"'.$result["haircolor"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Eye Color</label>
                            <input type="text" class="form-control" name="eyecolor"  value=<?php echo '"'.$result["eyecolor"].'"'; ?> />
                        </div>
                         <div class="form-group">
                            <label class="control-label">Star Sign</label>
                            <input type="text" class="form-control" name="star_sigh" value=<?php echo '"'.$result["star_sigh"].'"'; ?> />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Qualification</label>
                            <input type="text" class="form-control" name="qualification" value=<?php echo '"'.$result["qualification"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Maricial Status</label>
                            <input type="text" class="form-control" name="m_status" value=<?php echo '"'.$result["m_status"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nationality</label>
                            <input type="text" class="form-control" name="nationality" value=<?php echo '"'.$result["nationality"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ethnicity</label>
                            <input type="text" class="form-control" name="ethnicity" value=<?php echo '"'.$result["ethnicity"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Trade</label>
                            <input type="text" class="form-control" name="trade" value=<?php echo '"'.$result["tradecity"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Religion</label>
                            <input type="text" class="form-control" name="religion" value=<?php echo '"'.$result["religion"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Smoking</label>
                            <input type="text" class="form-control" name="smoking" value=<?php echo '"'.$result["smoking"].'"'; ?> />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Drinking</label>
                            <input type="text" class="form-control" name="drinking" value=<?php echo '"'.$result["drinking"].'"'; ?> />
                        </div>
                    </div>
                    <input type="submit" name="updateinfo" class="btn btn-primary btn-block" value="Update Info">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<form>
    			<div class="form-group">
			        <label class="control-label">Description </label>
			        <textarea name="des" placeholder="Enter description" spellcheck="true" class="form-control" wrap="hard"><?php echo ''.$result["description"].''; ?></textarea>
			    </div>
			    <div class="form-group">
			        <label class="control-label">Hobbies </label>
			        <textarea name="des" placeholder="Enter description" spellcheck="true" class="form-control" wrap="hard"><?php echo ''.$result["hobbies"].''; ?></textarea>
			    </div>
			    <div class="form-group">
			    </div>
			    <div class="form-group">
			        <label class="control-label">Interests </label>
			        <textarea name="des" placeholder="Enter description" spellcheck="true" class="form-control" wrap="hard"><?php echo ''.$result["interestes"].''; ?></textarea>
			    </div>
			     <div class="form-group">
			        <label class="control-label">About </label>
			        <textarea name="des" placeholder="Enter description" spellcheck="true" class="form-control" wrap="hard"><?php echo ''.$result["about"].''; ?></textarea>
			    </div>
    		</form>
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
include('./layout/footer.php');
?>