

<?php

function keepValues($name) {
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}


include('header.php'); ?>


        <div class="row">
            <div class="col-lg-12">
                <center>
                <div class="content">
                    <?php if (isset($_GET['msg'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_GET['msg']; ?>
                    </div>
                    <?php endif; ?>
                    <h1>Login To start Test</h1>
                    <h3>log in with your username and password to start test</h3>
                    <hr>
                    <form class="form-group" method="POST" style="width:40%;" action="login.php">
                        <?php foreach ($errors as $error): ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                        <?php endforeach; ?>

                    <label>Username</label><br>
                    <input type="text" name="user" class="form-control" value="<?php keepValues('user'); ?>"/>
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?php keepValues('password'); ?>"/><br>
                    <input type="submit" id="btny" class="btn btn-default" name="login" value="Get started!">
                        don't have an account? <a href="register.php">create one</a>
                    </form>
                </div>

            </div>
        </div>




<?php include('footer.php'); ?>