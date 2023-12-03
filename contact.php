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
$comment = $_POST['comment'];

// Insert data into the database
$sql = "INSERT INTO comments (name, email, comment) VALUES ('$name', '$email', '$comment')";

if ($conn->query($sql) === TRUE) {
    // Registration successful
    echo '<script>';
    echo 'alert("Your comment recorded successfully");';
    echo 'window.location.href = "contact.html";';
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>