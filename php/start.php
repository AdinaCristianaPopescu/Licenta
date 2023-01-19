<?php
    session_start();
    if(!isset($_SESSION['stud'])){
        header('Location: autentificare.php');
        exit;
    } else {
        // Show users the page!
    }
?>