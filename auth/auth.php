<?php
include_once "../class/database.php";
include_once "../class/Auth.php";

$auth = new Authentication;

if ($auth->hasUser()) {
    include_once "login.php";
} else {
    include_once "register.php";
}
