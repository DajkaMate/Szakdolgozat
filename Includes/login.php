<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet"> 
    <link rel="icon" type="image/x-icon" href="../icon.ico">
    <title>Login</title>
</head>
<?php
    include("sql.php");
    $email = ""; 
    $pass = ""; 
    $error = "";
    $invalid = "";
    $mess = array("email" => "", "pass" => "");
    if(isset($_POST["submit"])) 
    { 
        if(empty($_POST["email"]))
        {
            $mess["email"] = "Email missing!";
            $error = true;
        }

        if(empty($_POST["pass"]))
        {
            $mess["pass"] = "Password missing!";
            $error = true;
        }

        if($error == false)
        {
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $pass = hash("md5", $pass);
            $result = CheckUser($email, $pass);
            $user = $result-> fetch_assoc();

            if(mysqli_num_rows($result) > 0)
            {
                ob_start();
                session_start();
                $_SESSION["USER_ID"] = $user["ID"];
            }
            else
            {
                $invalid = "Invalid Login!";
            }
        }

    }
?>
<body class="fadein bg-dark">  
    <div class="container-fluid rgb-bg">
        <div class="signupbg container-fluid">
            <div>
                <a href="../" ><img src="..\img\icon.png" class="d-block mx-auto my-3" style="height: 50px; !important"></a> 
                <h2 class="text-center text-white fs-2 mb-4 Signuptitle">Login to Account</h2>
                <hr class="text-white">
            </div>
            <?php if($invalid == true) 
                {
                    echo "<p class='text-danger text-center fw-bold fs-5'>" . $invalid . "</p>";
                } 
            ?>
            <?php if(isset($_GET['state']) == "success") 
                {
                    echo "<p class='text-success text-center fw-bold fs-5'>Sign Up Successful, now you can log in!</p>";
                } 
            ?>
            <form action="login.php" method="post">                     
                <div class="form-control bg-dark border-0 <?php if($mess['email'] !== "") echo "error"?>">
                    <label class="form-label text-white fs-4">Email Address</label>
			        <input class="form-control" value="<?php echo $email?>" name="email" placeholder="Enter your email address">
                    <?php if($error == true) 
                        {
                            echo "<strong class='text-danger'>".$mess['email']."</strong>";
                        } 
                    ?>
                    <div class="fs-6 text-danger pt-2"></div>
                    <i class="bi bi-check-circle"></i>
			        <i class="bi bi-exclamation-circle"></i>
		        </div>
                <div class="form-control bg-dark border-0 <?php if($mess['email'] !== "") echo "error"?>">
                    <label for="pass" class="form-label text-white fs-4">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Enter your password" > 
                    <?php if($error == true) 
                        {
                            echo "<strong class='text-danger'>".$mess['pass']."</strong>";
                        } 
                    ?>
                    <div class="fs-6 text-danger pt-2"id="lpassword_error"></div>
                    <i class="bi bi-check-circle"></i>
			        <i class="bi bi-exclamation-circle"></i>
                </div>
                <div class="mx-3">
                    <hr class="text-white">
                    <button type="submit" name="submit" class="btn btn-outline-light mb-2 w-100 fs-5">Login</button>
                </div>
                <p class="text-center text-white fs-5">Don't have an account? <a href="signup.php" class="link-light">Sign Up</a></p>      
                <div class="mx-3">
                    
                </div>
            </form>
        </div>
    </div>  
</body>
</Html>