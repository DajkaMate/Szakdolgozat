<?php
    if(isset($_GET['search']))
    {
        $search = $_GET['search'];
        $search = ltrim($search);
        if($search != "")
        {
            header("Location: .././?p=Search&Search=$search");
        }
        else
        {
            header("Location: .././");
        }
    }
?>