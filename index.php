<?php
include("connection.php");
$sql = "SELECT * FROM products";
$query = $db->query($sql);

$dataproducts = $query->fetchAll(PDO::FETCH_ASSOC);
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
        <h4>Product Add</h4>
        <hr />
        <form action="./crud/insert.php" method="post">
            <table class="table table-hover">
                <tr>
                    <td>NAME</td>
                    <td><input type="text" name="product_name" class="form-control" required /></td>
                </tr>
                <tr>
                    <td>BARCODE</td>
                    <td><input type="text" name="product_barcode" class="form-control" required /></td>
                </tr>
                <tr>
                    <td>MODEL CODE</td>
                    <td><input type="text" name="product_model_code" class="form-control" required /></td>
                </tr>
                <tr>
                    <td>STOCK</td>
                    <td><input type="number" name="product_main_stock" class="form-control" required /></td>
                </tr>
                <tr>
                    <td>DATE</td>
                    <td><input type="date" name="product_purchase_date" class="form-control" required /></td>
                </tr>
                <tr>
                    <td>PRICE</td>
                    <td><input type="text" name="product_purchase_price" class="form-control" required /></td>
                </tr>
            </table>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg" name="product_add">Product add</button>
            </div>
        </form>
        <br />
        <?php
        if (isset($_GET['insert'])) {
            if ($_GET['insert'] == 'ok') {
        ?>
                <div class="alert alert-success" id="insertok" role="alert">
                    Product added successfully!
                </div>
            <?php
            }
            if ($_GET['insert'] == 'no') {
            ?>
                <div class="alert alert-danger" role="alert" id="insertno">
                    An error occurred while adding the product!
                </div>
            <?php
            }
            if ($_GET['insert'] == 'no') {
            ?>
                <div class="alert alert-danger" role="alert" id="insertno">
                    An error occurred while adding the product!
                </div>
        <?php
            }
            header("Refresh:4 url=index.php");
        }
        ?>

        <?php
        if (isset($_GET['delete'])) {
            if ($_GET['delete'] == 'ok') {
        ?>
                <div class="alert alert-success" id="deleteok" role="alert">
                    Product removed successfully!
                </div>
            <?php
            }
            if ($_GET['delete'] == 'no') {
            ?>
                <div class="alert alert-danger" role="alert" id="deleteno">
                    An error occurred while removing the product!
                </div>
        <?php
            }
            header("Refresh:4 url=index.php");
        }
        ?>

        <?php
        if (isset($_GET['update'])) {
            if ($_GET['update'] == 'ok') {
        ?>
                <div class="alert alert-success" id="updateok" role="alert">
                    Product updated successfully!
                </div>
            <?php
            }
            if ($_GET['update'] == 'no') {
            ?>
                <div class="alert alert-danger" role="alert" id="updateno">
                    An error occurred while updating the product or you haven't made any edits!
                </div>
        <?php
            }
            header("Refresh:4 url=index.php");
        }
        ?>
        <br />
        <h4>Products</h4>
        <hr />
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>BARCODE</th>
                    <th>MODEL CODE</th>
                    <th>STOCK</th>
                    <th>DATE</th>
                    <th>PRICE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataproducts as $data) : ?>
                    <tr>
                        <td><?php echo $data["product_name"] ?></td>
                        <td><?php echo $data["product_barcode"] ?></td>
                        <td><?php echo $data["product_model_code"] ?></td>
                        <td><?php echo $data["product_main_stock"] ?></td>
                        <td><?php echo $data["product_purchase_date"] ?></td>
                        <td><?php echo $data["product_purchase_price"] ?></td>
                        <td>
                            <a class="btn btn-success" href="./crud/edit.php?id=<?php echo $data["product_id"] ?>"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger" href="./crud/delete.php?id=<?php echo $data["product_id"] ?>"><i class="bi bi-trash2"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script>
            setTimeout(() => document.getElementById('insertok').remove(), 3000);
            setTimeout(() => document.getElementById('insertno').remove(), 3000);
            setTimeout(() => document.getElementById('deleteok').remove(), 3000);
            setTimeout(() => document.getElementById('deleteno').remove(), 3000);
            setTimeout(() => document.getElementById('updateok').remove(), 3000);
            setTimeout(() => document.getElementById('updateno').remove(), 3000);
        </script>
    </div>
</body>

</html>