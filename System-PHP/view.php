<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="master.css">
    
    <?php
    session_start();
    
    if(!isset($_SESSION["name"])){
        header("Location: signin.php");
    }
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
    ?>
</head>
<body>
    <div class="container1">
    <table>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>password</td>
            <td>photo</td>
        </tr>
        <?php

        $sql = "SELECT * FROM person";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            $id=$row['ID'];
            $name=$row['name'];
            $email=$row['email'];
            $password=$row['password'];
            $img=$row['imgD'];
            echo "<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$password</td>
                    <td><img src='$img' style='width:30px; height:30px; object-fit:cover;'></td>
                </tr>";
            }
        }
        ?>
        
    </table>
    <a href="admin.php">back</a>
    </div>
    
        
</body>
</html>