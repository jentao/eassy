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
    <?php
    $id = $_SESSION['id'];
    $q = "SELECT outline FROM users WHERE id='$id'";
    $result = mysqli_query($dbc,$q);
    $row = mysqli_fetch_array($result);
    ?>
    $(function(){
        var mytree = <?php echo $row[0] ?>
            /*[
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
        ];*/

        $('#outline').treeview({
            data: mytree,
            color: "#818181",
            showBorder: false
        });
    });

    //$(".outlineModel").colorbox({iframe:true, innerWidth:425, innerHeight:344});

</script>


