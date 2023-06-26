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
    <title>Sing up</title>
</head>
<?php
    include("sql.php");
    $name = ""; 
    $email = ""; 
    $pass = ""; 
    $confirmpass = "";
    $error = "";
    $mess = array("name" => "", "email" => "", "pass" => "", "confirmpass" => "");
    if(isset($_POST["submit"])) 
    {  
        if(empty($_POST["name"]))
        {
            $mess["name"] = "Name missing!";
            $error = true;
        }
        else
        {
            $name = $_POST["name"];
            $namecheck = UserNameCheck($name);
            if(mysqli_num_rows($namecheck) > 0)
            {
                $mess['name'] = "Name already Taken!";
                $error = true;
            }
            if (!preg_match("$\S*(?=\S{6,})(?=\S*[a-z])\S*$",$name)) 
            {
                $mess["name"] = "Name must contain at least 6 characters, and at least 1 letter!";
                $error = true;
            }
        }

        if(empty($_POST["email"]))
        {
            $mess["email"] = "Email missing!";
            $error = true;
        }
        else
        {
            $email = $_POST["email"];
            if (!preg_match_all("/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/",$email)) 
            {
                $mess["email"] = "Enter a valid Email!";
                $error = true;
            }
            $emailcheck = UserEmailCheck($email);
            if(mysqli_num_rows($emailcheck) > 0)
            {
                $mess['email'] = "Email already in use!";
                $error = true;
            }
        }

        if(empty($_POST["pass"]))
        {
            $mess["pass"] = "Password missing!";
            $error = true;
        }
        else
        {
            $pass = $_POST["pass"];
            if (!preg_match("$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[\d])\S*$",$pass)) 
            {
                $mess["pass"] = "Password must contain at least 8 characters, and at least 1 number!";
                $error = true;
            }
        }

        if(empty($_POST["confirmpass"]))
        {
            $mess["confirmpass"] = "Repeat password missing!";
            $error = true;
        }
        else
        {
            $confirmpass = $_POST["confirmpass"];
            if($pass !== $confirmpass) 
            {
                $mess["confirmpass"] = "Passwords doesn't match!";
                $error = true;
            }
        }

        if($error == false)
        {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $pass = hash("md5", $pass);
            AddUser($name, $email, $pass);
            header("Location: login.php?state=success");
        }
    }
?>
<body class="fadein bg-dark">  
    <div class="rgb-bg container-fluid">
        <div class="signupbg container-fluid">
            <div>
                <a href="../" ><img src="..\img\icon.png" class="d-block mx-auto my-3" style="height: 50px; !important"></a> 
                <h2 class="text-center text-white fs-2 mb-4 Signuptitle">Register Account</h2>
                <hr class="text-white">  
            </div>
                <form action="signup.php" method="post">
                    <div class="form-control bg-dark border-0 <?php if($mess['name'] !== "") echo "error"?>">
                        <label for="name" class="form-label text-white fs-4">How can we call you?</label>
                        <input class="form-control mb-1 " name="name" value="<?php echo $name?>" placeholder="Enter a Nickname"/>
                        <?php if($error == true) 
                            {
                                echo "<strong class='text-danger'>".$mess['name']."</strong>";
                            } 
                        ?>
                        <i class="bi bi-check-circle"></i>
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <div class="form-control bg-dark border-0 <?php if($mess['email'] !== "") echo "error"?>">
                        <label for="email" class="form-label text-white fs-4">Email Address</label>
                        <input  class="form-control mb-1 " name="email" type="text" value="<?php echo $email?>" placeholder="Enter your email adress" />
                        <?php if($error == true) 
                            {
                                echo "<strong class='text-danger'>".$mess['email']."</strong>";
                            } 
                        ?>
                        <i class="bi bi-check-circle"></i>
                        <i class="bi bi-exclamation-circle"></i>   
                    </div>
                    <div class="form-control bg-dark border-0 <?php if($mess['pass'] !== "") echo "error"?>">
                        <label for="pass" class="form-label text-white fs-4">Password</label>
                        <input class="form-control mb-1" name="pass" type="password"  placeholder="Enter a password"  />
                        <?php if($error == true) 
                            {
                                echo "<strong class='text-danger'>".$mess['pass']."</strong>";
                            } 
                        ?>
                        <i class="bi bi-check-circle"></i>
                        <i class="bi bi-exclamation-circle"></i> 
                    </div>
                    <div class="form-control bg-dark border-0 <?php if($mess['confirmpass'] !== "") echo "error"?>">
                        <label for="comfirmpass" class="form-label text-white fs-4">Confirm Password</label>
                        <input type="password"class="form-control mb-1"  name="confirmpass" placeholder="Enter a password again" />
                        <?php if($error == true) 
                            {
                                echo "<strong class='text-danger'>".$mess['confirmpass']."</strong>";
                            } 
                        ?>
                        <i class="bi bi-check-circle"></i>
                        <i class="bi bi-exclamation-circle"></i>
                    </div>       
                    <div class="form-control bg-dark border-0">
                    <hr class="text-white"> 
                    <button type="submit" name="submit" class="btn btn-outline-light w-100 fs-5 mb-2">Sign Up</button>
                </form> 
                    <p class="text-center text-white pt-3 fs-5">Already have an account? <a href="login.php" class="link-light">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</Html>