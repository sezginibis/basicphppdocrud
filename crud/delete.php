<?php
include("../connection.php");

$id = $_GET["id"];

$sql = "DELETE FROM products WHERE product_id = '$id'";
$query = $db->query($sql);

$count = $query->rowCount();

if($count > 0){
    header("Location: ../index.php?delete=ok");
} else {
    header("Location: ../index.php?delete=no");
}

exit();

?>
