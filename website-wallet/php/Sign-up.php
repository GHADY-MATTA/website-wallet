<?php 
// ------------------------ validation for the password, email, username, phone, and address 

// Validating the name
if(empty($_POST["username"])){
    die("Name is required");
}

// Validating email
if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}

// Password validation
if(strlen($_POST["password"]) < 8){
    die("Password must be at least 8 characters");
}

if(!preg_match("@[A-Z]@", $_POST["password"])){
    die("Password must contain at least one uppercase letter");
}

if(!preg_match("@[0-9]@", $_POST["password"])){
    die("Password must contain at least one number");
}

if(!preg_match("@[^\w]@", $_POST["password"])){
    die("Password must contain at least one special character");
}

// Validating if password_confirmation is equal to password
if($_POST["password"] !== $_POST["password_confirmation"]){
    die("Passwords do not match");
}

// Validating phone (optional, if provided)
if (isset($_POST["phone"]) && !preg_match("/^\+?[1-9]\d{7,14}$/", $_POST["phone"])) {
    die("Invalid phone number");
}


// Validating address (optional, if provided)
if (isset($_POST["address"]) && empty(trim($_POST["address"]))) {
    die("Address is required");
}

// ------------------------ password hashing
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Include the database connection script
$mysqli = require __DIR__."/save-sql.php";

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Database connection failed: " . $mysqli->connect_error);
}

// Determine the newsletter preference
$newsletter_preference = isset($_POST["no-updates"]) ? 'no-news' : 'send-news';

// Prepare the SQL query with the news_letter, phone, and address columns
$sql = "INSERT INTO usersMail (username, email, password_hash, news_letter, phone, address) 
        VALUES(?,?,?,?,?,?)";
$stmt = $mysqli->prepare($sql);

// Check for errors in preparing the query
if(!$stmt){
    die("Query preparation failed: " . $mysqli->error);
}

// Bind the form data to the prepared statement, including the newsletter preference, phone, and address
$stmt->bind_param("ssssss", $_POST["username"], $_POST["email"], $password, $newsletter_preference, $_POST["phone"], $_POST["address"]);

// Execute the query
if($stmt->execute()){
    echo "Sign-up successful! <a href='/website-wallet/front/login.html'>Log in</a>";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>
