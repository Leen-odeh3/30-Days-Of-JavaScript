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
        $id=$_SESSION['idtoupdate'];
        $sql = "SELECT * FROM person where id='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $name=$row['name'];
        $email=$row['email'];
        $pass=$row['password'];

        if(isset($_POST['update'])){
            $nameafter=$_POST['name'];
            $emailafter=$_POST['email'];
            $passafter=$_POST['password'];
            $sql = "SELECT * FROM person WHERE email='$emailafter' and id!='$id'";
            $result = $conn->query($sql);
            if(!$result->num_rows > 0){
                $sql = "UPDATE person SET name = '$nameafter', email= '$emailafter',password='$passafter' WHERE ID = '$id';";
                if($conn->query($sql)){
                    echo "<script>alert('data is updated');</script>";
                }else echo "<script>alert('there is an error');</script>";
            }else echo "<script>alert('this email is exist');</script>";
        }
    ?>
</head>
<body>
<form method="post">
        Name: <input type="text" name="name" value="<?php echo $name?>">
        <br>
        E-mail: <input type="email" name="email" value="<?php echo $email?>">
        <br>
        password: <input type="text" name="password" value="<?php echo $pass?>">
        <br>
        <input class="button" type="submit" name="update" value="update">
        <a class="a" href="admin.php">back</a>
    </form>
    
</body>
</html>