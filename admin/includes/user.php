<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sm3101";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT UserID, Username, Usertype, Name, Status, ContactInfo FROM tbusers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user-style.css">
    <title>User Table</title>
</head>
<body>
<div class="container">
    <input type="text" class="SEARCH" name="SEARCH" id="SEARCH" placeholder="SEARCH USER">
    <center>
        <table>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>User Type</th>
                <th>Name</th>
                <th>Status</th>
                <th>Contact Info</th>
            </tr>
            <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["UserID"] . "</td>";
                    echo "<td>" . $row["Username"] . "</td>";
                    echo "<td>" . $row["Usertype"] . "</td>";
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["Status"] . "</td>";
                    echo "<td>" . $row["ContactInfo"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found.</td></tr>";
            }
            ?>
            </tbody>
        </table>
        <div class='button-container'>
            <form action="admin-user.php" method="POST">
                <!-- Input fields for adding data -->
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="usertype" placeholder="User Type">
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="status" placeholder="Status">
                <input type="text" name="contact_info" placeholder="Contact Info">
                <!-- Add more input fields for other data required for ADD operation -->
                <button class="buttons" name="action" value="add">ADD</button>
            </form>

            <form action="admin-user.php" method="POST">
                <!-- Input field for removing data -->
                <input type="text" name="user_id_to_remove" placeholder="User ID to Remove">
                <button class="buttons" name="action" value="remove">REMOVE</button>
            </form>

            <form action="admin-user.php" method="POST">
                <!-- Input fields for updating data -->
                <input type="text" name="user_id_to_update" placeholder="User ID to Update">
                <input type="text" name="new_username" placeholder="New Username">
                <input type="text" name="new_usertype" placeholder="New User Type">
                <input type="text" name="new_name" placeholder="New Name">
                <input type="text" name="new_status" placeholder="New Status">
                <input type="text" name="new_contact_info" placeholder="New Contact Info">
                <!-- Add more input fields for other data required for UPDATE operation -->
                <button class="buttons" name="action" value="update">UPDATE</button>
            </form>
        </div>
    </center>
    </div>
</body>
</html>
