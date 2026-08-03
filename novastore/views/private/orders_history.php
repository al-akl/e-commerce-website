<?php
if (!isset($_SESSION['userID']))
    die("PAGE NOT FOUND");
/** @var PDOStatement $orders */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/orders.css">
    <title>Document</title>
</head>
<body>

    <div class="history-container">


        <!-- header -->
        <div class="history-header">
            <h1><i class="fas fa-clock-rotate-left"></i> Order history</h1>
            <div class="customer-badge"><i class="fas fa-user"></i> <span><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']?></span></div>
        </div>

        <div class="order-grid">

            <?php foreach ($orders as $order): ?>

            <div class="order-card">
                <div class="order-image"><img src="<?= $order['imageReference'] ?>" alt="<?= $order['name'] ?>" loading="lazy" /></div>
                <div class="order-meta">
                    <span class="order-id"><i class="fas fa-hashtag"></i> <?= $order['orderID'] ?></span>
                    <span class="order-date"><i class="far fa-calendar-alt"></i> <?= $order['orderDate'] ?></span>
                </div>
                <div class="item-name"><?= $order['name'] ?></div>
                <div class="item-description"><?= $order['description'] ?></div>
                <div class="order-footer">
                    <span class="order-price"><small>$</small><?= $order['priceAtPurchase'] * $order['quantity'] ?></span>
                    <span class="order-action">Quantity: <?= $order['quantity'] ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="history-footer">
            <span><i class="fas fa-arrow-right"></i> <a href="index.php?action=index" style="color: #2a6df4; text-decoration: none; font-weight: 500;">go back</a></span>
        </div>
    </div>
</body>
</html>