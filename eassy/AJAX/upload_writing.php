<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 10/27/2017
 * Time: 9:08 AM
 */

include('../config/setup.php');

$id = $_POST["ID"];
$value = $_POST["value"];
$part = $_POST["part"];
$user = $_POST["user"];

$q = "SELECT $part FROM essay WHERE user_id='$user'";
$result = mysqli_query($dbc,$q);
$row = mysqli_fetch_array($result);
$arr = json_decode($row[0]);

$arr->$id = $value;

$str = json_encode($arr);

$q = "UPDATE essay
SET $part='$str'
WHERE user_id='$user'";
mysqli_query($dbc, $q);

echo $value;