<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Treeview -->
<script src="treeview/bootstrap-treeview.min.css"></script>

<link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text|Permanent+Marker" rel="stylesheet">

<style>
    textarea {
        resize: none;
        overflow: hidden;
    }

    .navbar-brand {
        font-family: 'Permanent Marker', cursive;
        font-size: 30px;
        padding:15px;
    }

    .navbar-brand {float:none;}

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        background-color: #f8f8f8;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    /*sidenav*/
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        color: #777777;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 20px;
        font-size: 36px;
        margin-left: 50px;
    }



    #main {
        transition: margin-left .5s;
        transition: margin-right .5s;
        padding: 16px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }


    /*To do list*/
    .wordlist {
        box-sizing: border-box;
    }

    /* Remove margins and padding from the list */
    .wordlist ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    /* Style the list items */
    .wordlist ul li {
        cursor: pointer;
        position: relative;
        padding: 12px 8px 12px 40px;
        background: #eee;

        transition: 0.2s;

        /* make the list items unselectable */
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Set all odd list items to a different color (zebra-stripes) */
    .wordlist ul li:nth-child(odd) {
        background: #f9f9f9;
    }

    /* Darker background-color on hover */
    .wordlist ul li:hover {
        background: #ddd;
    }

    /* Style the close button */
    .wordlist .close {
        position: absolute;
        right: 0;
        top: 0;
        padding: 12px 16px 12px 16px;
    }

    .wordlist .close:hover {
        background-color: #f44336;
        color: white;
    }

    /* Style the input */
    .wordlist input {
        width: 75%;
        padding: 5px;
        font-size: 16px;
    }

    /* Style the "Add" button */
    .wordlist .addBtn {
        padding: 7px;
        width: 25%;
        background: #d9d9d9;
        color: #555;
        float: right;
        text-align: center;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .wordlist .addBtn:hover {
        background-color: #bbb;

    .wordlist .add-header{
        margin-bottom: 20px;
    }

</style>
