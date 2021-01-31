<?php

$id = $_GET["id"];
if ($_GET["id"] > 0) {
    require_once "database.php";
    $query = "SELECT * FROM categories where id= $id";
    $result = mysqli_query($conn, $query);
    $cat = mysqli_fetch_assoc($result);
    echo '<input type="text" class="post" name="cattext" value="' . $cat["name"] . '" id="' . $cat["id"] . '">';
    echo '<input type="submit" id="add" name="modify" value="Modify Category">';
} else {
    echo '<input type="text" class="post" name="cattext" id="catText">';
    echo '<input type="submit" id="add" name="add" value="Add Category">';
}