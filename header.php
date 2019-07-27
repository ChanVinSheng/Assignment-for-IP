<!DOCTYPE html>
<html>
    <?php
    session_start();
    
if (!isset($_SESSION['role'])) {
    echo "<script>alert(\"Nooooo\"); window.location.href=\"../View/Login.php\";</script>";
}
    ?>
    <head>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


    </head>

    <body>

        <header>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <a class="navbar-brand" href="#">Assignment</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <?php if (isset($_SESSION['role'])) { ?>
                            <?php if ($_SESSION['role'] == 'admin') { ?>

                                    <li class="nav-item">
                                        <a class="nav-link" href="../View/AdminHome.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../View/AdminAddUser.php">Add user</a>
                                    </li>
              
                               
                            <?php } elseif ($_SESSION['role'] == 'staff') { ?>
                            
 
                           
                            <?php } ?>
                        <?php } else { ?>
                            <p>Invalid</p>
                        <?php } ?>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <a class="btn btn-outline-success my-2 my-sm-0" href="../Controller/LogoutController.php" type="submit" onclick="return confirm('Confirm Logout?');">Log out</a>                      
                    </form>
                </div>
            </nav>
        </header>

    </body>

</html>
