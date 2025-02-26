<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$mysqli = require __DIR__ . "/save-sql.php";

$sql = "SELECT username, email, phone, address FROM usersMail WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if ($user) {
    echo json_encode($user);
} else {
    echo json_encode(["error" => "User not found"]);
}
