<?php

require_once "models/User.php";

class UserService {
    private User $userModel;

    public function __construct(PDO $conn) {
        $this->userModel = new User($conn);
    }

    public function promoteUser(string $firstName, string $lastName, string $emailAddress): array {

        $firstName = trim($firstName);
        $lastName = trim($lastName);
        $emailAddress = trim($emailAddress);

        if (empty($firstName) || empty($lastName) || empty($emailAddress)) 
            return ["success" => false, "message" => "All fields are required."];
        
        if (!$this->userModel->checkUser($firstName, $lastName, $emailAddress)) 
            return ["success" => false, "message" => "User not found."];
        
        if (!$this->userModel->promoteToAdmin($firstName, $lastName, $emailAddress)) 
            return ["success" => false, "message" => "Failed to promote user."];
        
        return ["success" => true, "message" => "User promoted to administrator successfully."];
    }

    public function userExists(string $firstName, string $lastName, string $emailAddress): bool {
        return $this->userModel->checkUser(trim($firstName), trim($lastName), trim($emailAddress));
    }

    public function getUserByEmail(string $email): array {
        return $this->userModel->getUserByEmail(trim($email));
    }

    public function getBalance(int $userID): float {
        return $this->userModel->getBalance($userID);
    }

    public function updateBalance(int $userID, float $balance): bool {
        return $this->userModel->updateBalance($userID, $balance);
    }
}