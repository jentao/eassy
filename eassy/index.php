<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/2/2017
 * Time: 4:33 PM
 */
include('config/setup.php');
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
        $pageTitle = 'Home';
        echo 'Essay | '. $pageTitle;
        ?>
    </title>
    <style>
        body {
            background-image: url(https://i.pinimg.com/originals/df/a5/9c/dfa59cc952478f5aa96b27c6835bd74d.jpg);
        }
        .maindiv {
            margin: 80px;
        }
        .fa-plus-circle {
            color: #0099f2
        }
        p {
            font-family: Sans-serif;
            font-size: 15px
        }
    </style>
</head>
<body>
    <div class="container-fluid text-center maindiv">
        <h3 style="font-family: 'Permanent Marker', cursive;font-size: 50px;">EASSY</h3>
        <i class="fa fa-book fa-5x" aria-hidden="true"></i>
        <h3 style="font-family: 'Libre Barcode 39 Text', cursive;font-size: 35px;">an Easy way to write Essay</h3>
    </div>
    <div class="container-fluid text-center maindiv">
        <p>Start Writing</p>
        <a href="#">
            <i class="fa fa-plus-circle fa-5x" aria-hidden="true" data-toggle="modal" data-target="#myModal"></i>
        </a>
    </div>
    <div class="container-fluid text-center row maindiv">
        <div class="col-sm-6">
            <p>Essay</p>
            <a data-toggle="collapse" href="#writeEssay">
                <i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i>
            </a>
        </div>
        <div class="col-sm-6">
            <p>Outline</p>
            <a href="outline.php">
                <i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="container-fluid text-center row maindiv collapse" id="writeEssay">
        <div class="col-sm-6">
            <p>Guide</p>
            <a href="writing.php">
                <i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i>
            </a>
        </div>
        <div class="col-sm-6">
            <p>Template Example</p>
            <i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="loginHeader" class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <form id="login" style="display:block">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember"> Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-default">Login</button>
                        <button type="button" class="btn btn-default" onclick=openSignUp()>Sign Up</button>
                    </form>

                    <form id="signup" style="display:none">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</body>
<footer>
</footer>
<script>
    function openSignUp() {
        document.getElementById('login').style.display='none';
        document.getElementById('signup').style.display='block';
        document.getElementById('loginHeader').innerHTML = 'Sign Up';
    }
</script>