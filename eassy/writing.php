<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/4/2017
 * Time: 9:05 PM
 */

include('config/setup.php');
session_start();
if (!isset($_SESSION['id'])){
    require ('function/login_functions.php');
    redirect_user();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        window.onload = function() {
            addToTab();
        };
    </script>
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
        </ul>
        <form action="review.php">
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

            </div>
        </form>
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
                        <input type="text" id="newGroup" placeholder="New Group">
                        <span onclick="newGroup()" class="addBtn">Add</span>
                    </div>

                    <ul id="groupList">
                        <!--<li>Hit the gym<span class="close" onclick='deleteGroup(0)>&times;</span></li>
                        <li>Pay bills</li>
                        <li>Meet George</li>
                        <li>Buy eggs</li>
                        <li>Read a book</li>
                        <li>Organize office</li>-->
                    </ul>
                    <br>
                    <button type="button" class="btn btn-default" onclick=choose()>Home</button>
                </div>

                <!--Words-->
                <div class="modal-body wordlist" id="chooseGroup" style="display:none">
                    <ul id="chooseGroupList">
                        <!--<li onclick=editWord()>Pay bills</li>
                        <li>Meet George</li>
                        <li>Buy eggs</li>
                        <li>Read a book</li>
                        <li>Organize office</li>-->
                    </ul>
                    <br>
                    <button type="button" class="btn btn-default" onclick=choose()>Home</button>
                </div>

                <div class="modal-body wordlist" id="word" style="display:none">
                    <!--<div id="myDIV" class="add-header">
                        <input type="text" id="newWord" placeholder="New Word">
                        <span onclick="newWord()" class="addBtn">Add</span>
                    </div>

                    <ul id="wordList">
                        <li>Hit the gym<span class="close">&times;</span></li>
                        <li>Pay bills</li>
                        <li>Meet George</li>
                        <li>Buy eggs</li>
                        <li>Read a book</li>
                        <li>Organize office</li>
                    </ul>
                    <br>
                    <button type="button" class="btn btn-default" onclick=choose()>Home</button>-->
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
                    <h4 class="modal-title">Citation</h4>
                </div>
                <div class="modal-body">
                    <label>APA Style</label>
                    <p>
                        Author, F.M. (Year, Month Date of publication). Title of webpage/article. Retrieved from URL
                    </p>
                    <label>MLA Style</label>
                    <p>
                        Last name, First name. “Article Title.” Website Title. Month Date, Year of publication. Publication/Updated Month Date, Year OR Accessed Month Date, Year of access. URL.
                    </p>
                    <label>Chicago Manual of Style</label>
                    <p>
                        Last, First M. “Article Title.”<cite>Website Title.</cite> Website Publisher, Date Month Year Published. Web. Date Month Year Accessed.
                    </p>

                    <textarea id="cm" class="form-control"></textarea>

                    <button type="button" class="btn btn-default" onclick="addCitation()">Submit</button>
                </div>
            </div>

        </div>
    </div>
    <p id="demo"></p>
</body>
<footer>
</footer>
<script>
    function addCitation() {
        var input = document.getElementById("cm").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById('demo').innerHTML = this.responseText;
                //location.reload();
                $('#citeModal').modal('hide');
            }
        };
        xhttp.open("GET", "AJAX/new_cit.php?input="+input+"&id=<?php echo $_SESSION['id'] ?>", true);
        xhttp.send();
    }

    function length() {
        var x;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                x = this.responseText;
            }
        };
        xhttp.open("GET", "AJAX/length.php?id=<?php echo $_SESSION['id'] ?>", true);
        xhttp.send();
        return x;
    }
    function wordLength(group) {
        var x;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                x= this.responseText;
            }
        };
        xhttp.open("GET", "AJAX/word_length.php?group="+group+"&id=<?php echo $_SESSION['id'] ?>", true);
        xhttp.send();
        return x;
    }


    function editGroup() {
        document.getElementById('group/word').style.display='none';
        document.getElementById('group').style.display='block';
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('groupList').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "AJAX/edit_group.php?id=<?php echo $_SESSION['id'] ?>", true);
        xhttp.send();
    }

    function deleteGroup(group) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById('demo').innerHTML = this.responseText;
                editGroup();
            }
        };
        xhttp.open("GET", "AJAX/delete_group.php?x="+group+"&id=<?php echo $_SESSION['id'] ?>", true);
        xhttp.send();
    }


    function newGroup() {
        var inputValue = document.getElementById("newGroup").value;
        if (inputValue === '') {
            alert("You must write something!");
        } else {
            document.getElementById("newGroup").value = "";
        }

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById('demo').innerHTML = this.responseText;
                editGroup();
            }
        };

        xhttp.open("GET", "AJAX/new_group.php?x="+inputValue+"&id=<?php echo $_SESSION['id'] ?>", true);
        xhttp.send();
    }


    function chooseGroup() {
        document.getElementById('group/word').style.display='none';
        document.getElementById('chooseGroup').style.display='block';
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('chooseGroupList').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "AJAX/groupList.php?id=<?php echo $_SESSION['id'] ?>", true);
        xhttp.send();
    }

    function editWord(group) {
        document.getElementById('chooseGroup').style.display='none';
        document.getElementById('word').style.display='block';
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('word').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "AJAX/wordlist.php?x="+group+"&id=<?php echo $_SESSION['id'] ?>", true);
        xhttp.send();
    }


    function deleteWord(group,word) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById('demo').innerHTML = this.responseText;
                editWord(group);
            }
        };
        xhttp.open("GET", "AJAX/delete_word.php?x="+group+"&y="+word+"&id=<?php echo $_SESSION['id'] ?>", true);
        xhttp.send();
    }
    function newWord(group) {
        var inputValue = document.getElementById("newWord").value;

        if (inputValue === '') {
            alert("You must write something!");
        } else {
            document.getElementById("newGroup").value = "";
        }

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById('demo').innerHTML = this.responseText;
                editWord(group);
            }
        };
        xhttp.open("GET", "AJAX/new_word.php?x="+inputValue+"&group="+group+"&id=<?php echo $_SESSION['id'] ?>", true);
        xhttp.send();
    }

    function choose() {
        document.getElementById('chooseGroup').style.display='none';
        document.getElementById('word').style.display='none';
        document.getElementById('group').style.display='none';
        document.getElementById('group/word').style.display='block';
    }


    function addPF(id) {
        document.getElementById(id).addEventListener("paste",pasteFunction);
    }

    function addToTab() {
        var ids = ["intro", "body", "conclusion"];
        for (var i = 0; i < ids.length; i++) {
            addPF(ids[i]);
        }
    }

    function openON() {
        document.getElementById("outlineNav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeON() {
        document.getElementById("outlineNav").style.width = "0";
        document.getElementById("main").style.marginLeft= "auto";
    }


    function openVN() {
        document.getElementById("vocabNav").style.width = "200px";
        document.getElementById("main").style.marginRight = "200px";
    }

    function closeVN() {
        document.getElementById("vocabNav").style.width = "0";
        document.getElementById("main").style.marginRight= "auto";
    }

    $("#myModal").modal("hide").on("hidden.bs.modal", function () {
        location.reload();
    });
</script>

