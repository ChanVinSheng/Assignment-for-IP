<?php

require_once 'Strategy.php';
require_once('../Model/database.php');

class ValidationIc implements Strategy {

    public function doValidation($input) {
        
        $regexic = "^(([[0-9]{2})(0[0-9]|1[0-2])(0[1-9]|[12][0-9]|3[01]))-([0-9]{2})-([0-9]{4})$";
        if (!preg_match($regexic, $input)) {
            $message .= "invalid ic \\n";
        }

        return $message;
    }

     public function checkExist($input) {

        $dbic = Database::get();
        $rows = $dbic->select("ic FROM user WHERE ic = :ic", [':ic' => $input]);
        foreach ($rows as $row) {
            $Exist = $row->ic;
        }

        if (empty($Exist)) {
            return true;
        }else{
            return false;
        }
        
    }

}
