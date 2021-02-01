<?php

if (isset(($_POST['submit']))) {


    if (empty($_POST['title'])) {
        echo 'moviename is mandatory';
    }
    if (empty($_POST['year'])) {
        echo 'Enter releasae Year';
    }
    if (empty($_POST['description'])) {
        echo 'description about the movie please!!!';
    }
    echo $_POST['title'] . '<br>';
    echo $_POST['year'];
    echo $_POST['description'] . '<br>';
    echo $_POST['poster'] . '<br>';
    echo $_POST['moviepath'] . '<br>';
    echo $_POST['category'] . '<br>';


    if (!empty($_POST['title']) && !empty($_POST['year']) && (!empty($_POST['description'])) && (!empty($_POST['poster'])) && (!empty($_POST['moviepath'])) && (!empty($_POST['category']))) {
        echo 'hi';
        echo $_POST['title'] . '<br>';
        echo $_POST['year'];
        $movie_title = $_POST['title'];
        $movie_year = $_POST['year'];
        echo gettype($movie_year);
        $movie_description = $_POST['description'];
        $movie_poster = $_POST['poster'];
        $movie_path = $_POST['moviepath'];
        $category_name = $_POST['category'];


        $conn = mysqli_connect('localhost', 'root', '', 'miniproject', 3307);
        if ($conn)
            echo 'connection successfull';
        $check = "SELECT * FROM movies";
        $checkresult = mysqli_query($conn, $check);
        $check_dbresult = mysqli_fetch_all($checkresult, MYSQLI_ASSOC);
        $numrecords = mysqli_num_rows($checkresult);
        echo $numrecords;


        $query = "INSERT INTO movies(title,releaseYear,description,poster,category_id,moviepath) 
                VALUES ('$movie_title','$movie_year','$movie_description','$movie_poster',(SELECT id FROM categories where name='$category_name'),'$movie_path')";

        $result = mysqli_query($conn, $query);
        echo "MOVIE ADDED SUCCESSFULLY";

        //echo mysqli_num_rows($result);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ADD OR MODIFY MOVIE</h1>
    <br>
    <form action="" method="post">
        <label>Title</label>
        <input type="text" placeholder="" name='title'>
        <br>
        <label>Release Year</label>
        <input type="text" name='year'>
        <br>
        <label>Description</label>
        <input type="textarea" name="description">
        <br>
        <label for="">PosterPath</label>
        <input type="text" name='poster'>
        <br>
        <label for="">Movie Path</label>
        <input type="text" name="moviepath" id="" value="">
        <select name="category" id="catselect">
            <option name='cat' value="" id='cat'>CHOOSE THE CATEGORY</option>
        </select>

        <input type="submit" value='Append the movie' name='submit'>



    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script>
        // Wait for the dom to be loaded/ready before executing javascript
        $(function() {

            $('#catselect').ready(function(e) {
                //e.preventDefault();

                $.ajax({
                    url: 'fetchcat.php',
                    method: 'post',
                    dataType: 'json'
                }).done(function(db_records) {


                    console.log(db_records);
                    $.each(db_records, function(key, db_record) {

                        $('#catselect').append('<option>' + db_record.name + '</option>');

                    })

                }).fail(function(db_records) {
                    console.log('ajax error');
                })

            });

        });
    </script>
</body>

</html>