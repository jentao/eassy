<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/4/2017
 * Time: 9:05 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        $pageTitle = 'Template';
        echo 'Essay | '. $pageTitle;
        ?>
    </title>
</head>
<body>
    <?php include('template/writing_nav.php'); ?>

    <div class="container-fluid" id="main">

        <ul class="nav nav-tabs">
            <li class="active"><a  data-toggle="tab" href="#intro">Introduction</a></li>
            <li><a  data-toggle="tab" href="#body">Body</a></li>
            <li><a  data-toggle="tab" href="#conclusion">Conclusion</a></li>
            <li><a  data-toggle="tab" href="#citation">Citation</a></li>
            <li><a  data-toggle="tab" href="#review">Review</a></li>
        </ul>

        <div class="tab-content">

            <div id="intro" class="tab-pane fade in active">
                <?php include('template/guide_intro.php') ?>
            </div>
            <div id="body" class="tab-pane fade in">
                <?php include('template/guide_body.php') ?>
            </div>
            <div id="conclusion" class="tab-pane fade in">
                <?php include('template/guide_conclusion.php') ?>
            </div>
            <div id="citation" class="tab-pane fade in">
                <?php include('template/guide_citation.php') ?>
            </div>
            <div id="review" class="tab-pane fade in">
                <?php include('template/guide_review.php') ?>
            </div>

        </div>

    </div>

    <!-- word Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body" id="group/word" style="display:block">
                    <button type="button" class="btn btn-default" onclick=editGroup()>Edit Group</button>
                    <button type="button" class="btn btn-default" onclick=chooseGroup()>Edit Word</button>
                </div>

                <!--Group-->
                <div class="modal-body wordlist" id="group" style="display:none">
                    <div id="myDIV" class="add-header">
                        <input type="text" id="myInput" placeholder="Title...">
                        <span onclick="newElement()" class="addBtn">Add</span>
                    </div>

                    <ul id="myUL">
                        <li>Hit the gym<span class="close">&times;</span></li>
                        <li>Pay bills</li>
                        <li>Meet George</li>
                        <li>Buy eggs</li>
                        <li>Read a book</li>
                        <li>Organize office</li>
                    </ul>
                    <br>
                    <button type="button" class="btn btn-default" onclick=choose()>Home</button>
                </div>

                <!--Words-->
                <div class="modal-body wordlist" id="chooseGroup" style="display:none">
                    <ul id="myUL">
                        <li onclick=editWord()>Pay bills</li>
                        <li>Meet George</li>
                        <li>Buy eggs</li>
                        <li>Read a book</li>
                        <li>Organize office</li>
                    </ul>
                    <br>
                    <button type="button" class="btn btn-default" onclick=choose()>Home</button>
                </div>

                <div class="modal-body wordlist" id="word" style="display:none">
                    <div id="myDIV" class="add-header">
                        <input type="text" id="myInput" placeholder="Title...">
                        <span onclick="newElement()" class="addBtn">Add</span>
                    </div>

                    <ul id="myUL">
                        <li>Hit the gym<span class="close">&times;</span></li>
                        <li>Pay bills</li>
                        <li>Meet George</li>
                        <li>Buy eggs</li>
                        <li>Read a book</li>
                        <li>Organize office</li>
                    </ul>
                    <br>
                    <button type="button" class="btn btn-default" onclick=choose()>Home</button>
                </div>

            </div>

        </div>
    </div>


    <!-- citation Modal -->
    <div id="citeModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
            </div>

        </div>
    </div>

</body>
<footer>
</footer>
<script>
    function editGroup() {
        document.getElementById('group/word').style.display='none';
        document.getElementById('group').style.display='block';
    }

    function chooseGroup() {
        document.getElementById('group/word').style.display='none';
        document.getElementById('chooseGroup').style.display='block';
    }

    function editWord() {
        document.getElementById('chooseGroup').style.display='none';
        document.getElementById('word').style.display='block';
    }

    function choose() {
        document.getElementById('chooseGroup').style.display='none';
        document.getElementById('word').style.display='none';
        document.getElementById('group').style.display='none';
        document.getElementById('group/word').style.display='block';
    }
</script>
