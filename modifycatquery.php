<?php
require_once "database.php";
/*$id = $_GET["search"];
$query = "SELECT name FROM categories where id= $id";
$result = mysqli_query($conn, $query);
$movies = mysqli_fetch_assoc($result);
echo $movies;*/
$id = $_POST["id"];
$name = $_POST["name"];
if ($_POST["id"] > 0) {
    $query = 'UPDATE categories SET name ="' . $name . '" WHERE id =' . $id;
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<p>Succsessfully modified</p>';
    } else {
        echo '<p>Something went wrong while modifying</p>';
    }
} else {
    $query = 'INSERT INTO categories(name) VALUES ("' . $name . '")';
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<p>Succsessfully added</p>';
    } else {
        echo '<p>Something went wrong with adding</p>';
    }
}