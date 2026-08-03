<?php

require_once "models/Product.php";
require_once "models/Category.php";

class ProductService {
    private Product $productModel;
    private Category $categoryModel;

    public function __construct(PDO $conn) {
        $this->productModel = new Product($conn);
        $this->categoryModel = new Category($conn);
    }

    public function addProduct(string $barcode, string $name, string $description, string $category,
        float $price, string $imageReference): array {

        $barcode = trim($barcode);
        $name = trim($name);
        $description = trim($description);
        $category = trim($category);

        if (empty($barcode) || empty($name) || empty($description) || empty($category) || empty($imageReference)) 
            return ["success" => false, "message" => "All fields are required."];
        
        if ($this->productModel->checkProduct($barcode)) 
            return ["success" => false, "message" => "Product already exists."];

        $categoryID = $this->categoryModel->getCategoryID($category);

        if ($categoryID === -1) 
            return ["success" => false, "message" => "Category not found."];

        if ($price <= 0) 
            return ["success" => false, "message" => "Unit price must be greater than 0."];
        
        if (!$this->productModel->addProduct($barcode, $name, $description, $categoryID, $price, $imageReference)) 
            return ["success" => false,"message" => "Failed to add product."];
        
        return ["success" => true, "message" => "Product added successfully."];
    }

    public function addStock(string $barcode, int $quantity): array {
        $barcode = trim($barcode);

        if (empty($barcode)) 
            return ["success" => false, "message" => "Barcode is required."];
        
        if (!$this->productModel->checkProduct($barcode)) 
            return ["success" => false, "message" => "Product does not exist."];
        
        if ($quantity <= 0) 
            return ["success" => false, "message" => "Quantity must be greater than 0."];
        
        if (!$this->productModel->addStock($barcode, $quantity)) 
            return ["success" => false, "message" => "Failed to add stock."];
        
        return ["success" => true, "message" => "Stock updated successfully."];
    }

    public function updateProduct(string $barcode, array $data): array {
        if (!$this->productModel->checkProduct($barcode)) 
            return ["success" => false, "message" => "Product does not exist."];
        
        $fields = [];

        if (!empty(trim($data["productName"] ?? ""))) 
            $fields["name"] = trim($data["productName"]);
        

        if (!empty(trim($data["productDescription"] ?? ""))) 
            $fields["description"] = trim($data["productDescription"]);
        

        if (!empty(trim($data["productCategory"] ?? ""))) {
            if (!$this->categoryModel->checkCategory($data["productCategory"])) 
                return ["success" => false, "message" => "Category does not exist."];
            
            $fields["categoryID"] = $this->categoryModel->getCategoryID($data["productCategory"]);
        }

        if (!empty(trim($data["productReference"] ?? ""))) 
            $fields["imageReference"] = trim($data["productReference"]);
        
        if (empty($fields)) 
            return ["success" => false, "message" => "Nothing to update."];
        
        if (!$this->productModel->updateProduct($barcode, $fields)) 
            return ["success" => false, "message" => "Failed to update product."];
        
        return ["success" => true, "message" => "Product updated successfully."];
    }

    public function removeProduct(string $barcode): array {
        $barcode = trim($barcode);

        if (empty($barcode)) 
            return ["success" => false, "message" => "Barcode is required."];
        
        if (!$this->productModel->checkProduct($barcode)) 
            return ["success" => false, "message" => "Product does not exist."];
        
        if (!$this->productModel->removeProduct($barcode)) 
            return ["success" => false, "message" => "Failed to remove product."];
        
        return ["success" => true, "message" => "Product removed successfully."];
    }

    public function getStatistics(): array {
        return ["totalProducts" => $this->productModel->getTotalProducts(), 
            "lowStockProducts" => $this->productModel->getLowStockCount()];
    }

    public function productExists(string $barcode): bool {
        return $this->productModel->checkProduct($barcode);
    }
}