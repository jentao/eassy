<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/26/2017
 * Time: 2:05 PM
 */
?>

<label>Point 1:</label>
<div class="form-group">
    <input id="b1" type="text" class="form-control writingArea" placeholder="Topic sentence">
    <textarea id="b2" class="form-control writingArea"  rows="5" placeholder="Development" onkeyup="auto_grow(this)"></textarea>
    <input id="b3" type="text" class="form-control writingArea" placeholder="End sentence">
</div>
<label>Point 2:</label>
<div class="form-group">
    <input id="b4" type="text" class="form-control writingArea" placeholder="Topic sentence">
    <textarea id="b5" class="form-control writingArea"  rows="5" placeholder="Development" onkeyup="auto_grow(this)"></textarea>
    <input id="b6" type="text" class="form-control writingArea" placeholder="End sentence">
</div>
<label>Point 3:</label>
<div class="form-group">
    <input id="b7" type="text" class="form-control writingArea" placeholder="Topic sentence">
    <textarea id="b8" class="form-control writingArea" rows="5" placeholder="Development" onkeyup="auto_grow(this)"></textarea>
    <input id="b9" type="text" class="form-control writingArea" placeholder="End sentence">
</div>
<p>word Count : <span id="display_count3">0</span> words.</p>
<script>
    $(document).ready(function(){
        $("#body .writingArea").each(function() {
            var id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: 'AJAX/load_input.php',
                data: {ID:id, part: "body", user: <?php echo $_SESSION['id'] ?>},
                success: function(data){
                    $('#'+id).val(data);
                }
            });
        });
    });

    $(function() {
        $('#body .writingArea').on('keyup', function() {
            var value = $(this).val();
            //document.getElementById('demo').innerHTML = value;
            var id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: 'AJAX/upload_writing.php',
                data: {ID:id ,value:value, part: "body", user: <?php echo $_SESSION['id'] ?>},
                /*success: function(data){
                    $('#demo').html(data);
                }*/
            });
        });

        var wordCounts = {};

        $("#body .writingArea").each(function() {
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
            $('#display_count3').text(finalCount);
        }
    });
</script>
<button type="button" class="btn btn-default">Add paragraph</button>
