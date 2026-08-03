<?php

require_once "models/Cart.php";
require_once "models/CartItem.php";
require_once "models/Order.php";
require_once "models/OrderLine.php";
require_once "models/User.php";
require_once "models/Product.php";
require_once "models/Payment.php";

class CheckoutService {
    private PDO $conn;

    private Cart $cartModel;
    private CartItem $cartItemModel;
    private Order $orderModel;
    private OrderLine $orderLineModel;
    private User $userModel;
    private Product $productModel;
    private Payment $paymentModel;

    public function __construct(PDO $conn) {
        $this->conn = $conn;

        $this->cartModel = new Cart($conn);
        $this->cartItemModel = new CartItem($conn);
        $this->orderModel = new Order($conn);
        $this->orderLineModel = new OrderLine($conn);
        $this->userModel = new User($conn);
        $this->productModel = new Product($conn);
        $this->paymentModel = new Payment($conn);
    }

    public function purchaseCart(int $userID) {
        $cartID = $this->cartModel->getCartID($userID);

        if (!$this->cartItemModel->checkCart($cartID)) 
            return ["success" => false, "message" => "you don't own cart. please reach to customer support."];
        
        $items = $this->cartItemModel->getItems($cartID);
        $totalPrice = 0;

        foreach ($items as $item) {
            if ($item['quantity'] > $item['stockQuantity'])
                return ["success" => false, "message" => "one of the items exceeds stock quantity"];
            $totalPrice += $item['unitPrice'] * $item['quantity'];
        }

        $balance = $this->userModel->getBalance($userID);

        if ($balance < $totalPrice) 
            return ["success" => false, "message" => "total price exceeds current balance"];
        
        try {

            $this->conn->beginTransaction();

            if (!$this->userModel->updateBalance($userID, $balance - $totalPrice)) 
                return ["success" => false, "message" => "Unable to update balance"];
            
            $orderID = $this->orderModel->createOrder($userID);

            if (!$orderID) 
                return ["success" => false, "message" => "Unable to create order"];

            foreach ($items as $item) {

                if (!$this->orderLineModel->addOrderLine($orderID, $item['barcode'], $item['unitPrice'], 
                    $item['quantity'])) 
                        return ["success" => false, "message" => "Unable to create order line"];
                
                if (!$this->productModel->reduceStock($item['barcode'], $item['quantity'])) 
                    return ["success" => false, "message" => "Unable to reduce stock"];
            }

            if (!$this->orderModel->updateOrderTotal($orderID, $totalPrice)) 
                return ["success" => false, "message" => "Unable to update order"];
            

            if (!$this->paymentModel->createPayment($orderID, $totalPrice)) 
                return ["success" => false, "message" => "Unable to create payment"];
            

            if (!$this->cartItemModel->clearCart($cartID)) 
                return ["success" => false, "message" => "Unable to clear cart"];
            

            $this->conn->commit();

            return ["success" => true, "message" => "cart purchased"];

        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log($e->getMessage());
            return ["success" => false, "message" => "something went wrong"];
        }
    }

    public function purchaseItem(int $userID, string $barcode) {
        $cartID = $this->cartModel->getCartID($userID);
        $item = $this->cartItemModel->getItem($cartID, $barcode);

        if (!$item) 
            return ["success" => false, "message" => "product not found"];
        
        if ($item['quantity'] > $item['stockQuantity']) 
            return ["success" => false, "message" => "quantity exceeds stock"];
        
        $totalPrice = $item['unitPrice'] * $item['quantity'];
        $balance = $this->userModel->getBalance($userID);

        if ($balance < $totalPrice) 
            return ["success" => false, "message" => "total price exceeds current balance"];
        
        try {
            $this->conn->beginTransaction();

            if (!$this->userModel->updateBalance($userID, $balance - $totalPrice)) 
                return ["success" => false, "message" => "Unable to update balance"];
            
            $orderID = $this->orderModel->createOrder($userID);

            if (!$orderID) 
                return ["success" => false, "message" => "Unable to create order"];
            
            if (!$this->orderLineModel->addOrderLine($orderID, $barcode, $item['unitPrice'], $item['quantity'])) 
                return ["success" => false, "message" => "Unable to create order line"];
            
            if (!$this->productModel->reduceStock($barcode, $item['quantity'])) 
                return ["success" => false, "message" => "Unable to reduce stock"];
            
            if (!$this->orderModel->updateOrderTotal($orderID, $totalPrice)) 
                return ["success" => false, "message" => "Unable to update order"];
            
            if (!$this->paymentModel->createPayment($orderID, $totalPrice)) 
                return ["success" => false, "message" => "Unable to create payment"];
            
            if (!$this->cartItemModel->deleteItem($cartID, $barcode)) 
                return ["success" => false, "message" => "Unable to remove purchased item"];
            
            $this->conn->commit();
            return ["success" => true, "message" => "Everything looks perfect"];

        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log($e->getMessage());
            return ["success" => false, "message" => "something went wrong"];
        }
    }
}