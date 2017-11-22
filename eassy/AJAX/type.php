<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 10/29/2017
 * Time: 8:20 PM
 */

include('../config/setup.php');
$type = $_REQUEST["type"];
$part = $_REQUEST["part"];
$id = $_REQUEST["id"];

$q = "UPDATE essay
SET $part='$type'
WHERE user_id='$id'";

mysqli_query($dbc, $q);
