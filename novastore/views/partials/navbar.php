<?php
/** @var PDOStatement|array $categories */
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaStore</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <div class="navbar">
        <div class="container nav-container">

            <a href="homepage.php" class="logo">✦ NOVASTORE</a>

            <div class="nav-links">

                <a href="index.php?action=index">Home</a>

                <a href="index.php?action=getArrivals">New Arrivals</a>

                <div class="dropdown">

                    <a href="#" class="dropdown-btn">Categories</a>

                    <div class="dropdown-content">
                        <?php foreach($categories as $category): ?>
                            <a href="index.php?action=getCategory&category=<?= urlencode($category['categoryName']) ?>">
                                <?= htmlspecialchars($category['categoryName']) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>

                </div>

                <?php if(isset($_SESSION["userID"])): ?>
                    <a href="index.php?action=cart">Shopping Cart</a>
                <?php else: ?>
                    <a href="#" class="openModal">Shopping Cart</a>
                <?php endif; ?>


                <?php if(isset($_SESSION["role"]) && $_SESSION["role"] === "ADMINISTRATOR"): ?>
                    <a href="index.php?action=admin_dashboard">Admin Dashboard</a>
                <?php endif; ?>

                <div class="auth-buttons">

                    <?php if(!isset($_SESSION["userID"])): ?>
                        <a href="index.php?action=loginPage">
                            <button class="btn-outline">Log In</button>
                        </a>
                    <?php else: ?>
                        <a href="index.php?action=logout">
                            <button class="btn-primary">Log Out</button>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
