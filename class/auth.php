<?php
// require_once '../config/config.php'; 

class Auth
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Register
    public function register($username, $email, $password)
    {
        // username or email exist?
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
        $stmt->execute(['username' => $username, 'email' => $email]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            echo "<div class='alert alert-danger'>Username or email already exists </div>";

            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // insert to DB 
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, 'client')");
        $stmt->execute(['username' => $username, 'email' => $email, 'password' => $hashedPassword]);

        // header("Location: ../pages/login.php");
    }

    // Login 
    public function login($email, $password)
    {

        $email = htmlspecialchars(trim($email), ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars(trim($password), ENT_QUOTES, 'UTF-8');

        //  if the email exis in db
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email AND status <> 'disactivated'");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();


        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header('Location: ../dashboard/admin/admin.php');
                exit();
            } elseif ($user['role'] == 'client') {
                header('Location: ../dashboard/client/client.php');
                exit();
            }
        }

        // return false;  //error in info
        else {
            echo "";
        }
    }


    public function switchActive($id)
    {
        $stmt = $this->pdo->prepare("UPDATE users SET status = CASE WHEN status = 'active' THEN 'disactivated' ELSE 'active' END WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
