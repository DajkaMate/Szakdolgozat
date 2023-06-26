<?php
if (isset($_SESSION["USER_ID"]))
{    
    $result = User();
    $user = $result->fetch_assoc();
}
?>