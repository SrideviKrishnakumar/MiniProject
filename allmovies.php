<?php
require_once "database.php";
$limit = $_GET["limit"] - 1;
$truelimit = 2 * ($limit);
$query = "SELECT SUBSTRING(description, 1, 30)
 as descriptionCut, id, title, poster FROM movies limit $truelimit,2";
$result = mysqli_query($conn, $query);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
$object = json_encode($movies, JSON_PRETTY_PRINT);
echo $object;