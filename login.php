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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    // Login attempt
    $loginEmail = $conn->real_escape_string($_POST['loginEmail']);
    $loginPassword = $conn->real_escape_string($_POST['loginPassword']);

    // Check user credentials for login using prepared statement
    $stmt = $conn->prepare("SELECT * FROM contacts WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $loginEmail, $loginPassword);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        // Login successful
        header("Location:resouce.html");
        exit();
    } else {
        // Invalid email or password, show popup message
        echo '<script>';
        echo 'alert("Invalid email or password");';
        echo '</script>';
    }
}

// Close database connection
$conn->close();
?>