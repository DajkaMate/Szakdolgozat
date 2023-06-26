<?php 
    $content = "includes/mainpage.php";
    if (isset($_GET['p']))
    {
        if($_GET['p'] == "GameLibrary")
        {
            $content = "includes/game-library.php";
        }
        if($_GET['p'] == "HardwareCompare")
        {
            $content = "includes/Compare-Hardware.php";
        }
        if($_GET['p'] == "SupportedComponents")
        {   
            $content = "includes/Supported-brands.php";
        }
        if((isset($_GET['CPU']) || isset($_GET['GPU'])) && $_GET['p'] == "SupportedComponents")
        {  
            $content = "includes/Supported-Components.php";
        }
        if($_GET['p'] == "ManageDatabase")
        {   
            if ($user['USER_ADMIN'] == 1)
            {
                $content = "includes/manage-database.php";   
            }
            else if ($user['USER_ADMIN'] == 0)  
            {   
                header("Location: includes/access-denied.php");                            
            }
        }
        if($_GET['p'] == "ManageDatabase/CPU")
        {   
            if ($user['USER_ADMIN'] == 1)
            {
                $content = "includes/manage-database-cpu.php";   
            }
            else if ($user['USER_ADMIN'] == 0)  
            {   
                header("Location: includes/access-denied.php");                            
            }
        }
        if($_GET['p'] == "ManageDatabase/GPU")
        {   
            if ($user['USER_ADMIN'] == 1)
            {
                $content = "includes/manage-database-gpu.php";   
            }
            else if ($user['USER_ADMIN'] == 0)  
            {   
                header("Location: includes/access-denied.php");                            
            }
        }
        if($_GET['p'] == "ManageDatabase/Game")
        {   
            if ($user['USER_ADMIN'] == 1)
            {
                $content = "includes/manage-database-game.php";   
            }
            else if ($user['USER_ADMIN'] == 0)  
            {   
                header("Location: includes/access-denied.php");                            
            }
        }
        if($_GET['p'] == "ManageDatabase/Sys")
        {   
            if ($user['USER_ADMIN'] == 1)
            {
                $content = "includes/manage-database-Sys.php";   
            }
            else if ($user['USER_ADMIN'] == 0)  
            {   
                header("Location: includes/access-denied.php");                            
            }
        }
        if($_GET['p'] == "Users")
        {        
            if ($user['USER_ADMIN'] == 1)
            {
                $content = "includes/Users.php";
            }
            else if ($user['USER_ADMIN'] == 0)  
            {   
                header("Location: includes/access-denied.php");                            
            }
        }
        if($_GET['p'] == "GamePage")
        {   
            $content = "includes/game-page.php";
        }
        if($_GET['p'] == "HardwarePage")
        {   
            $content = "includes/hardware-page.php";
        }
        if($_GET['p'] == "Search")
        {   
            $content = "includes/Search-page.php";
        }
        
        



    
        

              
    }  
?>