<title>Users</title>
<div class="rgb-bg container-fluid ">
    <div class="container pt-5 pb-5">
        <h2 class="text-white fs-1"><i class="bi bi-person-fill"></i>Users</h2>
    </div>
</div>
<div class="container mt-5">
    <table class='table mytable table-responsive table-dark table-hover'>
        <thead>
            <tr>
                <th style='width: 50px !important;'></th>
                <th>ID</th>
                <th class='text-center'>Name</th>
                <th class='text-center'>Email</th>
                <th class='text-center'>Join Date</th>
                <th class='text-center'>Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $result = Users();
                while($row = $result-> fetch_assoc())
                {       
                    $date = $row['USER_DATE'];  
                    $Formatteduserdate = date('Y. M d.',strtotime($date));    

                    echo "
                        <tr class='align-middle'>
                            <td>
                                <img class='rounded-circle' src='img/avatar/$row[USER_AVATAR] ' style='width: 40px; height: 40px'>
                            </td> 
                            <td>#$row[USER_ID]</td>
                            <td class='text-center'>$row[USER_NAME]</td>
                            <td class='text-center'>$row[USER_EMAIL]</td>
                            <td class='text-center'>$Formatteduserdate</td>
                            <td class='text-center'>";
                            
                            if($row['USER_ADMIN'] == 1)
                            {   
                                echo "Admin";
                            }
                }          
            ?>
        </tbody>
    </table>                            
</div>