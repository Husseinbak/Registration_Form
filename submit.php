<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="submit.css">
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_details";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO user_details (name, email, password, phone, language, zipcode, about) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $email, $password, $phone, $language, $zipcode, $about);

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$language = $_POST['language'];
$zipcode = $_POST['zipcode'];
$about = $_POST['about'];

// Execute the statement
if ($stmt->execute()) {
    echo "<h1>Success</h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

</html>
