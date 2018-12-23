<?php
include('header.php');
if (!$_SESSION['username']) {
    header('location: login.php?');

}
$user = $_SESSION['username'];
//check user
$query = "SELECT user FROM test";
$result = $mysqli->query($query);

$userHasDone = false;
while ($row = $result->fetch_array()){

    if ($row['user'] == $user){
        $userHasDone = true;
        break;
    }

}





?>



<div class="col-lg-12">
    <center>
        <div class="content">
            <?php   if ($userHasDone): ?>
            <h1><?php echo isset($_GET['msg'])?$_GET['msg']:''; ?></h1>
            <h3>No more attempt for you</h3>
            <hr>
        </div>
        <h4>Our record shows that you have already attempted this test. we will let you know if there is another</h4>
        <br><br>
        <a href="viewresults.php"><input type="submit" id="btny" class="btn btn-default btn-lg" name="login" value="View full results"></a>

            <?php else:  ?>
            <h1><?php echo $_GET['msg']; ?></h1>
            <h3>Webdesign exam</h3>
            <hr>
        </div>
        <h3>you are about to attempt 10 questions which will last for 5mins. Ensure you save your work before logging out.</h3>
        <br><br>
        <a href="questions.php?ref=1&start=time" ><input type="submit" id="btny" class="btn btn-default btn-lg" name="login" value="attempt now =>"></a>
            <?php endif; ?>




    </center>

    <?php include('footer.php')?>



