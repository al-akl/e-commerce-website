<?php

require_once "models/Category.php";

class CategoryService {
    private Category $categoryModel;

    public function __construct(PDO $conn) {
        $this->categoryModel = new Category($conn);
    }

    public function getCategories(): array {
        return $this->categoryModel->getCategories();
    }

    public function getCategoryID(string $category): int {
        return $this->categoryModel->getCategoryID($category);
    }

    public function addCategory(string $category): array {
        $category = trim($category);

        if (empty($category)) 
            return ["success" => false, "message" => "Category name is required."];
        

        if ($this->categoryModel->checkCategory($category)) 
            return ["success" => false, "message" => "Category already exists."];
        

        if (!$this->categoryModel->addCategory($category)) 
            return ["success" => false, "message" => "Failed to add category."];
        

        return ["success" => true, "message" => "Category added successfully."];
    }

    public function categoryExists(string $category): bool {
        return $this->categoryModel->checkCategory($category);
    }
}