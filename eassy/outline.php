<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/10/2017
 * Time: 3:02 PM
 */

include('config/setup.php');
session_start();
if (!isset($_SESSION['id'])){
    require ('function/login_functions.php');
    redirect_user();
}
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

    <script>
        var uploadObj = [];

        window.onload = function() {
            var elem = document.getElementById('mainform');
            outline(myobj, elem);
            var div = document.createElement('div');
            div.innerHTML = document.getElementById('stuff').innerHTML;
            elem.appendChild(div);
            console.log(childTag(elem, "DIV"));
            console.log(childTag(elem.children[0], "DIV"));
        };

        //get an array of outlines
        <?php
        $id = $_SESSION['id'];
        $q = "SELECT outline FROM users WHERE id='$id'";
        $result = mysqli_query($dbc,$q);
        $row = mysqli_fetch_array($result);
        ?>

        var myobj = <?php echo $row[0]?>
        /*[
            {text: "Introduction"},
            {text: "Body",
                nodes: [
                    {text: "Paragraph 1"},
                    {text: "Paragraph 2"},
                    {text: "Paragraph 3"}
                ]
            },
            {text: "Conclusion"}
        ];*/

    </script>

    <style>
        #node2 {
            padding-left: 25px;
        }

        .node {
            padding-top: 2px;
            padding-bottom: 2px;
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
        <form id="mainform">

            <!--<div class="node" id="node2">
                <div class="node input-group">
                    <input type="text" class="form-control" value="Introduction">
                    <span class="input-group-addon" role="button" onclick="addNode(this.parentNode)">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                    </span>
                    <span class="input-group-addon" role="button" onclick="expandNode(this.parentNode)">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="node" id="node2">

                    <div class="node input-group">
                        <input type="text" class="form-control" value="Search">
                        <span class="input-group-addon" role="button" onclick="addNode(this.parentNode)">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <span class="input-group-addon" role="button" onclick="expandNode(this.parentNode)">
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </span>
                    </div>

                </div>

            </div>-->

        </form>

    </div>
<p id="demo"></p>
</body>

<script id="anotherBlock" type="text/html">
    <span class="input-group-addon" role="button" onclick="addNode(this.parentNode)">
            <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="input-group-addon" role="button" onclick="expandNode(this.parentNode)">
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </span>
</script>

<script id="blockOfStuff" type="text/html">
    <input type="text" class="form-control" value="">
    <span class="input-group-addon" role="button" onclick="addNode(this.parentNode)">
            <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="input-group-addon" role="button" onclick="expandNode(this.parentNode)">
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </span>
</script>

<!--save button-->
<script id="stuff" type="text/html">
    <br>
    <input type="button" class="btn btn-default" value="Save and Start Writing" onclick="test()">
</script>

<script id="buttonStuff" type="text/html">
    <span class="input-group-addon" role="button" onclick="addNode(this.parentNode)">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </span>
    <span class="input-group-addon" role="button" onclick="expandNode(this.parentNode)">
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </span>
</script>

<script>
    //add an input field below
    function addNode(element) {
        var div = document.createElement('div');
        div.setAttribute('class', 'input-group node');
        div.innerHTML = document.getElementById('blockOfStuff').innerHTML;
        var parentDiv = element.parentNode;
        parentDiv.insertBefore(div, element.nextSibling);
    }
    //expand a node
    function expandNode(element) {
        var maindiv = document.createElement('div');
        maindiv.setAttribute('id', 'node2');
        maindiv.setAttribute('class', 'node');
        maindiv.setAttribute('value', '');

        var div = document.createElement('div');
        div.setAttribute('class', 'input-group node');
        div.innerHTML = document.getElementById('blockOfStuff').innerHTML;

        maindiv.appendChild(div);

        var parentDiv = element.parentNode;
        parentDiv.insertBefore(maindiv, element.nextSibling);
    }


    function isObject ( obj ) {
        return obj && (typeof obj  === "object");
    }
    //check if is object and array
    function isArray ( obj ) {
        return isObject(obj) && (obj instanceof Array);
    }

    //to display javascript object as a form
    function outline(obj, element){
        if(isArray(obj)){
            var div2 = document.createElement('div');
            div2.setAttribute('id', 'node2');
            div2.setAttribute('class', 'node');
            element.appendChild(div2);
            for(var x=0; x<obj.length; x++){

                outline(obj[x], div2);

            }
        }

        else {
            var div = document.createElement('div');
            div.setAttribute('class', 'input-group node');
            element.appendChild(div);

            for (var node in obj) {

                if(obj.hasOwnProperty(node)){
                    if(isArray(obj[node])){
                        outline(obj[node], element);
                    }
                    else{

                        var input = document.createElement('input');
                        input.setAttribute('type', 'text');
                        input.setAttribute('class', 'form-control');
                        input.setAttribute('value', obj[node]);
                        div.appendChild(input);
                        div.innerHTML += document.getElementById('buttonStuff').innerHTML;
                    }
                }

            }
        }

    }

    //convert form to javascript object
    function upload(element,array){
        var divArray = childTag(element, "DIV");
        //console.log(divArray);
        var nodeArray = anodeArray(divArray);
        for(var x=0; x<divArray.length; x++){
            if (divArray[x].id === "node2"){
                var newArray = [];
                var i = nodeArray.indexOf(divArray[x-1]);

                upload(divArray[x],newArray);
                array[i].nodes = newArray;
            }
            else{
                var input = childTag(divArray[x], "INPUT");
                var newObj = {};
                newObj.text = input[0].value;
                array.push(newObj);
            }
        }

    }

    //return an array of child with a specific tag
    function childTag(element, tag){
        var childArray = [];
        var children = element.children;
        for(var x=0; x<children.length; x++){
            if (children[x].tagName === tag){
                childArray.push(children[x]);
            }
        }
        return childArray;
    }

    //return an array of divs that do not have node2 id
    function anodeArray(array) {
        var nodeArray = [];
        for(var x=0; x<array.length; x++){
            if (array[x].id !== "node2"){
                nodeArray.push(array[x]);
            }
        }
        return nodeArray;
    }

    //submit
    function test() {
        upload(document.getElementById('mainform').children[0],uploadObj);
        console.log(uploadObj);
        console.log(myobj);
        loadDoc();
        window.location = "http://localhost/projects/eassy/writing.php";
    }

    //upload form
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        /*xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };*/
        xhttp.open("POST", "AJAX/upload_outline.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("obj="+JSON.stringify(uploadObj)+"&id=<?php echo $_SESSION['id'] ?>");
    }
</script>
