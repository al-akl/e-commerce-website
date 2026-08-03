<?php

class Payment {
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function createPayment(int $orderID, float $amount) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO 
                payments(orderID, paymentMethod, amount)
                VALUES(:orderID, 'digital', :amount)"
            );

            $stmt->bindParam(":orderID", $orderID, PDO::PARAM_INT);
            $stmt->bindParam(":amount", $amount);

            return $stmt->execute();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

}

?>