<?php
$servername = "localhost"; // Replace with your actual database server
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "db_sm3101"; // Replace with your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST["item_name"];
    $item_description = $_POST["item_description"];
    $date_time = $_POST["date_time"];
    $location = $_POST["location"];
    $category = $_POST["category"];
    $reported_by = $_POST["reported_by"];
    
    // Check if the "image" key exists and is not null
    if (isset($_FILES["image"]) && $_FILES["image"]["name"]) {
        $image = $_FILES["image"]["name"];
        
        // Move the uploaded image to the "uploads" folder (make sure the folder exists)
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $image);
    } else {
        $image = null; // No image selected
    }

    $sql = "INSERT INTO tbreports (ReportName, ReportDescription, DateTime, Location, Category, ReportedBy, Image)
            VALUES ('$item_name', '$item_description', '$date_time', '$location', '$category', '$reported_by', '$image')";

    if ($conn->query($sql) === true) {
        echo "Report successfully inserted into the database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
