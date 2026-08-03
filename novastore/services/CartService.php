<?php

require_once "models/Cart.php";
require_once "models/CartItem.php";

class CartService {
    private Cart $cartModel;
    private CartItem $cartItemModel;

    public function __construct(PDO $conn) {
        $this->cartModel = new Cart($conn);
        $this->cartItemModel = new CartItem($conn);
    }

    public function createCart(int $userID): bool {
        return $this->cartModel->createCart($userID);
    }

    public function getItems(int $userID): array {
        $cartID = $this->cartModel->getCartID($userID);

        if ($cartID === -1) 
            return [];
        
        return $this->cartItemModel->getItems($cartID);
    }

    public function addToCart(int $userID, string $barcode): bool {
        $cartID = $this->cartModel->getCartID($userID);

        if ($cartID === -1) 
            return false;

        return $this->cartItemModel->addItem($cartID, $barcode);
    }

    public function increaseQuantity(int $userID, string $barcode): array {
        $cartID = $this->cartModel->getCartID($userID);

        $this->cartItemModel->addQuantity($cartID, $barcode);

        return ['quantity' => $this->cartItemModel->getQuantity($cartID, $barcode),
            'totalPrice' => $this->calculateTotal($userID)];
    }

    public function decreaseQuantity(int $userID, string $barcode): array {
        $cartID = $this->cartModel->getCartID($userID);

        $currentQuantity = $this->cartItemModel->getQuantity($cartID, $barcode);

        if ($currentQuantity <= 1) {
            $this->cartItemModel->deleteItem($cartID, $barcode);
            return ['quantity' => 0, 'totalPrice' => $this->calculateTotal($userID)];
        }

        $this->cartItemModel->removeQuantity($cartID, $barcode);

        return ['quantity' => $this->cartItemModel->getQuantity($cartID, $barcode),
            'totalPrice' => $this->calculateTotal($userID)];
    }

    public function removeItem(int $userID, string $barcode): bool {
        $cartID = $this->cartModel->getCartID($userID);
        return $this->cartItemModel->deleteItem($cartID, $barcode);
    }

    public function clearCart(int $userID): bool {
        $cartID = $this->cartModel->getCartID($userID);
        return $this->cartItemModel->clearCart($cartID);
    }

    public function getItem(int $userID, string $barcode): array {
        $cartID = $this->cartModel->getCartID($userID);
        return $this->cartItemModel->getItem($cartID, $barcode);
    }

    public function getQuantity(int $userID, string $barcode): int {
        $cartID = $this->cartModel->getCartID($userID);
        return $this->cartItemModel->getQuantity($cartID, $barcode);
    }

    public function calculateTotal(int $userID): float {
        $items = $this->getItems($userID);
        $total = 0;

        foreach ($items as $item) 
            $total += $item['unitPrice'] * $item['quantity'];
        
        return $total;
    }

    public function hasItems(int $userID): bool {
        $cartID = $this->cartModel->getCartID($userID);
        return $this->cartItemModel->checkCart($cartID);
    }

    public function getCartID(int $userID): int {
        return $this->cartModel->getCartID($userID);
    }
}