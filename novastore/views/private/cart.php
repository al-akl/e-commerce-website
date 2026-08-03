<?php
/** @var PDOStatement $products */
/** @var PDOStatement $categories */
/** @var float $totalPrice */
?>


<?php include_once "views\partials\\navbar.php"; ?>

<main class="container">

    
    <div class="section-title"> 
        <div>⚡Shopping Cart</div>
        <div><a href="index.php?action=getUserOrders">view orders</a></div>  
    </div>

    <?php if (empty($products)): ?>
            <p style="color:red;" class="cartMessages">Cart is empty</p>
    <?php else: ?>
        <div class="products-grid">

            <?php foreach ($products as $product): ?>

                <div class="product-card">
                    <form class="reviewForm" method="POST">
                        <input type="hidden" name="barcode" id="barcode" value="<?=  $product['barcode'] ?>">
                        <img class="product-img" src="<?= $product['imageReference'] ?>" alt="<?= $product['name'] ?>">
                    </form>

                    <div class="product-info">

                        <div class="product-category" style="display: flex; justify-content: space-between;">
                            <div class="quantity">Quantity: <?php echo $product["quantity"]; ?> </div>
                            <div>
                                <form class="updateQuantityForm">
                                    <input type="hidden" name="barcode" value="<?= $product['barcode']; ?>">
                                    <button type="submit" name="increaseQuantity">Add</button>
                                    <button type="submit" name="decreaseQuantity">Remove</button>
                                </form>
                            </div>
                        </div>

                        <div class="product-title"><?= $product['name'] ?></div>

                        <div class="product-price"><?= $product['unitPrice'] ?><small>USD</small></div>

                        <?php if(isset($_SESSION['userID'])): ?>

                            <form method="POST" class="purchaseItemForm">
                                <input type="hidden" name="barcode" value="<?= $product['barcode'] ?>">
                                <button class="btn-add" type="submit" name="purchaseItem">Purchase</button>
                            </form>

                        <?php else: ?>
                            <button class="btn-add openModal">Add To Cart</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif;?>

    <?php if (!empty($products)): ?>
        <h2 id="cartTotal">Total:<?= $totalPrice ?> USD</h2>
        <form method="POST" id="purchaseCartForm">
            <button class="btn-primary" name="purchaseAllItems"> Purchase All </button>
        </form>
    <?php endif; ?>

</main>

<!-- <?php include_once "views\partials\\footer.php"; ?> -->
<script src="assets/js/cart.js"></script>
<script src="assets/js/reviews.js"></script>

</body>