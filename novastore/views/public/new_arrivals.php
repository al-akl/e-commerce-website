<?php
/** @var PDOStatement $products */
?>

<?php include "views\partials\\navbar.php"; ?>

<div class="hero">
    <div class="container">
        <h1>Beyond the ordinary</h1>
        <p>Minimalist design, curated essentials — elevate your everyday.</p>
    </div>
</div>

<main class="container">

    <div class="section-title">⚡New Arrivals</div>
    
    <div class="products-grid">

        <?php foreach ($products as $product): ?>

            <div class="product-card">
                <form class="reviewForm" method="POST">
                    <input type="hidden" name="barcode" id="barcode" value="<?=  $product['barcode'] ?>">
                    <img class="product-img" src="<?= $product['imageReference'] ?>" alt="<?= $product['name'] ?>">
                </form>

                <div class="product-info">

                    <div class="product-category"><?= $product['categoryName'] ?></div>

                    <div class="product-title"><?= $product['name'] ?></div>

                    <div class="product-price"><?= $product['unitPrice'] ?><small>USD</small></div>

                    <?php if(isset($_SESSION['userID'])): ?>

                        <form method="POST" class="addToCartForm">
                            <input type="hidden" name="barcode" value="<?= $product['barcode'] ?>">
                            <button class="btn-add" type="submit" name="addToCart">Add To Cart</button>
                            <div class="cartMessage" style="width: 50%; margin: 0 auto;"></div>
                        </form>

                    <?php else: ?>
                        <button class="btn-add openModal">Add To Cart</button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="interactive-note">✨ Minimalist curation</div>

</main>

<?php include "views\partials\modal.php"; ?>

<?php include "views\partials\\footer.php"; ?>

<script src="assets/js/cart.js"></script>
<script src="assets/js/modal.js"></script>
<script src="assets/js/reviews.js"></script>


</body>
</html>
