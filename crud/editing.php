<?php
include("../connection.php");

if(isset($_POST["product_update"])){
    $id = $_GET["id"];

    $product_name = $_POST["product_name"];
    $product_barcode = $_POST["product_barcode"];
    $product_model_code = $_POST["product_model_code"];
    $product_main_stock = $_POST["product_main_stock"];
    $product_purchase_date = $_POST["product_purchase_date"];
    $product_purchase_price = $_POST["product_purchase_price"];

    $sql = "UPDATE products SET
        product_name = ?,
        product_barcode	 = ?,
        product_model_code = ?,
        product_main_stock = ?,
        product_purchase_date = ?,
        product_purchase_price = ?    
    WHERE product_id = '$id'";
    $query = $db->prepare($sql);
    $query->execute(array(
        $product_name,
        $product_barcode,
        $product_model_code,
        $product_main_stock,
        $product_purchase_date,
        $product_purchase_price
    ));
}

$count = $query->rowCount();

if($count > 0){
    header("Location: ../index.php?update=ok");
} else {
    header("Location: ../index.php?update=no");
}

exit;
?>