<?php 
    session_start();
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "users"; 
    $conn = "";
     
    try {
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    } catch (mysqli_sql_exception $e) {
        die("Can't Connect!.");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="log-in" align="center">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="login_username" placeholder="USERNAME" required><br>
            <input type="password" name="login_password" placeholder="PASSWORD" required><br>
            <!-- <input type="checkbox" name="remember">Remember Me<br> -->
            <input type="submit" name="login_submit" value="Login">
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["login_username"]) && !empty($_POST["login_password"])) {
        $username = $_POST["login_username"];
        $user_password = $_POST["login_password"];
        $query = "SELECT username, user_password FROM user_info WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($db_username, $hashed_password);
            $stmt->fetch();
            if (password_verify($user_password, $hashed_password)) {
                $_SESSION["in"]=true;
                header("location:home.php");
                exit();
            } else {
                echo "<script>alert('Incorrect password. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Username not found. Please register.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in the username and password.');</script>";
    }
}
?>
