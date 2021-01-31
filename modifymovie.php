<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn = mysqli_connect('localhost', 'root', '', 'miniproject');
    $query = "SELECT * , name FROM movies JOIN categories ON categories.id=movies.category_id where movies.id = $id";
    $result = mysqli_query($conn, $query);
    $db_record = mysqli_fetch_assoc($result);
    echo $db_record['title'];
    echo $db_record['releaseYear'];
}
if (isset($_POST['modify'])) {

    $title = $_POST['movietitle'];
    $release_year = $_POST['year'];
    $description = $_POST['description'];
    $posterpath = $_POST['poster'];
    $moviepath = $_POST['moviepath'];
    $category = $_POST['category'];
    echo $title;
    echo '<br>';
    echo $release_year;
    echo '<br>';
    echo $description;
    echo '<br>';
    echo $posterpath;
    echo '<br>';
    echo $moviepath;
    echo '<br>';
    echo $category;

    if ((!empty($title)) && (!empty($release_year)) && (!empty($description)) && (!empty($posterpath)) && (!empty($moviepath)) && (!empty($category))) {
        echo "inside";
        $conn = mysqli_connect('localhost', 'root', '', 'miniproject');

        $query = "UPDATE movies SET title = '$title',releaseYear = $release_year, description ='$description',
        poster = '$posterpath', category_id =(SELECT category_id FROM movies where movies.id= $id),
        moviepath = '$moviepath' where movies.id = $id";
        $update = mysqli_query($conn, $query);
    } else {
        echo "incomplete";
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
    <form action="" method='post'>
        <label for="">Title of the Movie</label>
        <input type="text" name='movietitle' value=<?= $db_record['title'] ?>>
        <br>
        <label>Release Year</label>
        <input type="text" name='year' value=<?= $db_record['releaseYear']  ?>>
        <br>
        <label>Description</label>
        <input type="textarea" name="description" value=<?= $db_record['description']  ?>>
        <br>
        <label for="">PosterPath</label>
        <input type="text" name='poster' value=<?= $db_record['poster']  ?>>
        <br>
        <label for="">Movie Path</label>
        <input type="text" name="moviepath" id="" value=<?= $db_record['moviePath']  ?>>
        <select name="category" id="catselect">
            <option name='cat' value=<?= $db_record['name']  ?> id='cat'><?= $db_record['name']  ?></option>
        </select>
        <input type="submit" name="modify" value="MODIFY THE MOVIES">
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