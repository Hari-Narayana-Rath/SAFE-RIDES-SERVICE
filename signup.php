<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password= $_POST['password'];

$conn = new mysqli('localhost', 'root', '', 'molika');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO signup (name, email, password) VALUES (?, ?, ?)");
    
    $stmt->bind_param("sss", $name, $email, $password);

    $stmt->execute();
    echo "Registration Successful...";
    header("Location: sr.html");

    $stmt->close();
    $conn->close();
}
?>
