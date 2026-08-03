<?php

class Order {
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function createOrder(int $userID): int {
        try {
            $stmt = $this->conn->prepare("INSERT INTO orders(userID) VALUES(:userID)");

            $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
            $stmt->execute();
            return $this->conn->lastInsertId();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function updateOrderTotal(int $orderID, float $totalPrice): bool {
        try {
            $stmt = $this->conn->prepare("UPDATE orders 
                SET totalPrice = :totalPrice WHERE orderID = :orderID");

            $stmt->bindParam(":totalPrice", $totalPrice);
            $stmt->bindParam(":orderID", $orderID, PDO::PARAM_INT);

            return $stmt->execute();

        } catch(PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getUserOrders(int $userID): array {
        try {
            $stmt = $this->conn->prepare("SELECT o.orderID, o.orderDate, ol.priceAtPurchase, ol.quantity, 
                p.name, p.description, p.imageReference FROM orders o 
                JOIN orderline ol ON o.orderID = ol.orderID 
                JOIN products p ON ol.barcode = p.barcode 
                WHERE o.userID = :userID");

            $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

?>