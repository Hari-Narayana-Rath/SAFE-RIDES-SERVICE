<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['Email'])) {
    echo "User is not logged in.";
    exit();
}

// Fetch user profile details from the database based on the logged-in user's email
$Email = $_SESSION['Email'];

$conn = new mysqli('localhost', 'root', '', 'molika');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM signup WHERE Email = ?");
$stmt->bind_param("s", $Email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Return JSON response with profile details
    echo json_encode($row);
} else {
    echo "User not found.";
}

$stmt->close();
$conn->close();
?>
