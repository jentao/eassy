<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/26/2017
 * Time: 2:06 PM
 */

include('config/setup.php');
session_start();
if (!isset($_SESSION['id'])){
    require ('function/login_functions.php');
    redirect_user();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        $pageTitle = 'Review';
        echo 'Essay | '. $pageTitle;
        ?>
    </title>
</head>
<body>

    <?php include('template/writing_nav.php'); ?>

    <div class="container-fluid" id="main">
        <textarea id="r" class="form-control writingArea" onkeyup="auto_grow(this)"></textarea>
        <p>word Count : <span id="display_count">0</span> words.</p>
        <script>
            $(document).ready(function(){
                $.ajax({
                    type: 'POST',
                    url: 'AJAX/review.php',
                    data: {id: <?php echo $_SESSION['id'] ?> },
                    success: function(data){
                        $('textarea').val(data);
                    }
                });
            });

            $(function() {
                var wordCounts = {};

                $(".writingArea").each(function() {
                    var input = '#' + this.id;
                    word_count(input);

                    $(this).keyup(function() {
                        word_count(input);
                    })

                });

                function word_count(field) {
                    var number = 0;
                    var matches = $(field).val().match(/\b/g);
                    if (matches) {
                        number = matches.length / 2;
                    }
                    wordCounts[field] = number;
                    var finalCount = 0;
                    $.each(wordCounts, function(k, v) {
                        finalCount += v;
                    });
                    $('#display_count').text(finalCount);
                }
            });
        </script>
        <br>
        <button type="button" class="btn btn-success">Save as Word</button>
    </div>
</body>
