<?php 
    require 'database.php';

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        $stmt = "INSERT INTO products(name,price,stock) VALUES('$name', $price, $stock)";
        $query = mysqli_query($conn, $stmt);
        header('location: index.php');

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <div class="card">
           <form method="post">
           <h3>Add Product</h3>
            <label>Product Name</label>
            <input type="text" name="name" placeholder="Product Name">
            <label>Product Price</label>
            <input type="text" name="price" placeholder="0.00">
            <label>Product Stock</label>
            <input type="number" name="stock" placeholder="0">
            <button type="submit" >Submit</button>
           </form>
        </div>

    </div>

</body>

</html>