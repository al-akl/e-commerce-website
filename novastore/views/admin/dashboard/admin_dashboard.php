<?php
/** @var PDOStatement|array $stats */

if (!isset($_SESSION['userID']) || $_SESSION["role"] !== "ADMINISTRATOR")
    die("PAGE NOT FOUND")
?>

<?php include "views\partials\\navbar.php"; ?>

<div class="dashboard">

    <div class="top-bar">
        <div class="logo-area">
            <h1>NovaStore <span>Admin</span></h1>
            <p>Manage products, inventory and users</p>
        </div>

        <div class="admin-badge">
            Administrator •
            <?= $_SESSION["firstName"] . " " . $_SESSION["lastName"] ?>
        </div>
    </div>

    <div class="stats-row">

        <div class="stat-card">
            <div class="stat-title">Products</div>
            <div class="stat-number">
                <?= $stats["totalProducts"] ?>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Low Stock</div>
            <div class="stat-number">
                <?= $stats["lowStockProducts"] ?>
            </div>
        </div>

    </div>

    <h2 class="dashboard-title">
        Inventory & User Management
    </h2>

    <div class="actions-grid">

        <div class="action-card">
            <div class="action-icon">📦</div>
            <h3>Add Category</h3>
            <p>Create a new category.</p>
            <a href="index.php?action=category_page" class="action-btn">Add Category</a>
        </div>

        <div class="action-card">
            <div class="action-icon">📦</div>
            <h3>Add Product</h3>
            <p>Create a new product.</p>
            <a href="index.php?action=product_page" class="action-btn">Add Product</a>
        </div>

        <div class="action-card">
            <div class="action-icon">📈</div>
            <h3>Add Stock</h3>
            <p>Increase inventory quantity.</p>
            <a href="index.php?action=stock_page" class="action-btn">Add Stock</a>
        </div>

        <div class="action-card">
            <div class="action-icon">🗑️</div>
            <h3>Remove Product</h3>
            <p>Delete a product.</p>
            <a href="index.php?action=remove_page" class="action-btn">Remove</a>
        </div>

        <div class="action-card">
            <div class="action-icon">✏️</div>
            <h3>Update Product</h3>
            <p>Edit product details.</p>
            <a href="index.php?action=update_page" class="action-btn">Remove</a>
        </div>

        <div class="action-card">
            <div class="action-icon">👑</div>
            <h3>Promote User</h3>
            <p>Give administrator privileges.</p>
            <a href="index.php?action=promote_page" class="action-btn">Promote</a>
        </div>

    </div>

</div>

<?php include "views\partials\\footer.php"; ?>