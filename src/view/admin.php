<?php
$fullname = ($_SESSION['name']) ? $_SESSION['name'] : 'Justin Bieber';
$tagline = ($_SESSION['tagline']) ? $_SESSION['tagline'] : 'Pop singer and song ruiner';
$place = ($_SESSION['location']) ? $_SESSION['location'] : 'Ontario, Canada';
$industry = ($_SESSION['industry']) ? $_SESSION['industry'] : 'Music';
?>
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
    <style>
        .content-nav {
            background-color: #FFF;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <ul>
            <li><img id="logo" src="../img/instyle-logo.png"></li>
            <li>Hello again, <?php echo explode(" ", $fullname)[0]; ?></li>

        </ul>
    </div>
    <div class="maincontent">
    <div class="content-nav large-3 columns">



    </div>

    <div class="row titlecard">
        <div class="large-3 columns">
            <img class="leftcard" src="/img/justin3.jpeg">
        </div>

        <div class="large-9 columns">
            <div class="maincard">
                <span class="rightcard">
                    <h1><?php echo $fullname; ?></h1>
                    <h2><?php echo $tagline; ?></h2>
                    <h3><?php echo $place . " | " . $industry; ?></h3>
                </span>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="large-12 columns" id="help">
            <h2>Your current photos:</h2>
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns" id="help">
            <ul class="small-block-grid-1 large-block-grid-4">
              <li> <img src="../img/justin2.jpeg"> <span class="imglabel">12 Votes</li>

              <li> <img src="../img/justin.jpeg"> <span class="imglabel">12 Votes</li>

              <li> <img src="../img/justin4.jpeg"> <span class="imglabel">12 Votes</li>

              <li> <img src="../img/justin5.jpeg"> <span class="imglabel">12 Votes</li>

            </ul>
        </div>
    </div>
</body>

</html>
