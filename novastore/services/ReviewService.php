<?php

require_once "models/Review.php";

class ReviewService {

    private Review $reviewModel;

    public function __construct(PDO $conn) {
        $this->reviewModel = new Review($conn);
    }

    public function addReview(int $userID, string $barcode, string $content, int $rating) {
        if ($this->reviewModel->addReview($userID, $barcode, $content, $rating)) 
            return ["success" => true, "message" => "Review Added"];
        else
            return ["success" => false, "message" => "Could not Add Review"];
    }

}