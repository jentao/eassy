<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/7/2017
 * Time: 1:14 PM
 */
include('config/css.php');
include('config/js.php');
?>
<style>
    .tab-content {
        margin: 10px;
    }
</style>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="#" onclick="openON()">Outline</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" onclick="openVN()">Word List</a></li>
        </ul>
        <div class="navbar-collapse collapse">
            <ul class="nav nav-justified">
                <li><a href="/projects/eassy/index.php" class="navbar-brand">EASSY</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
include('outline_sidebar.php');
include('vocab_sidebar.php');
?>






