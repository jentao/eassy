<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 10/29/2017
 * Time: 10:46 PM
 */

include('../config/setup.php');
$q = "SELECT * FROM essay";

$input = $_REQUEST["input"];
$id = $_REQUEST["id"];

$q = "SELECT citation FROM essay WHERE user_id='$id'";
$result = mysqli_query($dbc,$q);
$row = mysqli_fetch_array($result);
$arr = json_decode($row[0]);

$input = $arr->cit.$input."<br>";
$arr->cit = $input;

$str = json_encode($arr);

$q = "UPDATE essay
SET citation='$str'
WHERE user_id='$id'";
mysqli_query($dbc, $q);
echo $input;