<?php
if(isset($_GET['action'])){
    if($_GET['action'] == 'disconnect'){
        session_destroy();
        header('location:index.php');
        exit;
    }        
}

