<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <?php

        require_once '../header.php';
        ?>     
    </head>
    <body>
        <div class="container h-100">
            <h1>View Employee</h1>
            <form  action = "AdminHome.php" method = "POST">
                <input type="submit" name="All" value="All" />
                <input type="submit" name="Admin" value="Admin" />
            </form>
            <?php
            require_once '../Controller/XmlGenerate.php';
            require_once '../Controller/userSAXParser.php';
            $xml = new XmlGenerate("user");
            if (isset($_POST["All"])) {
                $xml->databaseToXml("user", "user.xml");
                $sax = new userSAXParser("user");
                $userdata = $sax->getData();

                $output = "<h3>All Staff</h3>";
                $output .= "<hr />";
                $output .= '<table border="1">';
                $output .= '<tr bgcolor="#9acd32">';
                $output .= "<th>User ID</th>";
                $output .= "<th>User Name</th>";
                $output .= "<th>Password</th>";
                $output .= "<th>Email</th>";
                $output .= "<th>Role</th>";
                $output .= "</tr>";
                foreach ($userdata as $user) {
                    $output .= "<tr>";
                    $output .= "<td>" . $user['USERID'] . "</td>";
                    $output .= "<td>" . $user['USERNAME'] . "</td>";
                    $output .= "<td>" . $user['PASSWORD'] . "</td>";
                    $output .= "<td>" . $user['EMAIL'] . "</td>";
                    $output .= "<td>" . $user['ROLE'] . "</td>";
                    $output .= "</tr>";
                }
                $output .= "</table>";
                echo $output;
            } elseif (isset($_POST["Admin"])) {

                $xml->databaseToXmlWithSlt("user", "user.xml", "userAdmin");
                $proc = new XsltProcessor;
                $proc->importStylesheet(DOMDocument::load("../Xls/userAdmin.xsl")); //load XSL script
                echo $proc->transformToXML(DOMDocument::load("../Xml/user.xml"));
            }
            ?>  
        </div>

    </body>
</html>
