<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="master.css">
    
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_POST['signup'])){
            $name= $_POST['name'];
            $email= $_POST['email'];
            $password= $_POST['password'];
            $cpassword= $_POST['cpassword'];
            $fileDestination;
            $sql = "SELECT * FROM person WHERE email='$email'";
            $result = $conn->query($sql);
            if(!$result->num_rows > 0){
                if($password==$cpassword){
                    //handle image
                    $fileName = $_FILES['file']['name'];
                    $fileTmpName = $_FILES['file']['tmp_name'];
                    $fileDestination='image/'.uniqid().$fileName;
                        move_uploaded_file($fileTmpName, $fileDestination);
                    //end handle image
                    $sql = "INSERT INTO person(name, email, password, imgD) VALUES ('$name', '$email' ,'$password', '$fileDestination')";
                    if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('New record created successfully');</script>";
                    } else {
                    echo "<script>alert('No New record created');</script>";
                    }
                }else echo "<script>alert('two passwords not matched');</script>"; 
            }else echo "<script>alert('email alredy exist');</script>";
            
        }
    ?>
    
</head>
<body>

    <form method="post" enctype="multipart/form-data">
        Name: <input type="text" name="name" >
        <br><br>
        E-mail: <input type="email" name="email" >
        <br><br>
        password: <input type="password" name="password" >
        <br><br>
        confirm password: <input type="password" name="cpassword" >
        <br><br>
        <input type="file" name="file">
        <br><br>
        <input type="submit" name="signup" value="signup" class="button">
        <p>you have an account? <a href="signin.php">sign in</a></p>
    </form>
    
</body>
</html>