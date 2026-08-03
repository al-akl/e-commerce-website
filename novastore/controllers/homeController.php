<?php

require_once "services/HomeService.php";

class HomeController {
    private HomeService $homeService;

    public function __construct(PDO $conn) {
        $this->homeService = new HomeService($conn);
    }

    public function getAllProducts(): void {
        $data = $this->homeService->getAllProducts();

        $products = $data['products'];
        $categories = $data['categories'];

        require_once "views/public/home.php";
    }

    public function getNewArrivals(): void {
        $data = $this->homeService->getNewArrivals();

        $products = $data['products'];
        $categories = $data['categories'];

        require_once "views/public/new_arrivals.php";
    }

    public function getProductsByCategory(): void {
        if ($_SERVER["REQUEST_METHOD"] !== "GET") 
            return;
        
        $data = $this->homeService->getProductsByCategory($_GET['category']);

        $products = $data['products'];
        $categories = $data['categories'];
        $selectedCategory = $_GET['category'];

        require_once "views/public/categories.php";
    }

    public function openReview(): void {
        if ($_SERVER["REQUEST_METHOD"] !== "GET") 
            return;

        $barcode = $_GET['barcode'];

        $product = $this->homeService->getProductByBarcode($barcode);
        $reviews = $this->homeService->getProductReviews($barcode);

        require_once "views/public/reviews.php";
    }
}