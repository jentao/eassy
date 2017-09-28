<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/26/2017
 * Time: 2:05 PM
 */
?>
<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#summary">Summary Conclusion</a></li>
    <li><a data-toggle="pill" href="#speculative">Speculative Conclusion</a></li>
</ul>

<div class="tab-content">
    <div id="summary" class="tab-pane fade in active">
        <div class="form-group">
            <input id="msg" type="text" class="form-control" placeholder="Thesis">
            <textarea class="form-control" onpaste="pasteFunction()" rows="2" placeholder="Major points of the essay"></textarea>
            <input id="msg" type="text" class="form-control" placeholder="End sentence">
        </div>
    </div>

    <div id="speculative" class="tab-pane fade">
        <div class="form-group">
            <input id="msg" type="text" class="form-control" placeholder="Thesis">
            <input id="msg" type="text" class="form-control" placeholder="Short summary of essay">
            <textarea class="form-control" onpaste="pasteFunction()" rows="2" placeholder="New but related point (generalization, speculation, judgement, recommendation)"></textarea>
        </div>
    </div>
</div>
