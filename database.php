<?php
class database
{
    private $pass = "HELLOworld@123";
    private $user = "id20549357_localhost";
    private $server = "localhost";
    private $dbname = "id20549357_scandiweb";
    public $conn;
    public $mp = array("DVD" => "Size", "Book" => "Weight", "Furniture" => "Dimension");
    public function createConnection()
    {
        $this->conn = new mysqli($this->server, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            echo "<p>not working</p>";
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function closeConnection()
    {
        $this->conn->close();
    }
    public function fetchproducts()
    {
        $query = "SELECT * FROM `products`";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $typ = $this->mp[$row["TYPE"]];
                $detail = $row[$typ];
                $un = array("Size" => "MB", "Weight" => "KG", "Dimension" => "");
                $unit = $un[$typ];
                echo "<div class=" . "product" . ">
                        <div class='content'>
                            <div class=" . "chkbox" . "><input type=" . "checkbox" . " class='delete-checkbox' name='skulist[]' value=" . $row["SKU"] . "></div>
                            <div class='details'>
                                <ul>
                                    <li>" . $row["SKU"] . "</li>
                                    <li>" . $row["NAME"] . "</li>
                                    <li>" . $row["PRICE"] . " $</li>
                                    <li>" . $typ . ": " . $detail . " " . $unit . "</li>
                                </ul>
                            </div>
                            </div> 
                        </div>";
            }
        }
    }
    public function deleteProducts($sku)
    {
        foreach ($sku as $id) {
            $query = "DELETE FROM `products` WHERE SKU =" . "'" . $id . "'" . ";";
            $result = $this->conn->query($query);
        }
        echo ("<meta http-equiv='refresh' content='1'>");
    }
    public function addData($sku, $name, $price, $productType, $details)
    {
        $stmt = $this->conn->prepare("INSERT INTO products (SKU,NAME,PRICE,TYPE," . $this->mp[$productType] . ") VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $sku, $name, $price, $productType, $details);
        $res = $stmt->execute();
        return $res;
    }

}
if (isset($_POST['data'])) {
    $cn = new database;
    $cn->createConnection();
    $dt = $_POST['data'];
    $res = $cn->addData($dt['sku'], $dt['name'], $dt['price'], $dt['productType'], $dt['details']);
    $cn->closeConnection();
    if ($res == true)
        echo "200";
    else
        echo "SKU exists!";
}
?>