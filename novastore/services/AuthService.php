<?php

require_once "models/User.php";
require_once "models/Cart.php";

class AuthService {
    private User $userModel;
    private Cart $cartModel;

    public function __construct(PDO $conn) {
        $this->userModel = new User($conn);
        $this->cartModel = new Cart($conn);
    }

    public function login(string $email, string $password): array {
        $user = $this->userModel->getUserByEmail($email);

        if (!$user || !password_verify($password, $user["password"])) 
            return ["success" => false, "message" => "Invalid Credentials."];

        $_SESSION["userID"] = $user["userID"];
        $_SESSION["firstName"] = $user["firstName"];
        $_SESSION["lastName"] = $user["lastName"];
        $_SESSION["role"] = $user["role"];

        if (!$this->cartModel->getCartID($user["userID"])) 
            $this->cartModel->createCart($user["userID"]);
        
        return ["success" => true, "redirect" => "index.php?action=index"];
    }

    public function register(string $firstName, string $lastName, string $email, string $password): array {

        if ($this->userModel->getUserByEmail($email)) 
            return ["success" => false, "message" => "Email Already Registered."];
        

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$this->userModel->createUser($firstName, $lastName, $email, $hashedPassword)) 
            return ["success" => false, "message" => "Unable to register user."];
        
        return ["success" => true, "redirect" => "index.php?action=loginPage"];
    }

    public function logout(): void {
        $_SESSION = [];

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }
}