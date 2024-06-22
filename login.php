<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['email'];
    $Password = $_POST['password'];

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
        // echo "Hashed Password from Database: " . $row['Password'] . "<br>";
        // echo "Entered Password: " . $Password . "<br>";

        if ($Password==$row['Password'])
        {
            $_SESSION['Email'] = $Email;
            header("Location: sr.html");
            exit();
        } else {
            echo "Invalid Password";
        }
    } else {
        echo "Invalid Email";
    }

    $stmt->close();
    $conn->close();
}
?>
