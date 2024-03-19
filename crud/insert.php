<?php 
include("../connection.php");

if(isset($_POST['product_add'])){

    $product_name = $_POST["product_name"];
    $product_barcode	 = $_POST["product_barcode"];
    $product_model_code = $_POST["product_model_code"];
    $product_main_stock = $_POST["product_main_stock"];
    $product_purchase_date = $_POST["product_purchase_date"];
    $product_purchase_price = $_POST["product_purchase_price"];

    
    $sql = "INSERT INTO products (product_name,product_barcode,product_model_code,product_main_stock,product_purchase_date,product_purchase_price) VALUES ('$product_name','$product_barcode','$product_model_code','$product_main_stock','$product_purchase_date','$product_purchase_price')";

    $query = $db->prepare($sql);
    $query->execute();

    $count = $query->rowCount();

    if($count > 0){
        header("Location: ../index.php?insert=ok");
    } else {
        header("Location: ../index.php?insert=no");
    }
    exit;
}


?>