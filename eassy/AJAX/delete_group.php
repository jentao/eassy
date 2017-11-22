<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 10/20/2017
 * Time: 11:09 PM
 */
include('../config/setup.php');
$group = $_REQUEST['x'];
$id = $_REQUEST["id"];

$q = "SELECT vocab_list FROM users WHERE id='$id'";
$result = mysqli_query($dbc,$q);
$row = mysqli_fetch_array($result);
$tree = json_decode($row[0]);

array_splice($tree, $group, 1);

$str = json_encode($tree);

$q = "UPDATE users
SET vocab_list='$str'
WHERE id='$id';";
mysqli_query($dbc, $q);

echo $str;