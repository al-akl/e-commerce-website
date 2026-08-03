<?php

class User {
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    // Admin

    public function promoteToAdmin(string $firstName, string $lastName, string $email): bool {
        try {
            $stmt = $this->conn->prepare("UPDATE users 
                SET role = 'ADMINISTRATOR' 
                WHERE firstName = :firstName AND lastName = :lastName AND email = :emailAddress");

            $stmt->bindParam(":firstName", $firstName);
            $stmt->bindParam(":lastName", $lastName);
            $stmt->bindParam("emailAddress", $email);

            return $stmt->execute();

        } catch(PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // User (Admin - Customer)

    public function createUser(string $firstName, string $lastName, string $email, string $password): bool {
        try {
            $stmt = $this->conn->prepare("INSERT INTO 
                users(firstName, lastName, email, password) 
                VALUES(:firstName, :lastName, :email, :password)");

            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            return $stmt->execute();

        } catch(PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    } 

    public function getBalance(int $userID): float {
        try {
            $stmt = $this->conn->prepare("SELECT balance FROM users 
                WHERE userID = :userID");

            $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchColumn();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function updateBalance(int $userID, float $newBalance): bool {
        try {
            $stmt = $this->conn->prepare("UPDATE users 
                SET balance = :newBalance WHERE userID = :userID");

            $stmt->bindParam(":newBalance", $newBalance);
            $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);

            return $stmt->execute();

        } catch(PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getUserByEmail(string $email) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");

            $stmt->bindParam(":email", $email);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getUserByID(int $userID) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE userID = :userID");
            $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function checkUser(string $firstName, string $lastName, string $email): bool {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users 
                WHERE firstName = :firstName AND lastName = :lastName AND email = :email");

            $stmt->bindParam(":firstName", $firstName);
            $stmt->bindParam(":lastName", $lastName);
            $stmt->bindParam(":email", $email);

            $stmt->execute();

            if ($stmt->fetch())
                return true;

            return false;

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

?>