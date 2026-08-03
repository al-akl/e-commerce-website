<?php

class Review {
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function addReview(int $userID, string $barcode, string $content, int $rating): bool {
        try {
            $stmt = $this->conn->prepare("INSERT INTO reviews(userID, barcode, content, rating) 
                VALUES(:userID, :barcode, :content, :rating)");

            $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
            $stmt->bindParam(":barcode", $barcode);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":rating", $rating, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

}