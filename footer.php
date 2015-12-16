<?php
    session_unset(); 
    unset($_SESSION['userId']);
    session_destroy();
    Print '<script>window.location.assign("index.php");</script>';
?>