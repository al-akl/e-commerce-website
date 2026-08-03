<?php 

class Product {
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    // Home Operations

    public function getAllProducts(): array {
        try {
            $stmt = $this->conn->prepare("SELECT p.*, c.categoryName FROM products p 
                INNER JOIN category c ON p.categoryID = c.categoryID
                WHERE stockQuantity > 0 ORDER BY insertionDate DESC, name ASC");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getNewArrivals(): array {
        try {
            $stmt = $this->conn->prepare("SELECT p.*, c.categoryName FROM products p
                INNER JOIN category c ON p.categoryID = c.categoryID
                WHERE stockQuantity > 0 AND DATEDIFF(NOW(), insertionDate) <= 90");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getProductsByCategory(int $categoryID): array {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM products 
                WHERE categoryID = :categoryID AND stockQuantity > 0");

            $stmt->bindParam(":categoryID", $categoryID, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // Admin Dashboard

    public function getTotalProducts(): int {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM products");

            $stmt->execute();
            return $stmt->fetchColumn();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getLowStockCount(): int {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM products 
                WHERE stockQuantity < 5");

            $stmt->execute();
            return $stmt->fetchColumn();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // Admin Functionalities

    public function addProduct(string $barcode, string $name, string $description, 
        int $categoryID, float $price, string $imageReference): bool {
        
        try {
            $stmt = $this->conn->prepare("INSERT INTO 
                products(barcode, name, description, categoryID, unitPrice, imageReference) 
                VALUES(:barcode, :name, :description, :categoryID, :price, :imageReference)");

            $stmt->bindParam(":barcode", $barcode);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":categoryID", $categoryID, PDO::PARAM_INT);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":imageReference", $imageReference);
            
            return $stmt->execute(); 

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function addStock(string $barcode, int $quantity): bool {
        
        try {
            $stmt = $this->conn->prepare("UPDATE products 
                SET stockQuantity = stockQuantity + :quantity 
                WHERE barcode = :barcode");

            $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
            $stmt->bindParam(":barcode", $barcode);
            
            return $stmt->execute();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function updateProduct(string $barcode, array $fields) {
        $setParts = [];

        foreach($fields as $column=>$value) 
            $setParts[] = "$column = :$column";

        $sql = "UPDATE products SET " . implode(", ",$setParts) . " WHERE barcode = :barcode";

        $fields["barcode"] = $barcode;

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute($fields);
    }

    public function removeProduct(string $barcode): bool {
        
        try {
            $stmt = $this->conn->prepare("DELETE FROM products 
                WHERE barcode = :barcode");
            
            $stmt->bindParam(":barcode", $barcode);

            return $stmt->execute();
            
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

    }

    public function checkProduct(string $barcode): bool {
        try {
            $stmt = $this->conn->prepare("SELECT 1 FROM products 
                WHERE barcode = :barcode LIMIT 1");
            $stmt->bindParam(":barcode", $barcode);
            $stmt->execute();

            if ($stmt->fetch()) 
                return true;
            return false;

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function reduceStock(string $barcode, int $quantity): bool {
        try {
            $stmt = $this->conn->prepare("UPDATE products 
                SET stockQuantity = stockQuantity - :quantity WHERE barcode = :barcode");

            $stmt->bindParam(":barcode", $barcode);
            $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
            
            return $stmt->execute();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getProductByBarcode(string $barcode) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM products WHERE barcode = :barcode");
            $stmt->bindParam(':barcode', $barcode);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getProductReviews(string $barcode): array {
        try {
            $stmt = $this->conn->prepare("SELECT r.content, r.rating, r.reviewDate, u.firstName, u.lastName 
                FROM products p 
                JOIN reviews r ON p.barcode = r.barcode  
                JOIN users u ON r.userID = u.userID
                WHERE p.barcode = :barcode");
            $stmt->bindParam(":barcode", $barcode);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
 }


?>