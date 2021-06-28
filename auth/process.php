<?php

session_start();

include_once "../class/database.php";
include_once "../class/Auth.php";

$auth = new Authentication;

function register()
{
    global $auth;
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $error = "";

        if ($username == "") {
            $error = "Username is empty <a href='register.php'>Go back to fix this</a>";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Email is not valid <a href='register.php'>Go back to fix this</a>";
        } else if (strlen($password) < 6) {
            $error = "Password is short <a href='register.php'>Go back to fix this</a>";
        } else {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $data = [$username, $email, $password];
            if ($auth->register($data)) {
                header("Location: auth.php");
            } else {
                $error = "Something went wrong <a href='register.php'>Go back to fix this</a>";
            }
        }

        echo $error;
    }
}

register();


function login()
{
    global $auth;

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email !== "") {
            if ($auth->login([$email, $password])) {
                $result = $auth->login([$email, $password]);
                $_SESSION['blog_user'] = $result->username;
                $_SESSION['blog_id'] = $result->id;

                header("Location: ../admin");
            } else {
                echo "Something went wrong <a href='login.php'>Go back to fix this</a>";
            }
        } else {
            echo "All fields are required <a href='login.php'>Go back to fix this</a>";
        }
    }
}

login();
