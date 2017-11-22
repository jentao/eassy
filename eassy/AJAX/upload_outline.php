
<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 10/12/2017
 * Time: 9:02 PM
 */

include('../config/setup.php');
$uploadObj = $_POST['obj'];
$id = $_POST['id'];
echo $uploadObj;

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
    array("Describe", "vivid", "portray", "depict", "exhibit", "illustrate", "expose", "present", "paint a portrait", "limn", "delineate", "represent", "demonstrate", "constitute", "embody", "embodiment"),
    array("Condition","provision","given", "if", "whether", "whenever", "when", "while"),
    array("Intensify","incredibly","exceedingly","extremely","extraordinarily","truly","really","very","utterly","absolutely","perfectly","sublimely","dramatically")
);
$str = json_encode($tree);*/

$q = "UPDATE users
SET outline='$uploadObj'
WHERE id='$id';";
//$q = "INSERT INTO users (id, email, password, vocab_list, outline) VALUES (NULL, 'email', 'password', '$str', '$uploadObj')";
mysqli_query($dbc, $q);


//header("Location: ../writing.php");
?>