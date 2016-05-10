<?php

function up() {
    include $_SERVER['DOCUMENT_ROOT'] . '/app/lib/library.php';
    if (!isset($_SESSION['userid']) && $_SESSION['userid'] == '') { // Redirect to secured user page if user logged in
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php
        //esto sirve para detectar una página específica y tomar acción sobre eso.
        //se desactiva por el momento
        if (strpos($_SERVER["REQUEST_URI"], 'uxserxpage.php') !== false) {
            echo "<meta http-equiv='refresh' content='300' />";
        }
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>G-Thux</title>
        <link href="../app/css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="../app/css/jquery.dataTables.min.css"></link>
        <script type="text/javascript" src="../app/js/jquery-1.11.3.min.js"></script>
        <script src="../app/js/scripts.js" type="text/javascript"></script>
        <script type="text/javascript" src="../app/js/jquery.dataTables.min.js"></script>
        <link href="../app/css/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <script src="../app/css/bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    </head>

    <body>

    <?php
    }

function down() {
        ?>    
    </body>
</html>

<?php
}
?>
