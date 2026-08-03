<?php

require_once "services/OrderService.php";

class OrderController {
    private OrderService $orderService;

    public function __construct(PDO $conn) {
        $this->orderService = new OrderService($conn);
    }

    public function getUserOrders(): void {   
        if (!isset($_SESSION['userID'])) 
            return;
        
        $userID = $_SESSION['userID'];

        $orders = $this->orderService->getUserOrders($userID);

        include_once "views/private/orders_history.php";
    }
}

?>