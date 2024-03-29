<?php

require_once 'Strategy.php';
require_once('../Model/database.php');

class ValidationEmail implements Strategy {

    public function doValidation($input) {

        $count = 1;
        $message = "";
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $message .= "invalid email \\n";
            $count = 0;
        }


        if ($count == 1) {
            $whitelistDomains = ['gmail.com', 'yahoo.com', 'hotmail.com'];
            $email = explode('@', $input);

            if (!in_array(end($email), $whitelistDomains)) {
                $message .= "invalid domain \\n";
            }
        }

        return $message;
    }

    public function checkExist($input) {

        $dbemail = Database::get();
        $rows = $dbemail->select("email FROM user WHERE email = :email", [':email' => $input]);
        foreach ($rows as $row) {
            $Exist = $row->email;
        }

        if (empty($Exist)) {
            return true;
        }else{
            return false;
        }
        
    }

}
