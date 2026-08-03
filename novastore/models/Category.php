<?php

class Category {
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function getCategoryID(string $category): int {
        if (!$this->checkCategory($category))
            return -1;

        try {
            $stmt = $this->conn->prepare("SELECT categoryID FROM category 
                WHERE categoryName = :category");

            $stmt->bindParam(":category", $category);
            $stmt->execute();

            return $stmt->fetchColumn();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function addCategory(string $category): bool {
        try {
            $stmt = $this->conn->prepare("INSERT INTO 
                category(categoryName) 
                VALUES(:category)");

            $stmt->bindParam(":category", $category);
            return $stmt->execute();

        } catch(PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getCategories(): array {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM category");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function checkCategory(string $category): bool {
        try {
            $stmt = $this->conn->prepare("SELECT categoryName FROM category 
                WHERE categoryName = :category");

            $stmt->bindParam(":category", $category);
            $stmt->execute();

            if ($stmt->rowCount() > 0)
                return true;

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return false;
    }

}


?>