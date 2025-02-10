<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Recipe Website</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>Food Recipes</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.php"  class="active">Home</a></li>
                <li><a href="recipes.php">Recipes</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        <h3>WELCOME <?php  echo $_SESSION['user_full_name'] ; ?></h3>
        </nav>
        
    </header>


    <main>
        <section class="hero">
            <h2>Welcome to <br> Delicious Recipes</h2>
            <p>At Delicious Recipes, we believe cooking is an art that brings people together.<br>
                 Discover easy-to-follow recipes, step-by-step instructions, and tips to help you<br>
                  create mouthwatering meals whether you're a beginner or
                   a seaned chef.</p>
            <a href="recipes.php" class="btn">Explore Recipes</a>
        </section>
    </main>
    <img src="plate1.jpg" alt="Rotating Circle" class="circular-image">
</body>
</html>