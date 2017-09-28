<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/7/2017
 * Time: 1:44 PM
 */
?>
<div id="vocabNav" class="sidenav" style="right: 0">
    <a href="javascript:void(0)" class="closebtn" onclick="closeVN()">&times;</a>
    <div id="wordList"></div>
    <a href="#" class="btn" data-toggle="modal" data-target="#myModal">Edit List</a>
</div>

<script type="text/javascript">
    $(function(){
        var mytree = [
            {
                text: 'Parent 1',
                href: '#parent1',
                nodes: [
                    {
                        text: 'Child 1',
                        href: '#child1',
                        tags: ['1'],
                    },
                    {
                        text: 'Child 2',
                        href: '#child2',
                        tags: ['3']
                    }
                ]
            },
            {
                text: 'Parent 2',
                href: '#parent2',
            },
            {
                text: 'Parent 3',
                href: '#parent3',
            }
        ];

        $('#wordList').treeview({
            data: mytree,
            levels: 1,
            color: "#818181",
            showTags: true,
            showBorder: false
        });
    });

    function openVN() {
        document.getElementById("vocabNav").style.width = "200px";
        document.getElementById("main").style.marginRight = "200px";
    }

    function closeVN() {
        document.getElementById("vocabNav").style.width = "0";
        document.getElementById("main").style.marginRight= "auto";
    }
</script>
