<?php

require_once "services/AuthService.php";

class AuthController {
    private AuthService $authService;

    public function __construct(PDO $conn) {
        $this->authService = new AuthService($conn);
    }

    public function loginPage(): void {
        require_once "views/auth/login.php";
    }

    public function login(): void {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") 
            return;
        
        $email = trim($_POST["emailAddress"]);
        $password = trim($_POST["password"]);

        if (empty($email) || empty($password)) {
            echo json_encode(["success" => false, "message" => "All Fields are Required."]);
            exit;
        }

        echo json_encode($this->authService->login($email, $password));

        exit;
    }

    public function signupPage(): void {
        require_once "views/auth/register.php";
    }

    public function signup(): void {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") 
            return;
        
        $firstName = trim($_POST["firstName"]);
        $lastName = trim($_POST["lastName"]);
        $email = trim($_POST["emailAddress"]);
        $password = trim($_POST["password"]);

        if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
            echo json_encode(["success" => false, "message" => "All Fields are Required."]);
            exit;
        }

        echo json_encode($this->authService->register($firstName, $lastName, $email, $password));

        exit;
    }

    public function logout(): void {
        $this->authService->logout();
        header("Location: index.php");
        exit;
    }
}