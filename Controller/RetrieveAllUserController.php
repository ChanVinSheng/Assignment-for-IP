<?php

include('../Model/database.php');
$db = Database::get();

$rows = $db->select("username , email , password FROM user");

foreach ($rows as $row) {
    echo "<p>$row->username $row->email $row->password</p>";
}

