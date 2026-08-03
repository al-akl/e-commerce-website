<?php
/** @var array $product */
/** @var array $reviews */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets\css\reviews.css">
</head>
<body>

<div class="product-container">
    <div class="product-grid">

        <div class="product-left">
            <div class="product-image-wrapper">
                <img
                    class="product-image"
                    src="<?= $product['imageReference'] ?>"
                    alt="Product Image">
            </div>

            <div class="product-info">
                <h1 class="product-name"><?php echo $product['name']?></h1>

                <p class="product-description">
                    <?php echo $product['description'] ?>
                </p>

                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="fas fa-tag"></i> Unit Price
                        </span>
                        <span class="detail-value price">$<?php echo $product['unitPrice']?></span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="fas fa-barcode"></i> Barcode
                        </span>
                        <span class="detail-value barcode-badge"><?php echo $product['barcode']?></span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="fas fa-cubes"></i> Stock
                        </span>
                        <span class="detail-value stock-badge"><?php echo $product['stockQuantity']?> units</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="reviews-right">

            <div class="reviews-header">
                <i class="fas fa-star"></i>
                <h2>Reviews</h2>
            </div>

            
            <div class="review-list">
                <?php foreach ($reviews as $review): ?>
                    <div class="review-item">
                        <div class="review-author">
                            <i class="fas fa-user-circle"></i>
                            <?php echo $review['firstName'] . " " . $review['lastName'] ?>
                            <span class="review-date"><?php echo $review['reviewDate'] ?></span>
                        </div>

                        <div class="review-text">
                            <?php echo "<p>" . htmlspecialchars($review['content']) . "<p>" ?>
                        </div>

                        <div class="review-stars">
                            <?php if($review['rating'] == 5):?>  ★★★★★
                            <?php elseif($review['rating'] == 4):?> ★★★★
                            <?php elseif($review['rating'] == 3):?> ★★★
                            <?php elseif($review['rating'] == 2):?> ★★
                            <?php else:?> ★
                            <?php endif ?>
                        </div>
                    </div>
            <?php endforeach; ?>

            </div>

            <div class="write-review">
                <h4>
                    <i class="fas fa-pen-fancy"></i>
                    Write your review
                </h4>

                <form class="review-form" method="POST">
                    <div class="form-row">
                        <input type="number" id="rating" min="1" max="5" placeholder="Rating (1-5)">
                    </div>
                    <input type="hidden" id="barcode" name="barcode" value="<?php echo $product['barcode']?>">
                    <textarea rows="2" id="content" placeholder="Share your experience with the product..."></textarea>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i>
                        Submit Review
                    </button>
                </form>
            </div>

        </div>
        <p id="message"></p>
    </div>
</div>
<script src="assets/js/reviews.js"></script>
</body>
</html>