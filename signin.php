<?php 
session_start();

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "users";
$conn = null;

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    echo "Can't Connect !"; 
}
?>                                 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="signin.css">
</head>
<body>

    <nav>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="text" id="first_name" name="first_name" placeholder="First Name" required title="Please enter your first name">
        <input type="text" name="last_name" id="last_name" placeholder="Last Name" required title="Please enter your last name"><br>
        <label for="email">Email</label><br>
        <input type="email" name="useremail" id="email" placeholder="example@gmail.com" required title="Pleas enter your email"><br>
        <label for="user_name">Username</label><br>
        <input type="text" name="username" id="user_name" placeholder="Username" required title="Please Enter Username"><br> 
        <label for="password">Password</label><br>
        <input type="password" name="userpassword" id="password" placeholder="Password" required title="Please enter your password"><br>
        <input type="submit" name="submit" value="SIGNIN">
    </form>
    </nav>
    <div class="form-header">
        <h2>🍴 Join Our Food Community</h2>
        <h3>Start sharing your favorite recipes today ! </p>
    </div>
    <div class="login-link">
        <p>Already have an account? <a href="login.php">LOGIN here.</a></p>
    </div>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs using trim()function to delete the extra space
    $first_name = trim($_POST['first_name']);
    $first_name = ucwords($first_name);
    $last_name = trim($_POST['last_name']);
    $last_name = ucfirst($last_name);
    $user_full_name=$first_name." ".$last_name;
    $_SESSION["user_full_name"]= $user_full_name;
    $email = filter_var(trim($_POST['useremail']), FILTER_SANITIZE_EMAIL);
    $user_input = trim($_POST['username']);
    $password = trim($_POST['userpassword']);

    // Validate username
    if (!(strlen($user_input) > 8) && preg_match('/[^a-zA-Z0-9]/', $user_input)) {
        echo "<script>alert('Username must be at least 8 characters and contain only letters and numbers.');</script>";
        exit;
    }

    // Check if username exists
    $sql = "SELECT username FROM user_info WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_input);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Username already taken.');</script>";
        $stmt->close();
        exit;
    }
    $stmt->close();

    //Hashing the user password in the data base
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    //Insert new user with prepared statement
    $sql = "INSERT INTO user_info (username, user_password,email) 
            VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sss",$user_input, $hash_password, $email);
    
    if ($stmt->execute()) {
        $_SESSION["in"]=true;
        $_SESSION["username"]= $user_input;
        header("location:home.php");
        exit();
    } else {
        echo "<script>alert('Error: " . addslashes($stmt->error) . "');</script>";
    }
    
    $stmt->close();
    $conn->close();
}
?>