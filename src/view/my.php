<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>[IN]Style</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>
	<div class="navbar">
		<ul>
			<li><img id="logo" src="../img/instyle-logo.svg"></li>
			<li>Welcome, <?php echo $_SESSION['email']; ?></li>

		</ul>
	</div>

	<div class="maincontent">

	<div class="row titlecard">
		<div class="large-3 columns">
        	<img class="leftcard" src="/img/justin3.jpeg">
    	</div>

    	<div class="large-9 columns">
    		<div class="maincard">
    			<span class="rightcard">
	        		<h1><?php echo $_SESSION['email']?></h1>
	        		<h2>Pop singer and song writer</h2>
	        		<h3>Ontario, Canada | Music</h3>
	        	</span>
        	</div>
    	</div>
    </div>

    <hr>

    <div class="row">
    	<div class="large-12 columns" id="help">
    		<h2>Help Justin pick out a new LinkedIn profile picture</h2>
    	</div>
    </div>

    <div class="row">
    	<div class="large-12 columns" id="help">
    		<ul class="small-block-grid-1 large-block-grid-4">
<?php
foreach($imgs as $img){
?>
<li> <img src="/img/usr/<?php echo $img['url'] ?>"> <span class="imglabel"><?php echo $img['ups']  ?> Votes  <span class="hr">|</span> <a href=""> <img class="thumbup" src="/img/thumb-icon.png"> </a> </span> </li>
<?php
}
?>
			  <li> <img src="../img/justin2.jpeg"> <span class="imglabel">12 Votes  <span class="hr">|</span> <a href=""> <img class="thumbup" src="../img/thumb-icon.svg"> </a> </span> </li>

			  <li> <img src="../img/justin.jpeg"> <span class="imglabel">12 Votes  <span class="hr">|</span> <a href=""> <img class="thumbup" src="../img/thumb-icon.svg"> </a> </span> </li>

			  <li> <img src="../img/justin4.jpeg"> <span class="imglabel">12 Votes  <span class="hr">|</span> <a href=""> <img class="thumbup" src="../img/thumb-icon.svg"> </a> </span> </li>

			  <li> <img src="../img/justin5.jpeg"> <span class="imglabel">12 Votes  <span class="hr">|</span> <a href=""> <img class="thumbup" src="../img/thumb-icon.svg"> </a> </span> </li>

			</ul>
<form action="/my" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="pic" id="pic"><br>
<input type="submit" name="submit" value="Submit">
</form>

    	</div>
  	</div>
</body>

</html>
