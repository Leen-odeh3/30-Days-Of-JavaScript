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

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $sql = "SELECT * FROM person WHERE ID='$id'";
	    $result = $conn->query($sql);
        if($result->num_rows > 0){
            $_SESSION['idtoupdate']=$id;
            header("location: update.php");
        }else echo "<script>alert('no user with this id');</script>";
    }
    ?>
</head>
<body>
    <form action="" method="post">
        inter an id<input type="number" name="id" require>
        <input class="button" type="submit" name="submit" value="update">
        <a class="a" href="admin.php">back</a>
    </form>
    
</body>
</html>