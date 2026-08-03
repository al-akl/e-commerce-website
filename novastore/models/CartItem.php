<?php

class CartItem {
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function getItems(int $cartID): array {
        try {
            $stmt = $this->conn->prepare("
                SELECT p.*, c.quantity
                FROM products p
                INNER JOIN cartitem c
                    ON p.barcode = c.barcode
                WHERE c.cartID = :cartID
            ");

            $stmt->bindParam(":cartID", $cartID, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getItem(int $cartID, string $barcode): array {
        try {
            $stmt = $this->conn->prepare("
                SELECT p.*, c.quantity
                FROM products p
                INNER JOIN cartitem c
                    ON p.barcode = c.barcode
                WHERE c.cartID = :cartID
                AND c.barcode = :barcode
            ");

            $stmt->bindParam(":cartID", $cartID, PDO::PARAM_INT);
            $stmt->bindParam(":barcode", $barcode);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function addItem(int $cartID, string $barcode): bool {
        try {

            if ($this->getQuantity($cartID, $barcode) != -1) 
                return $this->addQuantity($cartID, $barcode);
            

            $stmt = $this->conn->prepare("
                INSERT INTO cartitem(cartID, barcode)
                VALUES(:cartID, :barcode)
            ");

            $stmt->bindParam(":cartID", $cartID, PDO::PARAM_INT);
            $stmt->bindParam(":barcode", $barcode);

            return $stmt->execute();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function addQuantity(int $cartID, string $barcode): bool {
        try {

            $stmt = $this->conn->prepare("
                UPDATE cartitem
                SET quantity = quantity + 1
                WHERE cartID = :cartID
                AND barcode = :barcode
            ");

            $stmt->bindParam(":cartID", $cartID, PDO::PARAM_INT);
            $stmt->bindParam(":barcode", $barcode);

            return $stmt->execute();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function removeQuantity(int $cartID, string $barcode): bool {
        try {

            $stmt = $this->conn->prepare("
                UPDATE cartitem
                SET quantity = quantity - 1
                WHERE cartID = :cartID
                AND barcode = :barcode
            ");

            $stmt->bindParam(":cartID", $cartID, PDO::PARAM_INT);
            $stmt->bindParam(":barcode", $barcode);

            return $stmt->execute();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function deleteItem(int $cartID, string $barcode): bool {
        try {

            $stmt = $this->conn->prepare("
                DELETE FROM cartitem
                WHERE cartID = :cartID
                AND barcode = :barcode
            ");

            $stmt->bindParam(":cartID", $cartID, PDO::PARAM_INT);
            $stmt->bindParam(":barcode", $barcode);

            return $stmt->execute();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function clearCart(int $cartID): bool {
        try {

            $stmt = $this->conn->prepare("
                DELETE FROM cartitem
                WHERE cartID = :cartID
            ");

            $stmt->bindParam(":cartID", $cartID, PDO::PARAM_INT);

            return $stmt->execute();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function checkCart(int $cartID): bool {
        try {

            $stmt = $this->conn->prepare("
                SELECT COUNT(*)
                FROM cartitem
                WHERE cartID = :cartID
            ");

            $stmt->bindParam(":cartID", $cartID, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchColumn() > 0;

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getQuantity(int $cartID, string $barcode): int {
        try {

            $stmt = $this->conn->prepare("
                SELECT quantity
                FROM cartitem
                WHERE cartID = :cartID
                AND barcode = :barcode
            ");

            $stmt->bindParam(":cartID", $cartID, PDO::PARAM_INT);
            $stmt->bindParam(":barcode", $barcode);

            $stmt->execute();

            $quantity = $stmt->fetchColumn();

            return ($quantity !== false)
                ? (int)$quantity
                : -1;

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}