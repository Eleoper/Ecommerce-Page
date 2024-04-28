<?php
    session_start();//gets saved variables
    session_destroy();//destroys saved variables
    header("Location: ../user.php");//goes back to login page
?>