<!DOCTYPE html>
<html lang="en">
    <?php  
    session_start(); 
    include("head.php");?>
    <title>Access Denied!</title>
<body>
    <div class="bg-dark" style="height: 100vh;">
            <h1 class="text-danger display-1 text-center" style="padding-top: 200px;">Acces Denied!</h1>
            <p class="fs-1 text-center text-white">This page is for admins only!</p>
            <p class="fs-1 text-center pt-3 text-white">Return to <a href=".././" class="">front page</a>.</p>
    </div>
</body>
</Html>