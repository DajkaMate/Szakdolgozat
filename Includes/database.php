<?php
    function Connect()
    {
        $SERVER = "Localhost";
        $user = "root";
        $password = "";
        $db= "can_you_run_it";

        $conn = mysqli_connect($SERVER, $user, $password, $db);
        if(!$conn)
        {
            die("Connection Error");
        }
        return $conn;   
    }   
?>