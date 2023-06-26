<?php

$G_ID = $_POST['G_NAME'];
$USERID = $_POST['user_id'];

include("Database.php");
$conn = Connect();

if(isset($_POST['add_bookmark']))
{
    $INSERT = "INSERT INTO bookmarks(U_ID, G_ID)
    Values(?, ?)";
    $stmt = $conn->prepare($INSERT); 
    $stmt->bind_param("is", $USERID, $G_ID);
    $stmt->execute();
}

if(isset($_POST['delete_bookmark']))
{
    $DELETE = "DELETE FROM bookmarks where (U_ID = '$USERID' and G_ID = '$G_ID')";
    $stmt = $conn->prepare($DELETE); 
    $stmt->execute();
}

header("Location: .././?p=GamePage&Game=$G_ID");
?>