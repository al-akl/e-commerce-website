<?php

require_once "services/ReviewService.php";

class ReviewController {
    private ReviewService $reviewService;

    public function __construct(PDO $conn) {
        $this->reviewService = new ReviewService($conn);
    }

    public function addReview() {
        if ($_SERVER['REQUEST_METHOD'] !== "POST")
            return;

        if (!isset($_SESSION['userID'])) {
            echo json_encode(["success" => false, "message" => "You need to login to add reviews"]);
            exit();
        }

        $userID = $_SESSION['userID'];
        $barcode = $_POST['barcode'];
        $content = $_POST['content'];
        $rating = $_POST['rating'];

        echo json_encode($this->reviewService->addReview($userID, $barcode, $content, $rating));
        exit();
    }
}