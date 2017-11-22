<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/2/2017
 * Time: 4:34 PM
 */

# Database connection
$dbc = @mysqli_connect('localhost','dev','password','eassy') OR die('Could not connect because: '.mysqli_connect_error());

