<?php
session_start();

include_once "../class/database.php";
include_once "../class/Auth.php";

$auth = new Authentication;

function setup()
{
    global $auth;
    $user_id = $_SESSION['blog_id'];
    if (isset($_POST['user_detail'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $desc = $_POST['description'];
        $fb = $_POST['facebook'];
        $github = $_POST['github'];
        $ytb = $_POST['youtube'];

        $error = "";

        if ($username == "" || $email == "" || $desc == "") {
            $error = "All required fields are needed <a href='profile.php'>Go back to fix this</a>";
        } else {
            $data = [$username, $email, $desc, $fb, $github, $ytb, $user_id];
            if ($auth->setupProfile($data)) {
                $_SESSION['blog_user'] = $username;
                header("Location: profile.php");
            } else {
                $error = "Something went wrong <a href='profile.php'>Go back to fix this</a>";
            }
        }

        echo $error;
    }
}


setup();
