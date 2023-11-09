<?php
include 'db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    // Perform a query to check the login credentials
    $query = "SELECT * FROM tbusers WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $Username, $Password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        header("Location: guard_home.php");
        exit();
    } else {
        echo '<script>alert("Invalid username or password. Please try again.");</script>';
        echo '<script>window.location = "login.php";</script>';
    }
}

$conn->close();
?>