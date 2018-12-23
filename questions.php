<?php
include('header.php');
if (!$_SESSION['username']) {
    header('location: login.php?');
}
$timeForTest = 10;
$_SESSION['id'] = $_GET['ref'];
$sessionid = $_SESSION['id'];
$query = "SELECT * FROM questions WHERE id = '$sessionid'";

$result = $mysqli->query($query);
$row = $result->fetch_row();

function keepAns() {
    $query = "SELECT answer FROM useranswer WHERE ans_id=''";

}

if ($sessionid > 10) {
    header('location: results.php');

}
function time_since($since){
    $chunks = array(
        array(60 * 60 * 24 * 365, 'year'),
        array(60 * 60 * 24 * 30, 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60, 'hour'),
        array(60, 'min'),
        array(1,'second')

    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++){
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];

        if (($count = floor($since/$seconds)) != 0){
            break;
        }
    }
    // $print = ($count == 1)?'1 '.$name:"$count {$name}s";
    $time = array();
    $name = ($count == 1)?$name:"{$name}s";
    array_push($time, $count);
    array_push($time, $name);
     return $time;
}

if ($_GET['start']){
    $_SESSION['time'] = time();
}

$timeUsed = time_since(time() - ($_SESSION['time']));
$timeLeft = $timeForTest - $timeUsed[0];

?>

<div class="col-lg-12">
    <center>
        <div class="content">
        
            Time remaining: <?php
             echo 'you have '.$timeLeft.'mins left'; ?>
            <h3>Webdesign exam</h3>
            <hr>


        <div id="exam" style="border:1px solid black; width:80%; height:300px;">
            <form method="POST" action="qbase.php?next=1">
                <h3><b>Question <?php echo $sessionid;?></b></h3>
                <br>
                <h4><b><?php echo $row[1]; ?></b></h4>
                <br>
            <div id="inside" style="">
                <table >
                    <tr width="40px">
                        <td><input type="radio" name="ans" value="<?php echo $row[2];?>" /></td>
                        <td><?php echo $row[2];?></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="ans" value="<?php echo $row[3];?>" /></td>
                        <td><?php echo $row[3];?></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="ans" value="<?php echo $row[4];?>" /></td>
                        <td><?php echo $row[4];?></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="ans" value="<?php echo $row[5];?>" /></td>
                        <td><?php echo $row[5];?></td>
                    </tr>


                </table>
            </div>
            <br>
            <a href="qbase.php?prev=1" style="text-align: left !important;"><= Previous</a>
                <input type="submit" value="Next" name="next">
            </form>
            <a href="results.php"><input type="submit" id="btny" class="btn btn-default btn-lg" name="result" value="submit now =>"></a>
        </div>
        </div>
    </center>

    <?php include('footer.php')?>

<script>

</script>

