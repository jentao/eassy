<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/26/2017
 * Time: 2:06 PM
 */
?>
<label>APA Style</label>
<p>
    Author, F.M. (Year, Month Date of publication). Title of webpage/article. Retrieved from URL
</p>
<label>MLA Style</label>
<p>
    Last name, First name. “Article Title.” Website Title. Month Date, Year of publication. Publication/Updated Month Date, Year OR Accessed Month Date, Year of access. URL.
</p>
<label>Chicago Manual of Style</label>
<p>
    Last, First M. “Article Title.”<cite>Website Title.</cite> Website Publisher, Date Month Year Published. Web. Date Month Year Accessed.
</p>

<textarea id="cit" class="form-control" onkeyup="auto_grow(this)"></textarea>
<br>

<form action="review.php">
    <button type="submit" class="btn btn-success" >Review</button>
</form>

<script>
    $(document).ready(function(){
        $.ajax({
            type: 'POST',
            url: 'AJAX/load_input.php',
            data: {ID:"cit", part: "citation", user: "<?php echo $_SESSION['id'] ?>"},
            success: function(data){
                var value = data.replace(/<br>/g, "\n");
                $('#cit').val(value);
            }
        });
    });


    $(function() {
        $('#cit').on('keyup', function () {
            var value = $(this).val();
            //document.getElementById('demo').innerHTML = value;
            value = value.replace( /\n/g, "<br>");
            $.ajax({
                type: 'POST',
                url: 'AJAX/upload_writing.php',
                data: {ID: "cit", value: value, part: "citation", user: "<?php echo $_SESSION['id'] ?>"},
                /*success: function (data) {
                    $('#demo').html(data);
                }*/
            });
        });
    });
</script>