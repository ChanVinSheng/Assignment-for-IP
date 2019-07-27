<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <form action="../Controller/LoginController.php" method="post" >
                <table class="form">
                    <tr>
                        <th><label for="name"><strong>Email:</strong></label></th>
                        <td><input name="loginusername" type="text"  /></td>
                    </tr>
                    <tr>
                        <th><label for="name"><strong>Password:</strong></label></th>
                        <td><input name="loginpassword" type="password"  /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="submit-button-right">
                            <input class="send_btn" type="submit" value="Submit" title="Submit" />                      
                    </tr>
                </table>
            </form>
        </div>
        <script scr="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
