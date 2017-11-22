<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 10/20/2017
 * Time: 10:41 PM
 */
include('../config/setup.php');
$group = $_REQUEST["x"];
$id = $_REQUEST['id'];

$q = "SELECT vocab_list FROM users WHERE id='$id'";
$result = mysqli_query($dbc,$q);
$row = mysqli_fetch_array($result);
$tree = json_decode($row[0]);
$length = count($tree);

echo '<div id="myDIV" class="add-header">
        <input type="text" id="newWord" placeholder="New Word">
        <span onclick="newWord('.$group.')" class="addBtn">Add</span>
    </div>
    <ul id="wordlist">';
for($x=1; $x<count($tree[$group]); $x++){
    echo "<li>". $tree[$group][$x]. "<span class=\"close\" onclick='deleteWord(" .$group. "," .$x. ",this)'>&times;</span></li>";
}
echo "</ul>
        <br>
        <button type=\"button\" class=\"btn btn-default\" onclick=choose()>Home</button>";