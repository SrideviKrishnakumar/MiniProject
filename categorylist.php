<?php
$conn = mysqli_connect('localhost', 'root', '', 'miniproject', 3307);
$query = "SELECT name, COUNT(*) FROM movies JOIN categories WHERE movies.category_id=categories.id GROUP BY CATEGORIES.name ";
$results = mysqli_query($conn, $query);
echo '<br>';
while ($db_record = mysqli_fetch_assoc($results)) {

    //echo '<p>';
    echo   '<a href="">' . $db_record['name']  . '(' . $db_record['COUNT(*)'] . ')</a>';
    //echo '</p>';
}
echo '<br>';