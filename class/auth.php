<?php
// auth.php
require_once '../config/config.php'; 

class Auth {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // register 
    public function register($username, $email, $password) {
        // username or email exist?
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
        $stmt->execute(['username' => $username, 'email' => $email]);
        $existingUser = $stmt->fetch();
    
        if ($existingUser) {
            return 'username or email deja  exist failed';
        }
    
        // hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Insert to db 
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, 'client')");
        $stmt->execute(['username' => $username, 'email' => $email, 'password' => $hashedPassword]);

        header("location:../pages/login.php");
    
        // return 'good';
    }
    

    // Login user
    public function login($email, $password) {
        //  if the email exists in the database
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
    
        // if the user exists and the password is correct
        if ($user && password_verify($password, $user['password'])) {
            
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
    
            // Redirect based on the user's role
            if ($user['role'] == 'admin') {
                return 'admin';  // push  to the admin dashboard
            } else {
                return 'client'; // push to the client dashboard
            }
        }
        
        return false;  // error sur credentiels
    }
    

    // Check if the user is logged in
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    // Get user role
    public function getRole() {
        return isset($_SESSION['role']) ? $_SESSION['role'] : null;
    }

    // Logout user
    public function logout() {
        session_unset();
        session_destroy();
    }
}
?>
