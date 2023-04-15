<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
    <link rel="stylesheet" href="./index.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="navbar">
        <div class="sec1">
            <p>Product List</p>
        </div>
        <div class="sec2">
            <button> <a href="/addproduct.php">ADD</a></button>
            <form method="POST">
                <button id="delete-product-btn" type="submit" value="submit">MASS DELETE</button>
        </div>
    </div>
    <hr>
    <div class="productsgrid">
        <?php require 'database.php';
        $cn = new database;
        $cn->createConnection();
        $cn->fetchproducts();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sku = $_POST['skulist'];
            $cn->deleteProducts($sku);

        }

        $cn->closeConnection();
        ?>
        </form>
    </div>
    <div class="footer">
        <hr>
        <h3>Scandiweb Test assignment</h3>
    </div>
</body>

</html>