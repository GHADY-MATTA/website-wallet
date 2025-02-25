<?php
session_start(); // Start the session at the beginning

$is_valid = true;

// Process the login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = require __DIR__ . "/save-sql.php";

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM usersMail WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            echo "Login success! <a href='/website-wallet/front/profile.html'>go to profile page</a>";
            
            exit;
        }
    }
    // If login fails, redirect back to login page with error message
    header("Location: login.html?error=invalid");
    exit;
}
?>
