<?php
require_once "database.php";
$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
$object = json_encode($movies, JSON_PRETTY_PRINT);
echo $object;