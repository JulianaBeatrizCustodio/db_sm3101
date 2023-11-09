<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sm3101";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'add') {
        // Handle the ADD action
        // Retrieve data from the form using $_POST and insert it into the database.
        $username = $_POST['username'];
        $usertype = $_POST['usertype'];
        $name = $_POST['name'];
        $status = $_POST['status'];
        $contact_info = $_POST['contact_info'];

        // Create and execute an SQL INSERT query to add a new record
        $sql = "INSERT INTO tbusers (Username, Usertype, Name, Status, ContactInfo) VALUES ('$username', '$usertype', '$name', '$status', '$contact_info')";
        
        if ($conn->query($sql) === TRUE) {
            // Insertion successful
            echo "Record added successfully.";
        } else {
            // Error in insertion
            echo "Error: " . $conn->error;
        }
    } elseif ($_POST['action'] === 'remove') {
        // Handle the REMOVE action
        // Retrieve data from the form using $_POST and delete the corresponding record in the database.
        $user_id_to_remove = $_POST['user_id_to_remove'];
        
        // Create and execute an SQL DELETE query to remove the record
        $sql = "DELETE FROM tbusers WHERE UserID = $user_id_to_remove";
        
        if ($conn->query($sql) === TRUE) {
            // Deletion successful
            echo "Record removed successfully.";
        } else {
            // Error in deletion
            echo "Error: " . $conn->error;
        }
    } elseif ($_POST['action'] === 'update') {
        // Handle the UPDATE action
        // Retrieve data from the form using $_POST and update the corresponding record in the database.
        $user_id_to_update = $_POST['user_id_to_update'];
        $new_username = $_POST['new_username'];
        $new_usertype = $_POST['new_usertype'];
        $new_name = $_POST['new_name'];
        $new_status = $_POST['new_status'];
        $new_contact_info = $_POST['new_contact_info'];

        // Create and execute an SQL UPDATE query to update the record
        $sql = "UPDATE tbusers SET Username = '$new_username', Usertype = '$new_usertype', Name = '$new_name', Status = '$new_status', ContactInfo = '$new_contact_info' WHERE UserID = $user_id_to_update";
        
        if ($conn->query($sql) === TRUE) {
            // Update successful
            echo "Record updated successfully.";
        } else {
            // Error in update
            echo "Error: " . $conn->error;
        }
    }
}

// Redirect back to the user.php page or wherever you want
header("Location: user.php");
?>
