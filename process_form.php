<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_form_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert data into the database
$sql = "INSERT INTO contacts (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    // Registration successful
    echo '<script>';
    echo 'alert("You Registered successfully");';
    echo 'window.location.href = "LoginForm.html";'; // Redirect to login page
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>