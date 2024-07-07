<?php
require 'database.php';
$products = "SELECT * FROM products";
$result = mysqli_query($conn, $products);

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $stmt = "DELETE FROM products WHERE id = $id";
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

        <div>
            <div class="header">
                <h3>Products</h3>
                <a href="add.php">Add Product</a>
            </div>
            <table>
                <thead>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td><?php echo $row['stock'] ?></td>
                                    <td class="flex">
                                        <a href="update.php?id=<?php echo $row['id'] ?>">Edit</a>
                                        <a href="index.php?delete=<?php echo $row['id'] ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="4">No record found</td>
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>

            </table>
        </div>

    </div>

</body>

</html>