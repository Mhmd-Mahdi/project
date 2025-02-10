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
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $search = strtolower(trim($_POST['search']));

        $filteredFoods = array_filter($foods, function ($food) use ($search) {
            return stripos($food, $search) === 0; // Matches only food names starting with input
        });

        if (!empty($filteredFoods)) {
            foreach ($filteredFoods as $food) {
                echo "<div class='food-item'>
                        <img src='recipe1.jpg' alt='" . htmlspecialchars($food) . "'>
                        <p>" . htmlspecialchars($food) . "</p>
                      </div>";
            }
        } else {
            echo "<p>No results found</p>";
        }
    }



?> 





if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search = strtolower(trim($_POST['search']));
    // Clear the existing food list
// Clear the existing food list
echo "<script>document.getElementById('food-list').innerHTML = '';</script>";

// Filter matching foods
$filteredFoods = array_filter($foods, function ($food) use ($search) {
return stripos($food, $search) !== false; // Matches input anywhere in the name

});

// If there are results, display them
if (!empty($filteredFoods)) {
 foreach ($filteredFoods as $food) {
     echo "<div class='food-item'>
             <img src='recipe1.jpg' alt='" . htmlspecialchars($food) . "'>
             <p>" . htmlspecialchars($food) . "</p>
           </div>";
 }
} else {
 echo "<p>No results found</p>";
}
}
?>