<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 10/23/2017
 * Time: 12:30 AM
 */
include('../config/setup.php');
$id=$_REQUEST["id"];

$q = "SELECT vocab_list FROM users WHERE id='$id'";
$result = mysqli_query($dbc,$q);
$row = mysqli_fetch_array($result);

$tree = json_decode($row[0]);

echo count($tree);