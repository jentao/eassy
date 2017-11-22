<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/7/2017
 * Time: 1:44 PM
 */

?>
<div id="vocabNav" class="sidenav" style="right: 0">
    <a href="javascript:void(0)" class="closebtn" onclick="closeVN()">&times;</a>
    <div id="wordList"></div>
    <a href="#" class="btn" data-toggle="modal" data-target="#myModal">Edit List</a>
</div>

<script type="text/javascript">
    <?php
    $id = $_SESSION['id'];
    $q = "SELECT vocab_list FROM users WHERE id='$id'";
    $result = mysqli_query($dbc,$q);
    $row = mysqli_fetch_array($result);
    $tree = json_decode($row[0]);

    /*$tree=array
    (
        array("Time","currently","during","eventually","finally","formerly","immediately","initially","lastly","later","meanwhile","next","once","previously","simultaneously","subsequently"),
        array("Causal Relationship", "since", "because", "due to", "as a result", "whereby", "so", "accordingly", "therefore", "hence", "consequently", "thus", "thence", "therefrom", "corollary"),
        array("Conclusion","in a word", "in conclusion", "in brief", "in short", "in summary", "overall", "to sum up", "on the whole", "to summarize", "to conclude", "given these facts"),
        array("Example", "for example", "for instance", "in particular", "particularly", "to illustrate", "to demonstrate", "consider this"),
        array("Analogy", "similarly", "likewise", "equally"),
        array("Turn", "in contrast", "on the contrary", "instead", "conversely", "however", "nevertheless", "unfortunately", "although", "whereas"),
        array("Emphasis", "in particular", "especially", "indeed", "apparently", "of course", "clearly", "obviously", "in fact", "after all"),
        array("Progressive Relationship", "besides", "furthermore", "in addition", "moreover", "likewise", "in deed", "in fact", "as well", "in truth"),
        array("Concession", "presumably", "probably", "possibly", "perhaps", "mostly", "nearly", "almost", "occasionally", "generally", "commonly"),
        array("Absolution", "totally", "absolutely", "entirely", "thoroughly", "completely", "undoubtedly", "exactly", "definitely", "extremely", "by no means", "certainly", "without doubt", "needless to say"),
        array("Condition","provision","given", "if", "whether", "whenever", "when", "while"),
        array("Intensify","incredibly","exceedingly","extremely","extraordinarily","truly","really","very","utterly","absolutely","perfectly","sublimely","dramatically")
    );*/

    ?>
    $(function(){
        var mytree = [

            <?php
            for ($x = 0; $x < sizeof($tree); $x++) {
                $parent = $tree[$x][0];
                echo "{text: '" . $parent . "', href: '#" . preg_replace('/\s+/', '', $parent) . "'";

                if (sizeof($tree[$x])>1){

                    echo ", nodes: [";

                    for ($i = 1; $i < sizeof($tree[$x]); $i++){
                        $child = $tree[$x][$i];
                        echo "{text: '" . $child . "', href: '#" . preg_replace('/\s+/', '', $child) . "'";

                        if ($i == sizeof($tree[$x])-1) {
                            echo "} ]";
                        }
                        else{
                            echo "},";
                        }
                    }
                }

                if ($x == sizeof($tree)-1){
                    echo "}";
                }
                else{
                    echo "},";
                }
            }
            ?>

        ];

        $('#wordList').treeview({
            data: mytree,
            levels: 1,
            color: "#818181",
            showTags: true,
            showBorder: false
        });
    });
</script>
