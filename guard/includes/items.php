<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sm3101";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ItemID, DateTime, Location, Status FROM tblostitems";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    body{
    margin: 0;
    padding: 0;
box-sizing: border-box;

.container{
    width: 100%;
    height: 400px;
    overflow-y: scroll;

}

}


table{
    border-collapse: collapse;
    margin: 0 0 30px 0;
    width: 80%;
   
}

th,td{
    border: 2px solid rgb(212, 119, 119);
    padding: 8px;
    margin: 0;
}
th{
    background-color:rgb(247, 184, 184); 
}

.buttons{
    background-color:rgb(255, 200, 0);
    color:white;
    margin-right: 15px;
        width: 150px;
        height: 50px;
    font-size: 30px;
    border-radius: 40px;
    border: 0;
    font-weight: bolder;
    }   
    


.buttons:hover{
    background-color: aqua;
    transition: .2s;
}

.buttons:active {
    transform: translateY(10px);
  }
  .button-container{
    margin-bottom: 20px;
  }
</style>
</head>
<body>
  
<div class="container">
    <center>

    <table>
        <tr>
            <th>Item ID</th>
            <th>DateTime</th>
            <th>Location</th>
            <th>Status</th>
            <th>Contact Info</th>
        </tr>
        <tbody>
        <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ItemID"] . "</td>";
                echo "<td>" . $row["DateTime"] . "</td>";
                echo "<td>" . $row["Location"] . "</td>";
                echo "<td>" . $row["Status"] . "</td>";
                echo "<td></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found.</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <div class='button-container'>
        <button class="buttons">ADD</button>
        <button class="buttons">REMOVE</button>
        <button class="buttons">UPDATE</button>
    </div>
    </center>
    </div>
</body>
</html>