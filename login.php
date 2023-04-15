<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="./index.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="navbar">
        <div class="sec1">
            <p>LOGIN</p>
        </div>
    </div>
    <hr>
    <div class="loginform">
        <?php require 'database.php';
        $cn = new database;
        $cn->createConnection();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        }

        $cn->closeConnection();
        ?>
        </form>
    </div>
</body>

</html>