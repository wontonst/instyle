<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>[IN]Style</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <link rel="stylesheet" href="../css/homestyle.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/jquery.stellar.js"></script>
</head>

<body>
	<div class="navbar">
		<ul>
			<li><img id="logo" src="../img/instyle-logo.svg"></li>
		</ul>
	</div>

    <div class="callout">

    <div class="row">
        <div class="large-5 columns large-centered small-centered">
            <div id="signupform">
                <h1>Sign into InStyle</h1>
                <p>InStyle makes it quick and easy to get feedback on which image to use for your LinkedIn profile picture.</p>
                <form action="/login" method="POST">
                    <input type="text" name="email" placeholder="email" class="updatedinput"> </br>
                    <input type="password" name="password" placeholder="password" class="updatedinput">
                    </br><button class="submit">SIGN UP</button>
                </form>
                <p>Don't have an account? <a href="index.html" id="signin">Sign Up</a></p>
            </div>
        </div>
    </div>

    </div>


    <script>
        jQuery(document).ready(function($) {
            $.stellar();
        });

        // $( "#signin" ).click(function() {
        //     // alert( "Handler for .click() called." );
        //     $("#signupform").animate({"left": "150%",}, 700);
        //     $("#signinform").animate({"left": "-30%",}, 700);
        // });

        // $( "#signup" ).click(function() {
        //     //alert( "Handler for .click() called." );
        //     $("#signupform").animate({"right": "10%",}, 700);
        //     $("#signinform").animate({"right": "10%",}, 700);
        // });
    </script>
</body>

</html>
