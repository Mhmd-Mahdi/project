<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recipes.css">
    <title>Document</title>
    
</head>
<body>
<header>
        <div class="logo">
            <h1>Food Recipes</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="recipes.php" class="active1">Recipes</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        <div class="login">
            <a href="signin.php" class="btn sign-in">Sign In</a>
            <a href="login.php" class="btn log-in">Login</a>
        </div>    
        </nav>
    </header>
    <main>
        <h1>Welcome to our Recipe Collection</h1>
        <p>Discover delicious recipes that bring flavor and joy to your kitchen</p>
    </main>
    

   

<!-- Search Box -->
<div class="search-container">
<form method="POST">
            <input type="text" name="search" placeholder="Type food name...">
            <button type="submit">Search</button>
        </form>
</div>

<!-- Category Circles -->
<div class="categories">
    <div class="category active" onclick="filterCategory('all')">All</div>
    <div class="category" onclick="filterCategory('chicken')">Chicken</div>
    <div class="category" onclick="filterCategory('beef')">Beef</div>
    <div class="category" onclick="filterCategory('fish')">Fish</div>
    <div class="category" onclick="filterCategory('pork')">Pork</div>
    <div class="category" onclick="filterCategory('lamb')">Lamb</div>
    <div class="category" onclick="filterCategory('vegetarian')">Vegetarian</div>
    <div class="category" onclick="filterCategory('vegan')">Vegan</div>
    <div class="category" onclick="filterCategory('pasta')">Pasta</div>
    <div class="category" onclick="filterCategory('rice')">Rice</div>
    <div class="category" onclick="filterCategory('dessert')">Dessert</div>
</div>

<!-- Results -->
<!-- Results -->
<div id="food-list" class="food-container">
    <?php
    $foods = ["Crispy Chicken", "Fajitas", "Chicken Burger", "Grilled Chicken", "Chicken Curry", "Chicken Alfredo", "Chicken Wings", "Roast Chicken",
    "Beef Burger", "Steak", "Beef Tacos", "Meatballs", "Beef Stroganoff", "Beef Stew", "Roast Beef", "Beef Kebab",
    "Grilled Salmon", "Fish Tacos", "Fish & Chips", "Sushi", "Ceviche", "Fish Curry", "Smoked Salmon", "Baked Tilapia",
    "BBQ Ribs", "Pork Chops", "Bacon", "Pulled Pork", "Pork Dumplings", "Sausages", "Pork Roast", "Pork Schnitzel",
    "Lamb Chops", "Mutton Biryani", "Lamb Shawarma", "Lamb Stew", "Roast Lamb", "Moussaka", "Shepherd’s Pie", "Lamb Curry",
    "Veggie Burger", "Stuffed Peppers", "Paneer Tikka", "Caprese Salad", "Veggie Stir-Fry", "Mushroom Risotto", "Falafel", "Ratatouille",
    "Vegan Burger", "Tofu Scramble", "Lentil Soup", "Chickpea Curry", "Vegan Pasta", "Grilled Vegetables", "Vegan Tacos", "Smoothie Bowls",
    "Spaghetti Carbonara", "Lasagna", "Mac & Cheese", "Fettuccine Alfredo", "Penne Arrabbiata", "Ravioli", "Pesto Pasta", "Baked Ziti",
    "Fried Rice", "Paella", "Sushi Rice", "Risotto", "Biryani", "Jambalaya", "Rice Pudding", "Pilaf",
    "Chocolate Cake", "Ice Cream", "Tiramisu", "Cheesecake", "Brownies", "Apple Pie", "Donuts", "Crème Brûlée"
    ];  

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $search = trim($_POST['search']);
        
        // Check if search input is empty
        if (empty($search)) {
            echo "<script>alert('Please enter food type');</script>";
        } else {
            // Filter foods only if search term is not empty
            $filteredFoods = array_filter($foods, function ($food) use ($search) {
                return stripos($food, $search) !== false;
            });

            if (!empty($filteredFoods)) {
                foreach ($filteredFoods as $food) {
                    echo "<div class='food-item'>
                            <img src='recipe1.jpg' alt='" . htmlspecialchars($food) . "'>
                            <p>" . htmlspecialchars($food) . "</p>
                          </div>";
                }
            } else {
                echo "<script>alert('No result found for ".$_POST["search"]." .');</script>";
            }
        }
    } else {
        // Only show all foods on initial page load
        foreach ($foods as $food) {
            echo "<div class='food-item'>
                    <img src='recipe1.jpg' alt='" . htmlspecialchars($food) . "'>
                    <p>" . htmlspecialchars($food) . "</p>
                  </div>";
        }
    }
    ?>
</div>
    
</div>
<hr class="separator">

<!--  Food Grid -->
     <div class="food-grid">
<!-- Chicken -->
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Crispy Chicken">
                <p>Crispy Chicken</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe22.jpg" alt="Fajitas">
                <p>Fajitas</p>
            </a>
        </div>
        
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe22.jpg" alt=" Chicken Burger">
                <p>Chicken Burger</p>
            </a>
        </div>

        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe22.jpg" alt="Grilled Chicken">
                <p>Grilled Chicken</p>
            </a>
        </div>

        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe22.jpg" alt="Chicken Curry">
                <p>Chicken Curry</p>
            </a>
        </div>

        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe22.jpg" alt="Chicken Alfredo">
                <p>Chicken Alfredo</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe22.jpg" alt="Chicken Wings">
                <p>Chicken Wings</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe22.jpg" alt="Roast Chicken">
                <p>Roast Chicken</p>
            </a>
        </div>
   
<!-- Beef -->
     <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Beef Burger">
                <p>Beef Burger</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Steak">
                <p>Steak</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Beef Tacos">
                <p>Beef Tacos</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Meatballs">
                <p>Meatballs</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Beef Stroganoff">
                <p>Beef Stroganoff</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Beef Stew">
                <p>Beef Stew</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Roast Beef">
                <p>Roast Beef</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt=" Beef Kebab">
                <p> Beef Kebab</p>
            </a>
        </div>     
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Grilled Salmon">
                <p>Grilled Salmon</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Fish Tacos">
                <p>Fish Tacos</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Fish & Chips">
                <p>Fish & Chips</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Sushi">
                <p>Sushi</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Ceviche">
                <p>Ceviche</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Fish Curry">
                <p>Fish Curry</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Smoked Salmon">
                <p>Smoked Salmon</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="recipe1.jpg" alt="Baked Tilapia">
                <p>Baked Tilapia</p>
            </a>
        </div>

    <!--
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="BBQ Ribs">
        <p>BBQ Ribs</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Pork Chops">
        <p>Pork Chops</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Bacon">
        <p>Bacon</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Pulled Pork">
        <p>Pulled Pork</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Pork Dumplings">
        <p>Pork Dumplings</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Sausages">
        <p>Sausages</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Pork Roast">
        <p>Pork Roast</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Pork Schnitzel">
        <p>Pork Schnitzel</p>
        </a>
    </div>

    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Lamb Chops">
        <p>Lamb Chops</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Mutton Biryani">
        <p>Mutton Biryani</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Lamb Shawarma">
        <p>Lamb Shawarma</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Lamb Stew">
        <p>Lamb Stew</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Roast Lamb">
        <p>Roast Lamb</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Moussaka">
        <p>Moussaka</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Shepherd’s Pie">
        <p>Shepherd’s Pie</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Lamb Curry">
        <p>Lamb Curry</p>
        </a>
    </div>

    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Veggie Burger">
        <p>Veggie Burger</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Stuffed Peppers">
        <p>Stuffed Peppers</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Paneer Tikka">
        <p>Paneer Tikka</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Caprese Salad">
        <p>Caprese Salad</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Veggie Stir-Fry">
        <p>Veggie Stir-Fry</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Mushroom Risotto">
        <p>Mushroom Risotto</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Falafel">
        <p>Falafel</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Ratatouille">
        <p>Ratatouille</p>
        </a>
    </div>

    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Vegan Burger">
        <p>Vegan Burger</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Tofu Scramble">
        <p>Tofu Scramble</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Lentil Soup">
        <p>Lentil Soup</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Chickpea Curry">
        <p>Chickpea Curry</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Vegan Pasta">
        <p>Vegan Pasta</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Grilled Vegetables">
        <p>Grilled Vegetables</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Vegan Tacos">
        <p>Vegan Tacos</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Smoothie Bowls">
        <p>Smoothie Bowls</p>
        </a>
    </div>
 
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Spaghetti Carbonara">
        <p>Spaghetti Carbonara</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Lasagna">
        <p>Lasagna</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Mac & Cheese">
        <p>Mac & Cheese</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Fettuccine Alfredo">
        <p>Fettuccine Alfredo</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Penne Arrabbiata">
        <p>Penne Arrabbiata</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Ravioli">
        <p>Ravioli</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Pesto Pasta">
        <p>Pesto Pasta</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Baked Ziti">
        <p>Baked Ziti</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Fried Rice">
        <p>Fried Rice</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Paella">
        <p>Paella</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Sushi Rice">
        <p>Sushi Rice</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Risotto">
        <p>Risotto</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Biryani">
        <p>Biryani</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Jambalaya">
        <p>Jambalaya</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Rice Pudding">
        <p>Rice Pudding</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Pilaf">
        <p>Pilaf</p>
        </a>
    </div>
-->
<!-- Dessert -->
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Chocolate Cake">
        <p>Chocolate Cake</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Ice Cream">
        <p>Ice Cream</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Tiramisu">
        <p>Tiramisu</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Cheesecake">
        <p>Cheesecake</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Brownies">
        <p>Brownies</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Apple Pie">
        <p>Apple Pie</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Donuts">
        <p>Donuts</p>
        </a>
    </div>
    <div class="food-item">
    <a href="#modal" class="food-link">
        <img src="recipe1.jpg" alt="Crème Brûlée">
        <p>Crème Brûlée</p>
    </a>
    </div>

</div> 

</body>
</html>

