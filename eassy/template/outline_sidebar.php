<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 9/7/2017
 * Time: 1:21 PM
 */
?>
<div id="outlineNav" class="sidenav" style="left: 0;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeON()">&times;</a>
    <div id="outline"></div>
    <a href="/projects/eassy/outline.php" class="btn">Edit</a>
</div>


<script type="text/javascript">
    $(function(){
        var mytree = [
            {
                text: "Parent 1",
                nodes: [
                    {
                        text: "Child 1",
                        nodes: [
                            {
                                text: "Grandchild 1"
                            },
                            {
                                text: "Grandchild 2"
                            }
                        ]
                    },
                    {
                        text: "Child 2"
                    }
                ]
            },
            {
                text: "Parent 2"
            }
        ];

        $('#outline').treeview({
            data: mytree,
            color: "#818181",
            showBorder: false,
        });
    });

    $(".outlineModel").colorbox({iframe:true, innerWidth:425, innerHeight:344});

    function openON() {
        document.getElementById("outlineNav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeON() {
        document.getElementById("outlineNav").style.width = "0";
        document.getElementById("main").style.marginLeft= "auto";
    }


</script>


