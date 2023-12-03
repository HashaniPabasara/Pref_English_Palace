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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reset'])) {
    // Retrieve form data
    $email = $conn->real_escape_string($_POST['email']);
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate email and passwords (add more validation if needed)
    if ($newPassword !== $confirmPassword) {
        echo "Passwords do not match!";
    } else {
        // Update the user's password in the database using prepared statement
        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $updateStmt = $conn->prepare("UPDATE contacts SET password = ? WHERE email = ?");
        $updateStmt->bind_param("ss", $hashedNewPassword, $email);

        if ($updateStmt->execute()) {
            echo "Password reset successful";
        } else {
            echo "Error resetting password: " . $updateStmt->error;
        }

        $updateStmt->close();
    }
}

// Close database connection
$conn->close();
?>
