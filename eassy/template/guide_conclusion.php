<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/26/2017
 * Time: 2:05 PM
 */
?>
<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#summary" onclick='intro_type(1,"conclusion_type")'>Summary Conclusion</a></li>
    <li><a data-toggle="pill" href="#speculative" onclick='intro_type(2,"conclusion_type")'>Speculative Conclusion</a></li>
</ul>

<div class="tab-content">
    <small class="form-text">Choose the style before you start writing. Only one conclusion will be saved.</small>
    <div id="summary" class="tab-pane fade in active">
        <div class="form-group">
            <input id="c1" type="text" class="form-control writingArea" placeholder="Thesis">
            <textarea id="c2" class="form-control writingArea" rows="2" placeholder="Major points of the essay" onkeyup="auto_grow(this)"></textarea>
            <input id="c3" type="text" class="form-control writingArea" placeholder="End sentence">
        </div>
        <p>word Count : <span id="display_count4">0</span> words.</p>
        <script>
            $(document).ready(function(){
                $("#conclusion .writingArea").each(function() {
                    var id = $(this).attr('id');
                    $.ajax({
                        type: 'POST',
                        url: 'AJAX/load_input.php',
                        data: {ID:id, part: "conclusion", user: <?php echo $_SESSION['id'] ?>},
                        success: function(data){
                            $('#'+id).val(data);
                        }
                    });
                });
            });

            $(function() {
                $('#conclusion .writingArea').on('keyup', function() {
                    var value = $(this).val();
                    //document.getElementById('demo').innerHTML = value;
                    var id = $(this).attr('id');
                    $.ajax({
                        type: 'POST',
                        url: 'AJAX/upload_writing.php',
                        data: {ID:id ,value:value, part: "conclusion", user: <?php echo $_SESSION['id'] ?>},
                        /*success: function(data){
                            $('#demo').html(data);
                        }*/
                    });
                });


                var wordCounts = {};

                $("#conclusion .writingArea").each(function() {
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
                    $('#display_count4').text(finalCount);
                }
            });
        </script>
    </div>

    <div id="speculative" class="tab-pane fade">
        <div class="form-group">
            <input id="c4" type="text" class="form-control writingArea" placeholder="Thesis">
            <input id="c5" type="text" class="form-control writingArea" placeholder="Short summary of essay">
            <textarea id="c6" class="form-control writingArea" rows="2" placeholder="New but related point (generalization, speculation, judgement, recommendation)" onkeyup="auto_grow(this)"></textarea>
        </div>
        <p>word Count : <span id="display_count5">0</span> words.</p>
        <script>
            $(function() {
                var wordCounts = {};

                $("#speculative .writingArea").each(function() {
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
                    $('#display_count5').text(finalCount);
                }
            });
        </script>
    </div>
</div>
