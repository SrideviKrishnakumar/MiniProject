<?php
require_once "database.php";
$cat = trim($_GET["cat"]);
$sort = trim($_GET["sort"]);
$limit = $_GET["limit"] - 1;
$truelimit = 2 * ($limit);
$query = "SELECT SUBSTRING(description, 1, 30)
 as descriptionCut, movies.id, title, poster FROM
  movies inner Join categories on categories.id= movies.category_id
   where categories.id like '$cat' ORDER by title $sort limit $truelimit,2";
$result = mysqli_query($conn, $query);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
$object = json_encode($movies, JSON_PRETTY_PRINT);
echo $object;