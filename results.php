<?php
include('header.php');
if (!$_SESSION['username']) {
    header('location: login.php?');
}

$correct = 0;
$wrong = 0;

$user = $_SESSION['username'];
//compare User Answers
for($i = 1;$i <= 10;$i++) {

    //get user answers
    $query = "SELECT answer FROM useranswer WHERE ans_user ='$user' and ans_id='$i'";
    $result = $mysqli->query($query);
    $row = $result->fetch_row();

    //GET correct answers
    $sql = "SELECT ans FROM questions WHERE id='$i'";
    $res = $mysqli->query($sql);
    $row2 = $res->fetch_row();

    if ($row[0] == $row2[0]){
        $correct += 1;
    }
    else{
        $wrong += 1;
    }
    $percentage = ($correct/10)*100;

}

$query = "SELECT user FROM test";
$result = $mysqli->query($query);
$userHasDone = false;
while ($row = $result->fetch_array()){
    if ($row['user'] == $user){
        $userHasDone = true;
        break;
    }
}
if (!$userHasDone) {
    $insert = "INSERT INTO test (user,testscore,percent,correct,wrong) VALUES('$user','$correct','$percentage','$correct','$wrong')";
    if ($mysqli->query($insert)) {
        echo 'saved';
    } else {
        die($mysqli->error);
    }
}
//get questions
$query = "SELECT * FROM questions";
$resu = $mysqli->query($query);

?>

<div class="col-md-12">
    <center>
        <div class="content">

            <h3><b>EXAM ATTEMPT SUMITTED</b></h3>
            <hr>

            <h3><b>Your Score for this is test is: <?php echo $percentage .'%'; ?></b></h3>
            <h3><b>Number of questions answered correctly: <?php echo$correct; ?></b></h3>
            <h3><b>Number of questions failed: <?php echo $wrong; ?></b></h3>
        </div>
        <br><br>
        <a href="check.php" ><input type="submit" id="btny" class="btn btn-default btn-lg" name="logout" value="logout now"></a>
        <a href="results.php?res=1">View Summary of results...</a>
    </center>

    <?php if (isset($_GET['res'])):  ?>
    <div class="content">
            <h3>Results Summary</h3>
            <?php while ($question = $resu->fetch_array()):?>
            <?php
                $qid = $question['id'];
                $query = "SELECT answer FROM useranswer WHERE ans_user ='$user' and ans_id='$qid'";
                $result = $mysqli->query($query);
                $row = $result->fetch_row();
                ?>

            <hr>
            <h4>Question <?php echo $question['id'];?></h4>
                <?php echo $question['question'];?>
            <h5>correct answer: <?php echo $question['ans'];?></h5>
                <h5>You chose: <?php echo $row[0];?>
                    <?php echo ($row[0] == $question['ans'])?'(correct)':'(wrong)'; ?>
                </h5>

            <?php endwhile;?>

        </div>

    <?php endif;?>



    <?php include('footer.php')?>


