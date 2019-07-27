<?php

include('../Model/database.php');
require_once '../StrategyValidation/Validator.php';
require_once '../StrategyValidation/ValidationEmail.php';

$db = Database::get();


session_start();

$errorMessage = "";

$password = $_POST["loginpassword"];
$username = $_POST["loginusername"];

$context = new Validator(new ValidationEmail());
$errorMessage = $context->executeValidatorStrategy($username);


if (!empty($username)) {
    $context = new Validator(new ValidationEmail());
    $errorMessage = $context->executeValidatorStrategy($username);
}
else{
      $errorMessage .= "username is required \\n";
}

if (empty($password)) {
    $errorMessage .= "password is required \\n";
}

$rows = $db->find("role FROM user WHERE email = :email and password = :password ", array(':email' => $username, ':password' => $password));


if (empty($errorMessage)) {
    if (!empty($rows->role)) {
        $_SESSION['role'] = $rows->role;
        if ($rows->role == "admin") {

            echo "<script>alert(\"Login successful.\"); window.location.href=\"../View/AdminHome.php\";</script>";
        } elseif ($rows->role == "staff") {


            echo "<script>alert(\"Login successful.\"); window.location.href=\"../View/test.php\";</script>";
        }
    } else {
        echo "<script>alert(\"Email Or Password is wrong\"); window.location.href=\"../View/Login.php\";</script>";
    }
} else {
    echo "in";
    echo "<script>alert(\"$errorMessage\"); window.location.href=\"../View/Login.php\";</script>";
}






