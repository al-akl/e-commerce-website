<?php 

class OrderLine {
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function addOrderLine(int $orderID, string $barcode, float $unitPrice, int $quantity): bool {
        $totalPrice = $unitPrice * $quantity;

        try {

            $stmt = $this->conn->prepare("INSERT INTO 
                orderline(orderID, barcode, priceAtPurchase, totalPrice, quantity) 
                VALUES(:orderID, :barcode, :priceAtPurchase, :totalPrice, :quantity)");

            $stmt->bindParam(":orderID", $orderID, PDO::PARAM_INT);
            $stmt->bindParam(":barcode", $barcode);
            $stmt->bindParam(":priceAtPurchase", $unitPrice);
            $stmt->bindParam(":totalPrice", $totalPrice);
            $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);

            return $stmt->execute();

        } catch(PDOException $e) {
            die("Error: " . $e->getMessage());
        }

       
    }

}

?>