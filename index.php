<?php

?>


<html>
    <head>
        <title>Welcome </title>

        <!-- Using bootstrap CDN for responsive -->
        <!-- For css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- For jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- For javascript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <link type="text/css" rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class='h_margin'>
            <div>
                <p class="center_align">
                    Welcome to your inventory BOSS!
                </p>
            </div>

            <div class="col-sm-6">
                <a href="login.php"> <!--reference to login.php file -->
                    <input  type="button" class="btn btn-danger pull-right" value="Login">
                </a>
            </div>

            <div class="col-sm-6">
                <a href="register.php"> <!--reference to register.php file -->
                    <input  type="button" class="btn btn-success pull-left" value="Register">
                </a>
            </div>
        </div>
    </body>

</html>
