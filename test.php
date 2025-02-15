<?php
session_start();

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user']);

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate login (this is a simple example, use proper validation and hashing in production)
    if ($username === 'user' && $password === 'password') {
        $_SESSION['user'] = $username; // Store user in session
        $isLoggedIn = true;
    } else {
        echo "Invalid username or password.";
    }
}

// Handle signup form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Process signup (e.g., save to database)
    // For now, just log the user in
    $_SESSION['user'] = $username;
    $isLoggedIn = true;
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php"); // Redirect to refresh the page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
</head>
<body>
    <h1>Welcome to the Index Page</h1>

    <?php if ($isLoggedIn): ?>
        <!-- Display user info and logout button -->
        <p>Welcome, <?php echo $_SESSION['user']; ?>!</p>
        <a href="index.php?logout=1">Logout</a>
    <?php else: ?>
        <!-- Display login and signup forms -->
        <h2>Login</h2>
        <form method="POST" action="index.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>

        <h2>Sign Up</h2>
        <form method="POST" action="index.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="signup">Sign Up</button>
        </form>
    <?php endif; ?>
</body>
</html>