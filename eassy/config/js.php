<!-- Font -->
<script src="https://use.fontawesome.com/c1d4b38cd6.js"></script>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Treeview -->
<script src="treeview/bootstrap-treeview.min.js"></script>

<script>
    function pasteFunction() {
        $("#citeModal").modal();
    }

    function intro_type(type, part){
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "AJAX/type.php?type="+type+"&part="+part+"&id=<?php echo $_SESSION['id'] ?>", true);
        xhttp.send();
    }

    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }
</script>