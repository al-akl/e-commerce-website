<?php

require_once "services/CartService.php";
require_once "services/CheckoutService.php";
require_once "models/Category.php";

class CartController {
    private CartService $cartService;
    private CheckoutService $checkoutService;
    private Category $categoryModel;

    public function __construct(PDO $conn) {
        $this->cartService = new CartService($conn);
        $this->checkoutService = new CheckoutService($conn);
        $this->categoryModel = new Category($conn);
    }

    public function createCart(): void {
        if (!isset($_SESSION['userID'])) 
            return;
        
        $this->cartService->createCart($_SESSION['userID']);
    }

    public function getItems(): void {
        if (!isset($_SESSION['userID'])) 
            return;
        
        $userID = $_SESSION['userID'];

        $products = $this->cartService->getItems($userID);
        $totalPrice = $this->cartService->calculateTotal($userID);
        $categories = $this->categoryModel->getCategories();
        
        include_once "views/private/cart.php";
    }

    public function addToCart(): void {
        if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_SESSION['userID'])) 
            return;
        
        $success = $this->cartService->addToCart($_SESSION['userID'], $_POST['barcode']);

        echo json_encode(["success" => $success, "message" => $success ? null : "Could not add item"]);
        exit;
    }

    public function updateQuantity(): void {
        if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_SESSION['userID'])) 
            return;
        
        $userID = $_SESSION['userID'];
        $barcode = $_POST['barcode'];

        if (isset($_POST['increaseQuantity'])) {

            $result = $this->cartService->increaseQuantity($userID, $barcode);

            echo json_encode(["success" => true, "quantity" => $result['quantity'], 
                "totalPrice" => $result['totalPrice']]);
            exit;
        }

        if (isset($_POST['decreaseQuantity'])) {

            $result = $this->cartService->decreaseQuantity($userID, $barcode);

            echo json_encode(["success" => true, "quantity" => $result['quantity'], 
                "totalPrice" => $result['totalPrice']]);
            exit;
        }

        echo json_encode(["success" => false, "message" => "Invalid request."]);
        exit;
    }

    public function purchaseCart(): void {
        if (!isset($_SESSION['userID'])) 
            return;
        
        $userID = $_SESSION['userID'];
        $response = $this->checkoutService->purchaseCart($userID);
        echo json_encode($response);
        exit;
    }

    public function purchaseItem(): void {
        if (!isset($_SESSION['userID'])) 
            return;
        
        $userID = $_SESSION['userID'];
        $barcode = $_POST['barcode'];

        $response = $this->checkoutService->purchaseItem($userID, $barcode);

        if ($response["success"]) 
            $response["totalPrice"] = $this->cartService->calculateTotal($userID);
        

        echo json_encode($response);
        exit;
    }
}