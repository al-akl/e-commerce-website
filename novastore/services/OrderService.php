<?php

require_once "models/Order.php";

class OrderService {
    private Order $orderModel;

    public function __construct(PDO $conn) {
        $this->orderModel = new Order($conn);
    }

    public function getUserOrders(int $userID): array {
        $orders = $this->orderModel->getUserOrders($userID);

        if ($orders === []) 
            return [];
        
        return $orders;
    }

}
    
