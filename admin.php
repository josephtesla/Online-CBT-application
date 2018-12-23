<?php
include('server.php');
session_start();

if (isset($_POST['adminlog'])){
    $key = $_POST['key'];
    if ($key == 1413121110987654321) {
        $_SESSION['key'] = $key;
    }

}
if ($_GET['finish']) {

    session_destroy();
    unset($_SESSION['key']);
}
if (isset($_POST['newquestion'])){

$ques = $mysqli->real_escape_string($_POST['ques']);
    $a = $mysqli->real_escape_string($_POST['a']);
    $b = $mysqli->real_escape_string($_POST['b']);
    $c = $mysqli->real_escape_string($_POST['c']);
    $d = $mysqli->real_escape_string($_POST['d']);
    $ans = $mysqli->real_escape_string($_POST['ans']);

    $query = "INSERT into questions (id,question,a,b,c,d,ans) VALUES (0,'$ques','$a','$b','$c','$d','$ans') ";
    if ($mysqli->query($query)){
        $msg = "entered successfully";
        header("location: admin.php?msg=$msg");
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
</head>
<body>

<!-- Static navbar --> <nav id="navi" class="navbar navbar-default"> <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="#"><span class="hed"><span class="bit">Alpha</span>Box</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Blog</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">



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




    <?php if(isset($_SESSION['key'])): ?>

        <h3>Add New Question</h3>
        <?php echo $_GET['msg']; ?>
        <form class="form-control" action="admin.php" method="POST" style="width:40%;">
            <textarea name="ques" placeholder="Question.." class="form-control"></textarea>
            <input type="text"  placeholder="option A" name="a" class="form-control">
            <input type="text"  placeholder="option B" name="b" class="form-control">
            <input type="text"  placeholder="option C" name="c" class="form-control">
            <input type="text"  placeholder="option D" name="d" class="form-control">
            <input type="text"  placeholder="correct answer" name="ans" class="form-control">
            <input type="submit" name="newquestion" value="Enter" />
            <br><br>
            <a href="admin.php?finish=1">finished</a>
        </form>




    <?php else:  ?>
        <h1>Enter admin login key</h1>
        <form class="form-control" action="admin.php" method="POST" style="width:40%;">

            <input type="password" name="key" class="form-control">
            <input type="submit" name="adminlog" value="Enter" />
        </form>
    <?php  endif;  ?>



    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="lib/jquery/jquery.min.js"></script>




<br><br>






