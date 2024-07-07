<?php 
    require 'database.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $stmt);
        $row = mysqli_fetch_assoc($result);

    }else{
        header('location: index.php');
    }

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $id = $_GET['id'];

        $stmt = "UPDATE products SET name = '$name', price = $price, stock = $stock WHERE id = $id ";
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
           <h3>Update Product</h3>
            <label>Product Name</label>
            <input type="text" name="name" placeholder="Product Name" value="<?php echo $row['name'] ?>">
            <label>Product Price</label>
            <input type="text" name="price" placeholder="0.00" value="<?php echo $row['price'] ?>">
            <label>Product Stock</label>
            <input type="number" name="stock" placeholder="0" value="<?php echo $row['stock'] ?>">
            <button type="submit" >Update</button>
           </form>
        </div>

    </div>

</body>

</html>