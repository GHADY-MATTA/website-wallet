<?php
require 'jwt_helper.php';

if (!isset($_COOKIE['token']) || !validate_jwt($_COOKIE['token'])) {
    header("Location: index.php");
    exit();
}

$decoded = validate_jwt($_COOKIE['token']);
$user_name = $decoded->data->user_name;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h2>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>

</html>