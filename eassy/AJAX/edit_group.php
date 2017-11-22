<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 10/23/2017
 * Time: 1:41 PM
 */
include('../config/setup.php');
$id = $_REQUEST["id"];

$q = "SELECT vocab_list FROM users WHERE id='$id'";
$result = mysqli_query($dbc,$q);
$row = mysqli_fetch_array($result);

$tree = json_decode($row[0]);

for($x=0; $x<count($tree); $x++){
    echo "<li>". $tree[$x][0]. "<span class=\"close\" onclick='deleteGroup(" . $x . ")'>&times;</span></li>";
}
