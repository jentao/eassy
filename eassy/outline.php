<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/10/2017
 * Time: 3:02 PM
 */
include('config/css.php');
include('config/js.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        $pageTitle = 'Outline';
        echo 'Essay | '. $pageTitle;
        ?>
    </title>
    <style>
        #node2 {
            padding-left: 20px;
            padding-top: 5px;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="navbar-collapse collapse">
            <ul class="nav nav-justified">
                <li><a href="index.php" class="navbar-brand">EASSY</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <form action="writing.php">
            <div class="node">
                <p>Introduction
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                </p>
                <div  id="node2">

                    <div class="node input-group">
                        <input type="text" class="form-control" value="Search" name="search">
                        <span class="input-group-addon" role="button">
                            <span>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </span>
                        </span>
                        <span class="input-group-addon" role="button">
                            <span>
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </span>
                        </span>
                    </div>

                    <div  id="node2">
                        <div class="node input-group">
                            <input type="text" class="form-control" value="Search" name="search">
                            <span class="input-group-addon" role="button">
                                <span>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                </span>
                            </span>
                            <span class="input-group-addon" role="button">
                                <span>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="node input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <span class="input-group-addon" role="button">
                            <span>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </span>
                        </span>
                        <span class="input-group-addon" role="button">
                            <span>
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </span>
                        </span>
                    </div>

                </div>

            </div>
            <div class="node">
                <p>Body
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                </p>
                <div  id="node2">

                    <div class="node input-group">
                        <input type="text" class="form-control" value="Search" name="search">
                        <span class="input-group-addon" role="button">
                            <span>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </span>
                        </span>
                        <span class="input-group-addon" role="button">
                            <span>
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </span>
                        </span>
                    </div>

                </div>
            </div>
            <div class="node">
                <p>Conclusion
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                </p>
            </div>
            <br>
            <input type="submit" class="btn btn-default" value="Save and Start Writing">
        </form>

    </div>
</body>
