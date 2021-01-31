<?php
$conn = mysqli_connect('localhost', 'root', '', 'miniproject', 3307);
//if ($conn)
//echo "connection good";
$query = "SELECT name FROM categories";
$result = mysqli_query($conn, $query);

$db_record = mysqli_fetch_all($result, MYSQLI_ASSOC); // two parameters important
//echo $db_record;

echo json_encode($db_record, JSON_PRETTY_PRINT);