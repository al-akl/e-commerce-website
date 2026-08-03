<?php

require_once "models/Product.php";
require_once "models/Category.php";

class HomeService {
    private Product $productModel;
    private Category $categoryModel;

    public function __construct(PDO $conn) {
        $this->productModel = new Product($conn);
        $this->categoryModel = new Category($conn);
    }

    public function getAllProducts(): array {
        return ['products' => $this->productModel->getAllProducts(), 
            'categories' => $this->categoryModel->getCategories()];
    }

    public function getNewArrivals(): array {
        return ['products' => $this->productModel->getNewArrivals(), 
            'categories' => $this->categoryModel->getCategories()];
    }

    public function getProductsByCategory(string $category): array {
        $categoryID = $this->categoryModel->getCategoryID($category);

        return ['products' => $this->productModel->getProductsByCategory($categoryID), 
            'categories' => $this->categoryModel->getCategories()];
    }

    public function getProductByBarcode(string $barcode) {
        return $this->productModel->getProductByBarcode($barcode);
    }

    public function getProductReviews(string $barcode): array {
        return $this->productModel->getProductReviews($barcode);
    }
}