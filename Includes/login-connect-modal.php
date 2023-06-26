<?php    
if (isset($_POST["submit"])) 
{
    include("sql.php");
    $con = Connect();

    $pass = $_POST["Password"];
    $email = $_POST["Email"];
    $pass = hash("md5", $pass);
    $result = CheckUser($email, $pass);
    $user = $result-> fetch_assoc();

    if(mysqli_num_rows($result) > 0)
    {  
        ob_start();
        session_start();
        $_SESSION["USER_ID"] = $user["ID"];
        header('Location: .././');
             
    }
    else
    {   
        header('Location: .././?state=invalid');
    }
}
?>