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
    ?>
</head>
<body>
    <div class="container">
        <h1>Welcome <?php echo $_SESSION['name'];?></h1>
        <div class="menu">
            <a href="signout.php">logout</a>
            <a href="view.php">view users</a>
            <a href="delete.php">delete</a>
            <a href="idtoupdate.php">update</a>
        </div>
    </div>
    
    
</body>
</html>