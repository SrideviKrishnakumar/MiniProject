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
            $('#cat').html(result);
        });
    });
})

$(function () {
            
    $('#choose').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'addbuttons.php',
            method: 'get',
            data:{
                id:$("#cat").val(),
            }

        }).done(function(result) {
            let cat = result;
            console.log(cat);
            
                $('#app').html(cat);
                console.log('SUCCESS : ' + result);
            

        }).fail(function (result) {
            console.log('AJAX ERROR:' + result);
            $('#app').append('<p>Something went wrong</p>');
        });
    });
})

$(function () {
            
    $('#app').submit(function (e) {
        e.preventDefault();
        console.log("test");
        $.ajax({
            url: 'modifycatquery.php',
            method: 'post',
            data:{
                name:$(".post").val(),
                id:$("#cat").val(),
            }

        }).done(function(result) {
            
                $('.text').append(result);
                console.log('SUCCESS : ' + result);
            

        }).fail(function (result) {
            console.log('AJAX ERROR:' + result);
            $('.text').append(result);
        });
    });
})