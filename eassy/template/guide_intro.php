<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/26/2017
 * Time: 1:51 PM
 */
?>
<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#RoadMap" onclick='intro_type(1,"intro_type")'>The Road Map Introduction</a></li>
    <li ><a data-toggle="pill" href="#GS" onclick='intro_type(2,"intro_type")'>The General-to-Specific Introduction</a></li>
</ul>


<div class="tab-content">
    <small class="form-text">Choose the style before you start writing. Only one introduction will be saved.</small>
    <div id="RoadMap" class="tab-pane fade in active">
        <div class="form-group">
            <input id="ip1" type="text" class="form-control writingArea" placeholder="Thesis (main idea)">
            <textarea id="ip2" class="form-control writingArea" rows="3" placeholder="Reference to each major point of the essay" onkeyup="auto_grow(this)"></textarea>
            <input id="ip3" type="text" class="form-control writingArea" placeholder="A concluding sentence that returns, in different words, to the thesis">
        </div>
        <p>word Count : <span id="display_count1">0</span> words.</p>
        <script>
            $(document).ready(function(){
                $("#intro .writingArea").each(function() {
                    var id = $(this).attr('id');
                    $.ajax({
                        type: 'POST',
                        url: 'AJAX/load_input.php',
                        data: {ID:id, part: "intro", user: <?php echo $_SESSION['id'] ?> },
                        success: function(data){
                            $('#'+id).val(data);
                        }
                    });
                });
            });

            $(function() {
                $('#intro .writingArea').on('keyup', function() {
                    var value = $(this).val();
                    //document.getElementById('demo').innerHTML = value;
                    var id = $(this).attr('id');
                    $.ajax({
                        type: 'POST',
                        url: 'AJAX/upload_writing.php',
                        data: {ID:id, value:value, part: "intro", user: <?php echo $_SESSION['id'] ?>},
                        /*success: function(data){
                            $('#demo').html(data);
                        }*/
                    });
                });

                var wordCounts = {};

                $("#RoadMap .writingArea").each(function() {
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
                    $('#display_count1').text(finalCount);
                }
            });
        </script>
    </div>

   <div id="GS" class="tab-pane fade">
        <div class="form-group">
            <input id="ip4" type="text" class="form-control writingArea" placeholder="A general statement or background of the topic">
            <textarea id="ip5" class="form-control writingArea" rows="3" placeholder="More specific statements that lead to the thesis" onkeyup="auto_grow(this)"></textarea>
            <input id="ip6" type="text" class="form-control writingArea" placeholder="Thesis (main idea)">
        </div>
       <p>word Count : <span id="display_count2">0</span> words.</p>
       <script>
           $(function() {
               var wordCounts = {};

               $("#GS .writingArea").each(function() {
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
                   $('#display_count2').text(finalCount);
               }
           });
       </script>
    </div>
</div>



