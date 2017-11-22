<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 10/22/2017
 * Time: 10:44 PM
 */
include('../config/setup.php');
$id = $_REQUEST['id'];

$q = "SELECT vocab_list FROM users WHERE id='$id'";
$result = mysqli_query($dbc,$q);
$row = mysqli_fetch_array($result);

$tree = json_decode($row[0]);

for($x=0; $x<count($tree); $x++) {
    echo "<li onclick=editWord(" . $x . ")>" . $tree[$x][0] . "</li>";
}