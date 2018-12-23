<?php
function keepValues($name) {
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}


?>

<?php include('header.php'); ?>


    <div class="row">

            <center>
                <div class="content">
                    <h1>Register Account</h1>
                    <h3>it won't take you more than 30secs to create an account</h3>
                    <hr>
                    <form class="form-group" method="POST" style="width:40%;" action="register.php">

                            <?php foreach ($errors as $error): ?>
                            <div class="alert alert-danger">
                            <?php echo $error; ?>
                            </div>
                            <?php endforeach;?>

                        <label>Fullname</label><br>
                        <input type="text" name="fname" class="form-control"  value="<?php keepValues('fname'); ?>"/>
                        <label>Pick a username</label>
                        <input type="text" name="username" class="form-control" value="<?php keepValues('username'); ?>"/><br>
                        <label>Enter password</label><br>
                        <input id="pass" type="password" value="<?php keepValues('pass1'); ?>"placeholder="user a strong password with at least 8 characters" name="pass1" class="form-control" />
                        <label>Confirm Password</label>
                        <input id="pass" type="password" name="pass2" value="<?php keepValues('pass2'); ?>" class="form-control" >
                        <button id="btn1">show password</button>
                        <button id="btn2">hide password</button><br>
                        <label>Email Address</label><br>
                        <input type="mail" placeholder="main@example.com" name="email" class="form-control" value="<?php keepValues('email') ?>"/>
                        <br>
                        <input type="submit" id="btny" class="btn btn-default" name="register" value="Get started!">
                        already a user? <a href="login.php">LOGIN</a>
                    </form>
                </div>


    </div>

<?php include('footer.php'); ?>

<script>

    var showBtn = document.getElementById('btn1');
    var hidebutton = document.getElementById('btn2')
    var pass = document.querySelectorAll('#pass');

    for (var i = 0;i < pass.length;i++){
        showBtn.addEventListener('click',() => {
            pass[i].setAttribute('type','text');
        });
        hidebutton.addEventListener('click', () => {
            pass[i].setAttribute('type','password')
        })
    }



</script>
