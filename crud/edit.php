<?php
include("../connection.php");

$id = $_GET["id"];

$sql = "SELECT * FROM products WHERE product_id = '$id'";
$query = $db->query($sql);

$productdata = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Products</title>
</head>

<body>
    <div class="container">
        <h4>Product Edit</h4>
        <hr />
        <form action="./editing.php?id=<?php echo $productdata['product_id']; ?>" method="post">
            <table class="table table-hover">
                <tr>
                    <td>NAME</td>
                    <td><input type="text" name="product_name" class="form-control" value="<?php echo $productdata['product_name']; ?>" required /></td>
                </tr>
                <tr>
                    <td>BARCODE</td>
                    <td><input type="text" name="product_barcode" class="form-control" value="<?php echo $productdata['product_barcode']; ?>" required /></td>
                </tr>
                <tr>
                    <td>MODEL CODE</td>
                    <td><input type="text" name="product_model_code" class="form-control" value="<?php echo $productdata['product_model_code']; ?>" required /></td>
                </tr>
                <tr>
                    <td>STOCK</td>
                    <td><input type="number" name="product_main_stock" class="form-control" value="<?php echo $productdata['product_main_stock']; ?>" required /></td>
                </tr>
                <tr>
                    <td>DATE</td>
                    <td><input type="date" name="product_purchase_date" class="form-control" value="<?php echo $productdata['product_purchase_date']; ?>" required /></td>
                </tr>
                <tr>
                    <td>PRICE</td>
                    <td><input type="text" name="product_purchase_price" class="form-control" value="<?php echo $productdata['product_purchase_price']; ?>" required /></td>
                </tr>
            </table>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg" name="product_update">Update product</button>
                <a type="submit" class="btn btn-danger btn-lg" href="../index.php">Cancel</a>
            </div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </div>
</body>

</html>