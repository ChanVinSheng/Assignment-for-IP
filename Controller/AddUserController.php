<?php

require_once('../Model/database.php');
require_once '../StrategyValidation/Validator.php';
require_once '../StrategyValidation/ValidationEmail.php';

$db = Database::get();

$errorMessage = "";


$password = $_POST["password"];
$role = $_POST["roles"];
$comfirmedpassword = $_POST["comfirmedpassword"];

$ic = $_POST["ic"];
$icrows = $db->select("ic FROM user WHERE ic = :ic", [':ic' => $ic]);
foreach ($icrows as $row) {
    $icExist = $row->ic;
}


$username = $_POST["username"];
if (empty($username)) {
    $errorMessage .= "username is required \\n";
}

if (!empty($password)) {
    
} else {
    $errorMessage .= "password is required \\n";
}

if (!empty($comfirmedpassword)) {
    
} else {
    $errorMessage .= "comfirmed password is required \\n";
}

$ic = $_POST["ic"];
if (!empty($ic)) {
    $contextIc = new Validator(new ValidationEmail());
    $icExist = $contextIc->executeExistStrategy($ic);
    if (!$icExist) {
        $errorMessage .= "IC already exist \\n";
    }
} else {
    $errorMessage .= "ic is required \\n";
}

$email = $_POST["email"];
if (!empty($email)) {
    $contextEmail = new Validator(new ValidationEmail());
    $emailExist = $contextEmail->executeExistStrategy($email);
    if (!$emailExist) {
        $errorMessage .= "Email already exist \\n";
    }
} else {
    $errorMessage .= "email is required \\n";
}

if (empty($errorMessage)) {
   
    $data = array(
        'username' => $username,
        'password' => $password,
        'email' => $email,
        'ic' => $ic,
        'role' => $role
    );
    $db->insert('user', $data);
    echo "<script>alert(\"Successfully Added\"); window.location.href=\"../View/AdminAddUser.php\";</script>";
} else {
    echo "<script>alert(\"$errorMessage\"); window.location.href=\"../View/AdminAddUser.php\";</script>";
}


