<?php
if (!isset($_SESSION['userID']) || $_SESSION["role"] !== "ADMINISTRATOR")
    die("PAGE NOT FOUND")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaStore - Category</title>
    <link rel="stylesheet" href="assets/css/forms.css">
</head>
<body>
    <div class="container">
        <h2>Delete Product</h2>
        
        <form method="POST" id="updateProductForm" class="forms">
            <input type="text" id="barcode" name="barcode" placeholder="Barcode" required>
            <input type="text" id="productName" name="productName" placeholder="Name">
            <input type="text" id="productDescription" name="productDescription" placeholder="Description">
            <input type="text" id="productCategory" name="productCategory" placeholder="Category">
            <input type="text" id="productReference" name="productReference" placeholder="Image URL">
            <button class="submit-btn" type="submit" name="updateProduct">Update Product</button>
            <p id="message"></p>
        </form>
        <p>Go back to Admin Dashboard?<a href="index.php?action=admin_dashboard">admin</a></p>

        <script src="assets/js/admin.js"></script>

    </div>
</body>
</html>