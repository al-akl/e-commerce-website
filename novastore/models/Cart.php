<?php

class Cart {
    
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function createCart(int $userID): bool {
        try {
            $stmt = $this->conn->prepare("INSERT INTO shoppingcart(userID) VALUES(:userID)");

            $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
            return $stmt->execute();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getCartID(int $userID): int {
        try {
            $stmt = $this->conn->prepare("SELECT cartID FROM shoppingcart WHERE userID = :userID");

            $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchColumn();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }


}


?>