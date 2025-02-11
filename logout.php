<?php
    session_start();
    $db_server="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="users";
    $conn="";
    try{
        $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    }catch(mysqli_sql_exception){
        die("Can't Connect !.");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input type="submit" name="logout" value="logout">
    </form>
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        $sql = "DELETE * from user_info where usename= ?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("s",$_SESSION["username"]);
        if($stmt->execute()){
            
        }
    }
?>