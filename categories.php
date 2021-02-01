<?php

require_once "nav.php";
if (isset($_SESSION["username"])) {
    echo "Hello " . $_SESSION["username"];
} else {
    echo "bad";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/categories.css">
</head>

<body>
    <header>
        <form action="" method="post">
            <select name="categories" id="cat">
                <option value="%">All Categories</option>
            </select>
            <input type="submit" id="ordercat" value="Search with specifications">
            <select name="sort" id="sort">
                <option value="ASC"> Order by Ascending</option>
                <option value="DESC">Order by Descending</option>
            </select>
        </form>
        <div id="ordered">

        </div>
        <footer>
            <?php
            require_once "database.php";
            $query = "SELECT count(id) as test FROM movies";
            $result = mysqli_query($conn, $query);
            $pageup = intval($_GET["page"] + 1);
            $pagedown = intval($_GET["page"]) - 1;
            $array = mysqli_fetch_assoc($result);

            if ($_GET["page"] == 1) {
                echo '<p id="limit" >' . $_GET["page"] . '</p>';
                echo '<a href="categories.php?page=' . $pageup  . '">NEXT</a>';
                echo "<br>";
            } else if ($_GET["page"] >= $array["test"] / 2) {
                echo '<a href="categories.php?page=' . $pagedown  . '">Previous</a>';
                echo '<p id="limit" >' . $_GET["page"] . '</p>';
                echo "<br>";
            } else {
                echo '<a href="categories.php?page=' .  $pagedown . '">Previous</a>';
                echo '<p id="limit" >' . $_GET["page"] . '</p>';
                echo '<a href="categories.php?page=' . $pageup . '">NEXT</a>';
            }
            ?>
        </footer>
    </header>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="scripts/ordercat.js"></script>
</body>

</html>
