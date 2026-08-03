<?php

require_once "models/Product.php";
require_once "models/Category.php";

class DashboardService {
    private Product $productModel;
    private Category $categoryModel;

    public function __construct(PDO $conn) {
        $this->productModel = new Product($conn);
        $this->categoryModel = new Category($conn);
    }


    public function getDashboardData(): array {
        $stats = ["totalProducts" => $this->productModel->getTotalProducts(),
            "lowStockProducts" => $this->productModel->getLowStockCount()];

        return ["stats" => $stats, "categories" => $this->categoryModel->getCategories()];
    }
}