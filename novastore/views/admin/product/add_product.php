<?php
if (!isset($_SESSION['userID']) || $_SESSION["role"] !== "ADMINISTRATOR")
    die("PAGE NOT FOUND")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaStore - Product</title>
    <link rel="stylesheet" href="assets/css/forms.css">
</head>
<body>

    <div class="container">

        <h2>Add Product</h2>
        
        <form method="POST" id="addProductForm" class="forms">

            <input type="text" id="barcode" name="barcode" placeholder="Barcode" required>
            <input type="text" id="productName" name="productName" placeholder="Product Name" required>
            <input type="text" id="productDescription" name="productDescription" placeholder="Description" required>
            <input type="text" id="productCategory" name="productCategory" placeholder="Category" required>
            <input type="text" id="productReference" name="productReference" placeholder="Image URL" required>
            <input type="number" id="unitPrice" name="unitPrice" step="0.01" placeholder="Price" required>
            <button class="submit-btn" type="submit" name="addProduct">Add Product</button>

            <p id="message"></p>
        </form>

        <p>Go back to Admin Dashboard?<a href="index.php?action=admin_dashboard">admin</a></p>
        <script src="assets/js/admin.js"></script>
    </div>
</body>
</html>