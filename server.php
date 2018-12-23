<?php

session_start();
$errors = array();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'cbtapp';

$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}

//register user
if (isset($_POST['register'])) {

    $fname = $mysqli->real_escape_string($_POST['fname']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $pass1 = $mysqli->real_escape_string($_POST['pass1']);
    $pass2 = $mysqli->real_escape_string($_POST['pass2']);
    $email = $mysqli->real_escape_string($_POST['email']);

    if (empty($fname)) {
        array_push($errors,'Pls enter your full name');
    }
    else if (empty($username)) {
        array_push($errors,'Username is required');
    }

    else if (empty($pass1)) {
        array_push($errors,'Select a password');
    }

    else if (empty($pass2)) {
        array_push($errors,'Confirm your password');
    }

    else if (empty($email)) {
        array_push($errors,'enter an email address');
    }

    else if ($pass1 != $pass2) {
        array_push($errors,'Passwords do not match!');
    }

    else if (strlen($pass1) < 8) {
        array_push($errors,'Enter at least 8 characters for password');
    }
    else if (!filter_var((trim($email)), FILTER_VALIDATE_EMAIL)){
        array_push($errors,'Invalid Email address');
    }

    if (count($errors) == 0) {
        $password = md5($pass1);
        $query = "INSERT into users (fullname,username,password,email,regdate) VALUES ('$fname','$username','$password','$email',NOW())";

        if ($mysqli->query($query)) {
            $msg = 'Successfully registered, you can now login';

            header("location: login.php?msg=$msg");
        }
        else {
            die($mysqli->error);
        }
    }
}

//login user
if (isset($_POST['login'])) {

    $password = $mysqli->real_escape_string($_POST['password']);
    $username = $mysqli->real_escape_string($_POST['user']);
    if (empty($username)) {
        array_push($errors,'Username is required');
    }

    else if (empty($password)) {
        array_push($errors,'Select a password');
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT username, password from users WHERE username = '$username' AND password = '$password'";
        $result = $mysqli->query($query);
        if ($result->num_rows == 1) {
            $_SESSION['username'] = $username;
            $msg = "Welcome, $username";
            header("location: index.php?msg=$msg");
        }
        else {
            array_push($errors,'Username and password mismatched');
        }
    }
}
?>