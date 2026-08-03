<?php

session_start();

require_once 'core/Router.php';

$router = new Router();

// Auth Controller
$router->add('loginPage', 'authController', 'loginPage');
$router->add('login', 'authController', 'login');

$router->add('logout', 'authController', 'logout');

$router->add('registerPage', 'authController', 'signupPage');
$router->add('register', 'authController', 'signup');

// Home Controller
$router->add('index', 'homeController', 'getAllProducts');
$router->add('getArrivals', 'homeController', 'getNewArrivals');
$router->add('getCategory', 'homeController', 'getProductsByCategory');
$router->add('openReview', 'homeController', 'openReview');

// Admin Controller
$router->add('admin_dashboard', 'adminController', 'showDashboard');

$router->add('category_page', 'adminController', 'showCategory');
$router->add('addCategory', 'adminController', 'addCategory');

$router->add('product_page', 'adminController', 'showProduct');
$router->add('addProduct', 'adminController', 'addProduct');

$router->add('stock_page', 'adminController', 'showStock');
$router->add('addStock', 'adminController', 'addStock');

$router->add('remove_page', 'adminController', 'showRemove');
$router->add('removeProduct', 'adminController', 'removeProduct');

$router->add('update_page', 'adminController', 'showUpdate');
$router->add('updateProduct', 'adminController', 'updateProduct');

$router->add('promote_page', 'adminController', 'showPromote');
$router->add('promoteUser', 'adminController', 'promoteUser');

// Cart Controller
$router->add('cart', 'cartController', 'getItems');

$router->add('addToCart', 'cartController', 'addToCart');

$router->add('updateQuantity', 'cartController', 'updateQuantity');

$router->add('purchaseCart', 'cartController', 'purchaseCart');

$router->add('purchaseItem', 'cartController', 'purchaseItem');

// Order Controller
$router->add('getUserOrders', 'orderController', 'getUserOrders');

// Reviews Controller
$router->add('addReview', 'reviewController', 'addReview');



$action = $_POST['action'] ?? $_GET['action'] ?? 'index';
$router->dispatch($action);

?>