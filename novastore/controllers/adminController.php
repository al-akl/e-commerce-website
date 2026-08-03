<?php

require_once "services/DashboardService.php";
require_once "services/CategoryService.php";
require_once "services/ProductService.php";
require_once "services/UserService.php";

class AdminController {
    private DashboardService $dashboardService;
    private CategoryService $categoryService;
    private ProductService $productService;
    private UserService $userService;

    public function __construct(PDO $conn) {
        $this->dashboardService = new DashboardService($conn);
        $this->categoryService = new CategoryService($conn);
        $this->productService = new ProductService($conn);
        $this->userService = new UserService($conn);
    }

    /* ---------------- Dashboard ---------------- */

    public function showDashboard(): void {
        $data = $this->dashboardService->getDashboardData();

        $stats = $data["stats"];
        $categories = $data["categories"];

        include_once "views/admin/dashboard/admin_dashboard.php";
    }

    /* ---------------- Views ---------------- */

    public function showCategory(): void {
        include_once "views/admin/category/add_category.php";
    }

    public function showProduct(): void {
        include_once "views/admin/product/add_product.php";
    }

    public function showStock(): void {
        include_once "views/admin/product/add_product_stock.php";
    }

    public function showRemove(): void {
        include_once "views/admin/product/remove_product.php";
    }

    public function showUpdate(): void {
        include_once "views/admin/product/update_product.php";
    }

    public function showPromote(): void {
        include_once "views/admin/user/promote_user.php";
    }

    /* ---------------- Category ---------------- */

    public function addCategory(): void {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") 
            return;
        
        echo json_encode($this->categoryService->addCategory($_POST["categoryName"]));

        exit;
    }

    /* ---------------- Product ---------------- */

    public function addProduct(): void {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") 
            return;
        
        $imageReference = str_replace('\\', '/', $_POST['productReference']);

        echo json_encode($this->productService->addProduct($_POST["barcode"], $_POST["productName"], 
            $_POST["productDescription"], $_POST["productCategory"], (float) $_POST["unitPrice"], 
            $imageReference));

        exit;
    }

    public function addStock(): void {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") 
            return;
        
        echo json_encode($this->productService->addStock($_POST["barcode"], (int) $_POST["quantity"]));

        exit;
    }

    public function updateProduct(): void {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") 
            return;
        
        echo json_encode($this->productService->updateProduct($_POST["barcode"], $_POST));

        exit;
    }

    public function removeProduct(): void {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") 
            return;
        
        echo json_encode($this->productService->removeProduct($_POST["barcode"]));

        exit;
    }

    /* ---------------- User ---------------- */

    public function promoteUser(): void {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") 
            return;
        
        echo json_encode($this->userService->promoteUser($_POST["firstName"], $_POST["lastName"], 
            $_POST["emailAddress"]));

        exit;
    }
}