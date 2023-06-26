
<?php
    $file = $_FILES['img'];
    $userid = $_POST['userid'];
    $fileName = $_FILES['img']['name'];
    $fileTmpName = $_FILES['img']['tmp_name'];
    $fileSize = $_FILES['img']['size'];
    $fileError = $_FILES['img']['error'];
    $fileType = $_FILES['img']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png'); 
    include("sql.php");
    if($fileSize != 0)
    {
        if(in_array($fileActualExt, $allowed))
        {
            if($fileError === 0)
            {
                if($fileSize < 5242880)
                { 
                    $fileName = $userid.".".$fileActualExt;
                    $fileDestination = "../img/avatar/$fileName";
                    
                    $result = UserByID($userid);
                    $row = mysqli_fetch_assoc($result);

                    $currentavatar = "../img/avatar/".$row["USER_AVATAR"];
                    echo $currentavatar;

                    if($currentavatar !== "../img/avatar/default-avatar.png")
                    {
                        unlink($currentavatar);
                    }                  


                    move_uploaded_file($fileTmpName, $fileDestination);  
                    UserAvatar($fileName, $userid);
                    header("Location: .././");
                }   
                else
                {
                    header("Location: ../?p=EditProfile&error=toolarge");   
                }
            }
            else
            {
                header("Location: ../?p=EditProfile&error=error");    
            } 
        }
        else
        {
            header("Location: ../?p=EditProfile&error=wrongfile"); 
        }  
            
    }
    else
    {
            header("Location: ../?p=EditProfile&error=empty"); 
    }
?>


