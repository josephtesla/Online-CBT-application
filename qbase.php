<?php
session_start();
include('server.php');

if (isset($_POST['next'])) {

    $prev_id = $_SESSION['id'];
    $PrevAns = $_POST['ans'];
    $user = $_SESSION['username'];

    $query = "INSERT INTO useranswer (ans_id,ans_user,answer) VALUES ('$prev_id','$user','$PrevAns')";
    if ($mysqli->query($query)){
        echo 'answer selected';
    }else{
        die($mysqli->error);
    }

    $_SESSION['id'] += 1;
    $ref = $_SESSION['id'];
    header("location: questions.php?ref=$ref");


}
if ($_GET['prev']) {
    $_SESSION['id'] -= 1;
    $ref = $_SESSION['id'];
    header("location: questions.php?ref=$ref");
}

?>