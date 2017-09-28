<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/26/2017
 * Time: 1:51 PM
 */
?>
<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#RoadMap">The Road Map Introduction</a></li>
    <li><a data-toggle="pill" href="#GS">The General-to-Specific Introduction</a></li>
</ul>

<div class="tab-content">
    <div id="RoadMap" class="tab-pane fade in active">
        <div class="form-group">
            <input id="msg" type="text" class="form-control" placeholder="Thesis (main idea)">
            <textarea class="form-control" onpaste="pasteFunction()" rows="3" placeholder="Reference to each major point of the essay"></textarea>
            <input id="msg" type="text" class="form-control" placeholder="A concluding sentence that returns, in different words, to the thesis">
        </div>
    </div>

    <div id="GS" class="tab-pane fade">
        <div class="form-group">
            <input id="msg" type="text" class="form-control" placeholder="A general statement or background of the topic">
            <textarea class="form-control" onpaste="pasteFunction()" rows="3" placeholder="More specific statements that lead to the thesis"></textarea>
            <input id="msg" type="text" class="form-control" placeholder="Thesis (main idea)">
        </div>
    </div>
</div>



