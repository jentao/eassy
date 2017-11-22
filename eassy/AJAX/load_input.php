<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 10/29/2017
 * Time: 4:52 PM
 */

include('../config/setup.php');
$id = $_POST["ID"];
$part = $_POST["part"];
$user = $_POST["user"];

$q = "SELECT $part FROM essay WHERE user_id='$user'";
$result = mysqli_query($dbc,$q);
$row = mysqli_fetch_array($result);

$arr = json_decode($row[0]);
$value = $arr->$id;
echo $value;