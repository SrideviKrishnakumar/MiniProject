$(function () {
            
    $('#ordercat').click(function (e) {
        e.preventDefault();
        console.log();
        $.ajax({
            url: 'ordercat.php',
            method: 'get',
            data:{
                cat: $("#cat").val(),
                sort:$("#sort").val(),
                limit:$("#limit").html()
            },
            dataType: 'json'
        }).done(function(result) {
            let movies = result;
            console.log(movies);
            $("#ordered").html("");
            $.each(movies, function(key, movie) {
                $('#ordered').append('<div id="clone" class="clone">')
                $('#clone').append('<div class="one" id="one">')
                $('#clone').append('<div class="two" id="two">')
                $('#clone').append('<div class="three" id=three>')
                $('#one').append('<img src="' + movie.poster + '" alt="" srcset="">');
                $('#two').append('<h2>#' + movie.id +"<a href='details.php?id=" + movie.id + "'>" + movie.title + '</a></h2>');
                $('#two').append('<p>  ' + movie.descriptionCut + ' ...</p>');
                $('#three').append('<p><a href="modifymovie.php?id=' + movie.id + '" alt="" srcset="">Modify Movie</a></p>');
                $('#three').append('<p><a href="details.php?id='+ movie.id +'" alt="" srcset="">See Details</a></p>');
                $('#one').removeAttr("id");
                $('#two').removeAttr("id");
                $('#three').removeAttr("id");
                $('#clone').removeAttr("id");
                console.log('SUCCESS : ' + result);
            });
        }).fail(function (result) {
            console.log('AJAX ERRORS:' + result);
            $('#movies').html(result);
        });
    });
});
$(function () {
            
    $('#ordered').ready(function (e) {

        $.ajax({
            url: 'allmovies.php',
            method: 'get',
            dataType: 'json',
            data:{
                cat: $("#cat").val(),
                sort:$("#sort").val(),
                limit:$("#limit").html()
            },

        }).done(function(result) {
            let movies = result;
            console.log(movies);
            $("#ordered").html("");
            $.each(movies, function(key, movie) {
                $('#ordered').append('<div id="clone" class="clone">')
                $('#clone').append('<div class="one" id="one">')
                $('#clone').append('<div class="two" id="two">')
                $('#clone').append('<div class="three" id=three>')
                $('#one').append('<img src="' + movie.poster + '" alt="" srcset="">');
                $('#two').append('<h2>#' + movie.id +"<a href='details.php?id=" + movie.id + "'>" + movie.title + '</a></h2>');
                $('#two').append('<p>  ' + movie.descriptionCut + ' ...</p>');
                $('#three').append('<p><a href="modifymovie.php?id=' + movie.id + '" alt="" srcset="">Modify Movie</a></p>');
                $('#three').append('<p><a href="details.php?id='+ movie.id + '" alt="" srcset="">See Details</a></p>');
                $('#one').removeAttr("id");
                $('#two').removeAttr("id");
                $('#three').removeAttr("id");
                $('#clone').removeAttr("id");
                console.log('SUCCESS : ' + result);
            });

        }).fail(function (result) {
            console.log('AJAX ERROR2:' + result);
            $('#ordered').html(result);
        });
    });
})
$(function () {
            
    $('#cat').ready(function (e) {

        $.ajax({
            url: 'allcat.php',
            method: 'get',
            dataType: 'json'

        }).done(function(result) {
            let cat = result;
            console.log(cat);
            $.each(cat, function(key, cat) {
                $('#cat').append('<option value="' + cat.id + '">'+ cat.name +'</option>');
                console.log('SUCCESS : ' + result);
            });

        }).fail(function (result) {
            console.log('AJAX ERROR:' + result);
            $('#ordered').html(result);
        });
    });
})