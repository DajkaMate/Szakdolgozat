<?php 
    include("Includes/head.php");
    include("Includes/sql.php");
    session_start();
    $user = User();
    include("Includes/user-id.php");
    include("Includes/menu.php");
    include("Includes/nav.php");
    if(isset($_SESSION["USER_ID"]))
    {
        include("Includes/modal-Profile.php");
    }
    else
    {
        include("Includes/modal-login.php");
    }
    echo "<div class='fadein'>";
            include($content);
    echo "</div>";
    include("Includes/footer.php");

