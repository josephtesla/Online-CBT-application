<?php
include('server.php');
function check() {
    if (isset($_SESSION['username'])){
        return $_SESSION['username'] . ' (logout)';
    }
    else {
        return 'login';
    }
}




?>
<!doctype html>
<html>

<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>AlphaBox CBT application </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet"  href="css/bootstrap.css" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link href="style.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">
    <style>

        .navbar {
            background: rgba(0, 0, 0, 0.87);
        }
        .navbar-default .navbar-nav li a {
            color: #ece3e3;
        }
        a.navbar-brand{
            color: #ece3e3;
        }
    </style>
</head>
<body>

<!-- Static navbar --> <nav id="navi" class="navbar navbar-default"> <div class="container">
        <div class="navbar-header" style="color:white !important;">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="#" style="color: #ece3e3;"><span class="hed"><span class="bit">Alpha</span>Box</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Blog</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">


                <li><a href="check.php"><?php echo check(); ?></a></li>
                <li>
                    <a href="#"><i class="fa fa-facebook"></i> </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse --> </div><!--/.container-fluid --> </nav>
        <div class="container">







<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>

</body>

</html>
