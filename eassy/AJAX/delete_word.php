<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 10/22/2017
 * Time: 10:10 PM
 */
include('../config/setup.php');
$group = $_REQUEST['x'];
$word = $_REQUEST['y'];
$id = $_REQUEST['id'];

$q = "SELECT vocab_list FROM users WHERE id='$id'";
$result = mysqli_query($dbc,$q);
$row = mysqli_fetch_array($result);
$tree = json_decode($row[0]);

array_splice($tree[$group], $word, 1);

$str = json_encode($tree);

$q = "UPDATE users
SET vocab_list='$str'
WHERE id='$id';";
mysqli_query($dbc, $q);

echo $str;