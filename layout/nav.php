<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap-social.css">
    <link rel="stylesheet" href="assets/css/Material-Card.css">
    <link rel="stylesheet" href="assets/css/Mockup-iPhone-6.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
              
<script async="async" src="https://www.google.com/adsense/search/ads.js"></script>

<!-- other head elements from your page -->

<script type="text/javascript" charset="utf-8">
(function(g,o){g[o]=g[o]||function(){(g[o]['q']=g[o]['q']||[]).push(
  arguments)},g[o]['t']=1*new Date})(window,'_googCsa');
</script>

        
</head>

<body>
    
	<div class="logo" style="margin-top: -100px; height: 100px;">
		<img src="./assets/img/28535951_2055949101085215_2063033274_n.jpg" width="250px" height="75px" style="margin-top: 2.5px;" />
	</div>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="" role="presentation"><a href="./dashboard.php">Home</a></li>
                    <?php if (isset($_SESSION['id'])) { ?>
                    <li role="presentation"><a href="./msg.php">Messages</a></li>
                    <li role="presentation"><a href="./likedok.php">Likes</a></li>
                    <li role="presentation"><a href="./blockedrt.php">Blocking</a></li>
                    <li role="presentation"><a href="./myprof.php">My profile</a></li>
                <?php } ?>
                </ul>
                <?php
                    if (!isset($_SESSION["id"])) {
                        echo '<ul class="nav navbar-nav navbar-right">
                    <li role="presentation" class="active"><a href="./login.php">Login </a></li>
                </ul>';
                    }else{
                         echo '<ul class="nav navbar-nav navbar-right">
                    <li role="presentation" class="active"><a href="./logout.php">Logout </a></li>
                </ul>';
                    }
                ?>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top: 100px; width: 100%;">