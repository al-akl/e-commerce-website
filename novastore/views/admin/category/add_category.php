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

        <h2>Add Category</h2>
        
        <form method="POST" id="addCategoryForm" class="forms">
            <input type="text" id="categoryName" name="categoryName" placeholder="Category Name" required>
            <button type="submit" name="addCategory">Add Category</button>
            <p id="message"></p>
        </form>

        <p>Go back to Admin Dashboard?<a href="index.php?action=admin_dashboard">admin</a></p>
        <script src="assets/js/admin.js"></script>
    </div>
</body>
</html>

