<?php

    session_start();
    
        $_SESSION['user_name'] = null;      //YOU SHOULD SET IT TO NULL
        $_SESSION['user_role'] = null;
        $_SESSION['user_id'] = null;

        header("Location: index.php");

/* 'anything' or 1=1 # coz # gives comments thats y all the ahead ones are commented */
?>