<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="master.css">
    <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        if(isset($_POST['signin'])){
            $email= $_POST['email'];
            $password= $_POST['password'];
                $sql = "SELECT * FROM person WHERE email='$email' and password='$password' and priv=0";
	    	    $result = $conn->query($sql);
                $sql2 = "SELECT * FROM person WHERE email='$email' and password='$password' and priv=1";
	    	    $result2 = $conn->query($sql2);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    $_SESSION['ID'] = $row['ID'];
                    $_SESSION['name'] = $row['name'];
                    header("Location:user.php");
                }else if($result2->num_rows > 0){
                    $row = $result2->fetch_assoc();
                    $_SESSION['ID'] = $row['ID'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    header("Location:admin.php");
                }else echo "<script>alert('email or password not match');</script>";
        }
    
    ?>
</head>
<body>
    <form method="post" class="form">
    E-mail: <input type="email" name="email" require>
    <br><br>
    password: <input type="password" name="password" require>
    <br><br>
    <input type="submit" name="signin" value="signin" class="button">
    <p>you don't have an account? <a href="signup.php">sign up</a></p>
    </form>
</body>
</html>