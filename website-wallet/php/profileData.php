<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

// Include database connection
$mysqli = require __DIR__ . "/save-sql.php";

// Fetch user data from the database
$sql = "SELECT * FROM usersMail WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// If the user doesn't exist, return an error
if (!$user) {
    echo json_encode(["error" => "User not found"]);
    exit;
}

// Return the user data as JSON
echo json_encode([
    "username" => $user["username"],
    "email" => $user["email"],
    "phone" => $user["phone"] ?? "",  // Use an empty string if phone is NULL
    "address" => $user["address"] ?? ""  // Use an empty string if address is NULL
]);
