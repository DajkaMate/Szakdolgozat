<?php
   
    $G_ID = $_GET['Game'];
    $result = GamePage($G_ID);
    $row = $result-> fetch_assoc();
    $Formatteddate = date('Y',strtotime($row['G_DATE'])); 
?>
<title><?php echo $row["G_NAME"]?></title>
<body class="bg-dark">
    <div class="container-fluid" style='background-image: url("img/game-img/game-wide/<?php echo $row['G_WIDE']?>"); background-size: cover; background-position: center;' >
        <div class='container py-5 ' data-aos='fade-up' data-aos-delay='100'>
            <div class="row py-5 d-none d-md-flex">
                <div class="col-3 px-5 px-lg-0 ">
                    <img src='img/game-img/game-cover/<?php echo $row['G_COVER']?>' class='w-100 rounded-4 ' onContextMenu='return false;' ondragstart='return false';>  
                </div>
                <div class="col d-flex align-items-end ms-4">
                    <div class="">
                        <h1 class="fw-bold text-white" style="font-size: 6vw"><?php echo $row['G_NAME']?></h1>
                        <div class="d-flex fw-bold">
                            <p class='text-white fs-4 mb-1 opacity-75'><?php echo $row['G_DEV']?><i class="bi bi-dot"></i></p>
                            <p class='text-white fs-4 mb-1 opacity-75'><?php echo $Formatteddate ?><i class="bi bi-dot"></i></p>
                            <p class='text-white fs-4 mb-1'><a href="./?p=GameLibrary&sort=Genre&Genre=<?php echo $row['G_GENRE']?>"><?php echo $row['G_GENRE']?></a>
                        </div>      
                    </div>
                </div>
                <div class="col-1 d-flex align-items-end me-auto">
                    <div class=" gamepage">      
                        <?php
                            if(isset($user['ID']))
                            {   
                                $result = User();
                                $user = $result-> fetch_assoc();
                                $USERID = $user['ID'];
                                
                                $result = Bookmarks($USERID, $G_ID);
                            
                                if ($result->num_rows == 1)  
                                {                        
                                    $result = $result-> fetch_assoc();     
                                    echo"<form method='post' action='includes/bookmarks.php'>
                                        <button class='btn btn-dark fs-2 py-3' name='delete_bookmark'><i class='bi bi-bookmark-fill '></i></button>
                                        <input type='hidden' name='G_NAME' value='$G_ID'>  
                                        <input type='hidden' name='user_id' value='$USERID'>              
                                    </form>";   
                                } 
                                else 
                                {
                                    echo "<form method='post' action='includes/bookmarks.php'>
                                        <button class='btn btn-dark fs-2 py-3' name='add_bookmark'><i class='bi bi-bookmark'></i></button>  
                                        <input type='hidden' name='G_NAME' value='$G_ID'>        
                                        <input type='hidden' name='user_id' value='$USERID'>         
                                    </form>";     
                                }
                            }
                            else
                            {
                                echo "<button class='btn btn-dark fs-2 py-3' name='add_bookmark' data-bs-toggle='modal' data-bs-target='#LoginOverlay'><i class='bi bi-bookmark'></i></button>"; 
                            }
                        ?>
                    </div> 
                </div>
            </div>       
            <div class="row d-flex d-md-none">
                <div class="">
                    <img src='img/game-img/game-cover/<?php echo $row['G_COVER']?>' class='w-75 rounded-4 d-block mx-auto' onContextMenu='return false;' ondragstart='return false';>  
                </div>
                <div class=" align-items-end">
                    <div class="">
                        <h1 class="fw-bold text-white text-center pt-3" style="font-size: 8vw"><?php echo $row['G_NAME']?></h1>
                        <div class="d-flex fw-bold justify-content-center">
                            <p class='text-white fs-6 mb-1 opacity-75'><?php echo $row['G_DEV']?><i class="bi bi-dot"></i></p>
                            <p class='text-white fs-6 mb-1 opacity-75'><?php echo $Formatteddate ?><i class="bi bi-dot"></i></p>
                            <p class='text-white fs-6 mb-1'><a href="./?p=GameLibrary&sort=Genre&Genre=<?php echo $row['G_GENRE']?>"><?php echo $row['G_GENRE']?></a>
                        </div>      
                    </div>
                </div>
                <div class="col-1">
                    <div class="position-absolute gamepage" style="right: 40px; top: 20px;">      
                        <?php
                            if(isset($user['ID']))
                            {   
                                $result = User();
                                $user = $result-> fetch_assoc();
                                $USERID = $user['ID'];
                                
                                $result = Bookmarks($USERID, $G_ID);
                            
                                if ($result->num_rows == 1)  
                                {                        
                                    $result = $result-> fetch_assoc();     
                                    echo"<form method='post' action='includes/bookmarks.php'>
                                        <button class='btn btn-dark fs-2 py-3' name='delete_bookmark'><i class='bi bi-bookmark-fill '></i></button>
                                        <input type='hidden' name='G_NAME' value='$G_ID'>  
                                        <input type='hidden' name='user_id' value='$USERID'>              
                                    </form>";   
                                } 
                                else 
                                {
                                    echo "<form method='post' action='includes/bookmarks.php'>
                                        <button class='btn btn-dark fs-2 py-3' name='add_bookmark'><i class='bi bi-bookmark'></i></button>  
                                        <input type='hidden' name='G_NAME' value='$G_ID'>        
                                        <input type='hidden' name='user_id' value='$USERID'>         
                                    </form>";     
                                }
                            }
                            else
                            {
                                echo "<button class='btn btn-dark fs-2 py-3' name='add_bookmark' data-bs-toggle='modal' data-bs-target='#LoginOverlay'><i class='bi bi-bookmark'></i></button>"; 
                            }
                        ?>
                    </div> 
                </div>
            </div>       
   
            </div>
        </div>
    </div>
</div>
<div id="results" class="bg-dark container-fluid pt-5 mt-5 pb-5" style="margin-bottom: 100px;">
    <div  class="container" data-aos="fade-up" data-aos-anchor-placement='center-bottom'>
        <div class="p-5 mt-2 rounded-4 " style="background-color: rgba(0, 0, 0, 0.2);">
            <table class="w-100 d-none d-md-table">
                <?php
                    $result = SystemRec($G_ID);
                    $System = $result->fetch_assoc();  
                    $valid = false;
                    if(isset($_POST["gpu"]) && $_POST["gpu"] > 0 && $_POST["cpu"] > 0 && $_POST["ram"] > 0 && $_POST["os"] > 0)
                    {
                        $valid = true;
                    }
                ?>
                <tr class="text-center fs-3 fw-bold">
                    <td class="pb-5">Minimum Specifications</td><td class="pb-5">Minimum Specifications</td>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">Processor</td><td class="fw-bold fs-5">Processor</td>
                </tr>
                <tr>
                    <?php 
                        $result = SystemRecCPU($System["SYS_MIN_CPU_INTEL"]);
                        $cpuminintel = mysqli_fetch_assoc($result);
    
                        $result = SystemRecCPU($System["SYS_MIN_CPU_AMD"]);
                        $cpuminamd = mysqli_fetch_assoc($result);
                        if($valid == false)
                        {
                            echo "<td class='fs-5 opacity-75 pb-3'>
                                    $cpuminintel[CPU_MANUF] $cpuminintel[CPU_BRANDNAME] $cpuminintel[CPU_LINEUP] $cpuminintel[CPU_NAME] or 
                                    $cpuminamd[CPU_MANUF] $cpuminamd[CPU_BRANDNAME] $cpuminamd[CPU_LINEUP] $cpuminamd[CPU_NAME]</td>"; 
                        }
                        else 
                        {
                            $result = GetCPUDataFromId($_POST['cpu']);    
                            $sysmincpu = mysqli_fetch_assoc($result);

                            if($sysmincpu['CPU_PREF'] >= $System['SYS_MIN_GPU_NVIDIA'] || $sysmincpu['CPU_PREF'] >= $System['SYS_MIN_GPU_AMD'])
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> 
                                    $cpuminintel[CPU_MANUF] $cpuminintel[CPU_BRANDNAME] $cpuminintel[CPU_LINEUP] $cpuminintel[CPU_NAME] or 
                                    $cpuminamd[CPU_MANUF] $cpuminamd[CPU_BRANDNAME] $cpuminamd[CPU_LINEUP] $cpuminamd[CPU_NAME]</td>"; 
                            }   
                            else
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> 
                                    $cpuminintel[CPU_MANUF] $cpuminintel[CPU_BRANDNAME] $cpuminintel[CPU_LINEUP] $cpuminintel[CPU_NAME] or 
                                    $cpuminamd[CPU_MANUF] $cpuminamd[CPU_BRANDNAME] $cpuminamd[CPU_LINEUP] $cpuminamd[CPU_NAME]</td>"; 
                            }
                        }
                    ?>
                <?php 
                        $result = SystemRecCPU($System["SYS_REC_CPU_INTEL"]);
                        $cpurecintel = mysqli_fetch_assoc($result);
    
                        $result = SystemRecCPU($System["SYS_REC_CPU_AMD"]);
                        $cpurecamd = mysqli_fetch_assoc($result);
                        
                        if($valid == false)
                        {
                            echo "<td class='fs-5 opacity-75 pb-3'>
                                $cpurecintel[CPU_MANUF] $cpurecintel[CPU_BRANDNAME] $cpurecintel[CPU_LINEUP] $cpurecintel[CPU_NAME] or 
                                $cpurecamd[CPU_MANUF] $cpurecamd[CPU_BRANDNAME] $cpurecamd[CPU_LINEUP] $cpurecamd[CPU_NAME]</td>"; 
                        }
                        else 
                        {
                            $result = GetCPUDataFromId($_POST['cpu']);    
                            $sysmincpu = mysqli_fetch_assoc($result);

                            if($sysmincpu['CPU_PREF'] >= $System['SYS_REC_GPU_NVIDIA'] || $sysmincpu['CPU_PREF'] >= $System['SYS_REC_GPU_AMD'])
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> 
                                    $cpurecintel[CPU_MANUF] $cpurecintel[CPU_BRANDNAME] $cpurecintel[CPU_LINEUP] $cpurecintel[CPU_NAME] or 
                                    $cpurecamd[CPU_MANUF] $cpurecamd[CPU_BRANDNAME] $cpurecamd[CPU_LINEUP] $cpurecamd[CPU_NAME]</td>"; 
                            }   
                            else
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> 
                                    $cpurecintel[CPU_MANUF] $cpurecintel[CPU_BRANDNAME] $cpurecintel[CPU_LINEUP] $cpuminintel[CPU_NAME] or 
                                    $cpurecamd[CPU_MANUF] $cpurecamd[CPU_BRANDNAME] $cpurecamd[CPU_LINEUP] $cpurecamd[CPU_NAME]</td>"; 
                            }
                        }
                    
                    
                    ?>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">Videocard</td><td class="fw-bold fs-5">Videocard</td>
                </tr>
                <tr>
                    <?php   
                        $result = SystemRecGPU($System["SYS_MIN_GPU_NVIDIA"]);
                        $gpuminnvidia = mysqli_fetch_assoc($result);
    
                        $result = SystemRecGPU($System["SYS_MIN_GPU_AMD"]);
                        $gpuminamd = mysqli_fetch_assoc($result);
                        if($valid == false)
                        {
                            echo "<td class='fs-5 opacity-75 pb-3'>
                                $gpuminnvidia[GPU_MANUF] $gpuminnvidia[GPU_BRANDNAME] $gpuminnvidia[GPU_PREFIX] $gpuminnvidia[GPU_NAME] or 
                                $gpuminamd[GPU_MANUF] $gpuminamd[GPU_BRANDNAME] $gpuminamd[GPU_PREFIX] $gpuminamd[GPU_NAME] </td>"; 
                        }
                        else 
                        {
                            $result = GetGPUDataFromId($_POST['gpu']);    
                            $sysmingpu = mysqli_fetch_assoc($result);

                            if($sysmingpu['GPU_PERF'] >= $System['SYS_MIN_GPU_NVIDIA'] || $sysmingpu['GPU_PERF'] >= $System['SYS_MIN_GPU_AMD'])
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> 
                                    $gpuminnvidia[GPU_MANUF] $gpuminnvidia[GPU_BRANDNAME] $gpuminnvidia[GPU_PREFIX] $gpuminnvidia[GPU_NAME] or 
                                    $gpuminamd[GPU_MANUF] $gpuminamd[GPU_BRANDNAME] $gpuminamd[GPU_PREFIX] $gpuminamd[GPU_NAME]</td> "; 
                            }   
                            else
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> 
                                    $gpuminnvidia[GPU_MANUF] $gpuminnvidia[GPU_BRANDNAME] $gpuminnvidia[GPU_PREFIX] $gpuminnvidia[GPU_NAME] or 
                                    $gpuminamd[GPU_MANUF] $gpuminamd[GPU_BRANDNAME] $gpuminamd[GPU_PREFIX] $gpuminamd[GPU_NAME]</td> "; 
                            }
                        }
                    ?>
                    <?php   
                        $result = SystemRecGPU($System["SYS_REC_GPU_NVIDIA"]);
                        $gpurecnvidia = mysqli_fetch_assoc($result);
    
                        $result = SystemRecGPU($System["SYS_REC_GPU_AMD"]);
                        $gpurecamd = mysqli_fetch_assoc($result);

                        if($valid == false)
                        {
                            echo "<td class='fs-5 opacity-75 pb-3'>
                                $gpurecnvidia[GPU_MANUF] $gpurecnvidia[GPU_BRANDNAME] $gpurecnvidia[GPU_PREFIX] $gpurecnvidia[GPU_NAME] or 
                                $gpurecamd[GPU_MANUF] $gpurecamd[GPU_BRANDNAME] $gpurecamd[GPU_PREFIX] $gpurecamd[GPU_NAME]</td> "; 
                        }
                        else
                        {
                            $result = GetGPUDataFromId($_POST['gpu']);    
                            $sysmingpu = mysqli_fetch_assoc($result);

                            if($sysmingpu['GPU_PERF'] >= $System['SYS_REC_GPU_NVIDIA'] || $sysmingpu['GPU_PERF'] >= $System['SYS_REC_GPU_AMD'])
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> 
                                    $gpurecnvidia[GPU_MANUF] $gpurecnvidia[GPU_BRANDNAME] $gpurecnvidia[GPU_PREFIX] $gpurecnvidia[GPU_NAME] or 
                                    $gpurecamd[GPU_MANUF] $gpurecamd[GPU_BRANDNAME] $gpurecamd[GPU_PREFIX] $gpurecamd[GPU_NAME]</td> "; 
                            }
                            else
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> 
                                    $gpurecnvidia[GPU_MANUF] $gpurecnvidia[GPU_BRANDNAME] $gpurecnvidia[GPU_PREFIX] $gpurecnvidia[GPU_NAME] or 
                                    $gpurecamd[GPU_MANUF] $gpurecamd[GPU_BRANDNAME] $gpurecamd[GPU_PREFIX] $gpurecamd[GPU_NAME]</td> "; 
                            }
                        }
                        ?>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">Memory</td><td class="fw-bold fs-5">Memory</td>
                </tr>
                <tr>
                    <?php   
                        if($valid == false)
                        {
                            echo "<td class='fs-5 opacity-75 pb-3'> $System[SYS_MIN_RAM] GB"; 
                        }
                        else
                        {
                            $ram = $_POST['ram'];
                            if($ram >= $System['SYS_MIN_RAM'])
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> $System[SYS_MIN_RAM] GB"; 
                            }
                            else
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> $System[SYS_MIN_RAM] GB"; 
                            }
                        }
                        ?>
                    </td>
                    <?php  
                        if($valid == false)
                        {
                            echo "<td class='fs-5 opacity-75 pb-3'> $System[SYS_REC_RAM] GB"; 
                        }
                        else
                        {
                            $ram = $_POST['ram'];
                            if($ram >= $System['SYS_REC_RAM'])
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> $System[SYS_REC_RAM] GB"; 
                            }
                            else
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> $System[SYS_REC_RAM] GB"; 
                            }
                        }
                        ?>
                   </td>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">OS</td><td class="fw-bold fs-5">OS</td>
                </tr>
                <tr>
                    <?php   
                        $result = SystemOs($System["SYS_OS"]);
                        $sysos = mysqli_fetch_assoc($result);

                        if($valid == false)
                        {
                            echo "<td class='fs-5 opacity-75 pb-3'>$sysos[OS]</td>
                                    <td class='fs-5 opacity-75 pb-3'>$sysos[OS]</td>"; 
                        }
                        else
                        {

                            $result = GetOSDataFromId($_POST['os']);    
                            $os = mysqli_fetch_assoc($result);

                            if($sysos['OS_ORDER'] <= $os['OS_ORDER'])
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> $sysos[OS]</td>
                                <td class='fs-5 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> $sysos[OS]</td>"; 
                            }
                            else
                            {
                                echo "<td class='fs-5 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> $sysos[OS]</td>
                                <td class='fs-5 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> $sysos[OS]</td>"; 
                            }
                        }
                        
                    ?>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">Storage</td><td class="fw-bold fs-5">Storage</td>
                </tr>
                <tr>
                    <td class="fs-5 opacity-75 pb-3"><?php if($System != null) echo $System['SYS_SPACE'] . " GB of space"; else echo "Unavailable";?></td>
                    <td class="fs-5 opacity-75 pb-3"><?php if($System != null) echo $System['SYS_SPACE'] . " GB of space"; else echo "Unavailable";?></td>
                </tr>
            </table>



            <table class="w-100 d-table d-md-none">
                <?php
                    $result = SystemRec($G_ID);
                    $System = $result->fetch_assoc();  
                    $valid = false;
                    if(isset($_POST["gpu"]) && $_POST["gpu"] > 0 && $_POST["cpu"] > 0 && $_POST["ram"] > 0 && $_POST["os"] > 0)
                    {
                        $valid = true;
                    }
                ?>
                <tr class="text-center fs-3 fw-bold">
                    <td class="pb-3 w-100">Minimum Specifications</td><
                </tr>
                <tr>
                    <td class="fw-bold fs-5">Processor</td>
                </tr>
                <tr>
                    <?php 
                        $result = SystemRecCPU($System["SYS_MIN_CPU_INTEL"]);
                        $cpuminintel = mysqli_fetch_assoc($result);
    
                        $result = SystemRecCPU($System["SYS_MIN_CPU_AMD"]);
                        $cpuminamd = mysqli_fetch_assoc($result);
                        if($valid == false)
                        {
                            echo "<td class='fs-6 opacity-75 pb-3'>
                                    $cpuminintel[CPU_MANUF] $cpuminintel[CPU_BRANDNAME] $cpuminintel[CPU_LINEUP] $cpuminintel[CPU_NAME] or 
                                    $cpuminamd[CPU_MANUF] $cpuminamd[CPU_BRANDNAME] $cpuminamd[CPU_LINEUP] $cpuminamd[CPU_NAME]</td>"; 
                        }
                        else 
                        {
                            $result = GetCPUDataFromId($_POST['cpu']);    
                            $sysmincpu = mysqli_fetch_assoc($result);

                            if($sysmincpu['CPU_PREF'] >= $System['SYS_MIN_GPU_NVIDIA'] || $sysmincpu['CPU_PREF'] >= $System['SYS_MIN_GPU_AMD'])
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> 
                                    $cpuminintel[CPU_MANUF] $cpuminintel[CPU_BRANDNAME] $cpuminintel[CPU_LINEUP] $cpuminintel[CPU_NAME] or 
                                    $cpuminamd[CPU_MANUF] $cpuminamd[CPU_BRANDNAME] $cpuminamd[CPU_LINEUP] $cpuminamd[CPU_NAME]</td>"; 
                            }   
                            else
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> 
                                    $cpuminintel[CPU_MANUF] $cpuminintel[CPU_BRANDNAME] $cpuminintel[CPU_LINEUP] $cpuminintel[CPU_NAME] or 
                                    $cpuminamd[CPU_MANUF] $cpuminamd[CPU_BRANDNAME] $cpuminamd[CPU_LINEUP] $cpuminamd[CPU_NAME]</td>"; 
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">Videocard</td>
                </tr>
                <tr>
                    <?php   
                        $result = SystemRecGPU($System["SYS_MIN_GPU_NVIDIA"]);
                        $gpuminnvidia = mysqli_fetch_assoc($result);
    
                        $result = SystemRecGPU($System["SYS_MIN_GPU_AMD"]);
                        $gpuminamd = mysqli_fetch_assoc($result);
                        if($valid == false)
                        {
                            echo "<td class='fs-6 opacity-75 pb-3'>
                                $gpuminnvidia[GPU_MANUF] $gpuminnvidia[GPU_BRANDNAME] $gpuminnvidia[GPU_PREFIX] $gpuminnvidia[GPU_NAME] or 
                                $gpuminamd[GPU_MANUF] $gpuminamd[GPU_BRANDNAME] $gpuminamd[GPU_PREFIX] $gpuminamd[GPU_NAME] </td>"; 
                        }
                        else 
                        {
                            $result = GetGPUDataFromId($_POST['gpu']);    
                            $sysmingpu = mysqli_fetch_assoc($result);

                            if($sysmingpu['GPU_PERF'] >= $System['SYS_MIN_GPU_NVIDIA'] || $sysmingpu['GPU_PERF'] >= $System['SYS_MIN_GPU_AMD'])
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> 
                                    $gpuminnvidia[GPU_MANUF] $gpuminnvidia[GPU_BRANDNAME] $gpuminnvidia[GPU_PREFIX] $gpuminnvidia[GPU_NAME] or 
                                    $gpuminamd[GPU_MANUF] $gpuminamd[GPU_BRANDNAME] $gpuminamd[GPU_PREFIX] $gpuminamd[GPU_NAME]</td> "; 
                            }   
                            else
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> 
                                    $gpuminnvidia[GPU_MANUF] $gpuminnvidia[GPU_BRANDNAME] $gpuminnvidia[GPU_PREFIX] $gpuminnvidia[GPU_NAME] or 
                                    $gpuminamd[GPU_MANUF] $gpuminamd[GPU_BRANDNAME] $gpuminamd[GPU_PREFIX] $gpuminamd[GPU_NAME]</td> "; 
                            }
                        }
                    ?>
                    
                </tr>
                <tr>
                    <td class="fw-bold fs-5">Memory</td>
                </tr>
                <tr>
                    <?php   
                        if($valid == false)
                        {
                            echo "<td class='fs-6 opacity-75 pb-3'> $System[SYS_MIN_RAM] GB</td>"; 
                        }
                        else
                        {
                            $ram = $_POST['ram'];
                            if($ram >= $System['SYS_MIN_RAM'])
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> $System[SYS_MIN_RAM] GB</td>"; 
                            }
                            else
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> $System[SYS_MIN_RAM] GB</td>"; 
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">OS</td>
                </tr>
                <tr>
                    <?php   
                        $result = SystemOs($System["SYS_OS"]);
                        $sysos = mysqli_fetch_assoc($result);

                        if($valid == false)
                        {
                            echo "<td class='fs-6 opacity-75 pb-3'>$sysos[OS]</td>"; 
                        }
                        else
                        {

                            $result = GetOSDataFromId($_POST['os']);    
                            $os = mysqli_fetch_assoc($result);

                            if($sysos['OS_ORDER'] <= $os['OS_ORDER'])
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> $sysos[OS]</td>"; 
                            }
                            else
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> $sysos[OS]</td>"; 
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">Storage</td>
                </tr>
                <tr>
                    <td class="fs-6 opacity-75 pb-3"><?php if($System != null) echo $System['SYS_SPACE'] . " GB of space"; else echo "Unavailable";?></td>
                </tr>
                <tr class="text-center fs-6 pt-3 fw-bold">
                    <td class=" pb-2 ">Recommended Specifications</td>
                </tr>
                <tr>
                    <td class="fw-bold fs-6">Processor</td>
                </tr>
                <tr>
                <?php 
                        $result = SystemRecCPU($System["SYS_REC_CPU_INTEL"]);
                        $cpurecintel = mysqli_fetch_assoc($result);
    
                        $result = SystemRecCPU($System["SYS_REC_CPU_AMD"]);
                        $cpurecamd = mysqli_fetch_assoc($result);
                        
                        if($valid == false)
                        {
                            echo "<td class='fs-6 opacity-75 pb-3'>
                                $cpurecintel[CPU_MANUF] $cpurecintel[CPU_BRANDNAME] $cpurecintel[CPU_LINEUP] $cpurecintel[CPU_NAME] or 
                                $cpurecamd[CPU_MANUF] $cpurecamd[CPU_BRANDNAME] $cpurecamd[CPU_LINEUP] $cpurecamd[CPU_NAME]</td>"; 
                        }
                        else 
                        {
                            $result = GetCPUDataFromId($_POST['cpu']);    
                            $sysmincpu = mysqli_fetch_assoc($result);

                            if($sysmincpu['CPU_PREF'] >= $System['SYS_REC_GPU_NVIDIA'] || $sysmincpu['CPU_PREF'] >= $System['SYS_REC_GPU_AMD'])
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> 
                                    $cpurecintel[CPU_MANUF] $cpurecintel[CPU_BRANDNAME] $cpurecintel[CPU_LINEUP] $cpurecintel[CPU_NAME] or 
                                    $cpurecamd[CPU_MANUF] $cpurecamd[CPU_BRANDNAME] $cpurecamd[CPU_LINEUP] $cpurecamd[CPU_NAME]</td>"; 
                            }   
                            else
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> 
                                    $cpurecintel[CPU_MANUF] $cpurecintel[CPU_BRANDNAME] $cpurecintel[CPU_LINEUP] $cpuminintel[CPU_NAME] or 
                                    $cpurecamd[CPU_MANUF] $cpurecamd[CPU_BRANDNAME] $cpurecamd[CPU_LINEUP] $cpurecamd[CPU_NAME]</td>"; 
                            }
                        }
                    
                    
                    ?>
                </tr>
                <tr>
                    <td class="fw-bold fs-6">Videocard</td>
                </tr>
                <tr>
                <?php   
                        $result = SystemRecGPU($System["SYS_REC_GPU_NVIDIA"]);
                        $gpurecnvidia = mysqli_fetch_assoc($result);
    
                        $result = SystemRecGPU($System["SYS_REC_GPU_AMD"]);
                        $gpurecamd = mysqli_fetch_assoc($result);

                        if($valid == false)
                        {
                            echo "<td class='fs-6 opacity-75 pb-3'>
                                $gpurecnvidia[GPU_MANUF] $gpurecnvidia[GPU_BRANDNAME] $gpurecnvidia[GPU_PREFIX] $gpurecnvidia[GPU_NAME] or 
                                $gpurecamd[GPU_MANUF] $gpurecamd[GPU_BRANDNAME] $gpurecamd[GPU_PREFIX] $gpurecamd[GPU_NAME]</td> "; 
                        }
                        else
                        {
                            $result = GetGPUDataFromId($_POST['gpu']);    
                            $sysmingpu = mysqli_fetch_assoc($result);

                            if($sysmingpu['GPU_PERF'] >= $System['SYS_REC_GPU_NVIDIA'] || $sysmingpu['GPU_PERF'] >= $System['SYS_REC_GPU_AMD'])
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> 
                                    $gpurecnvidia[GPU_MANUF] $gpurecnvidia[GPU_BRANDNAME] $gpurecnvidia[GPU_PREFIX] $gpurecnvidia[GPU_NAME] or 
                                    $gpurecamd[GPU_MANUF] $gpurecamd[GPU_BRANDNAME] $gpurecamd[GPU_PREFIX] $gpurecamd[GPU_NAME]</td> "; 
                            }
                            else
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> 
                                    $gpurecnvidia[GPU_MANUF] $gpurecnvidia[GPU_BRANDNAME] $gpurecnvidia[GPU_PREFIX] $gpurecnvidia[GPU_NAME] or 
                                    $gpurecamd[GPU_MANUF] $gpurecamd[GPU_BRANDNAME] $gpurecamd[GPU_PREFIX] $gpurecamd[GPU_NAME]</td> "; 
                            }
                        }
                        ?>
                </tr>
                <tr>
                    <td class="fw-bold fs-6">Memory</td>
                </tr>
                <tr>
                <?php  
                        if($valid == false)
                        {
                            echo "<td class='fs-6 opacity-75 pb-3'> $System[SYS_REC_RAM] GB"; 
                        }
                        else
                        {
                            $ram = $_POST['ram'];
                            if($ram >= $System['SYS_REC_RAM'])
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> $System[SYS_REC_RAM] GB"; 
                            }
                            else
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> $System[SYS_REC_RAM] GB"; 
                            }
                        }
                        ?>
                </tr>
                <tr>
                    <td class="fw-bold fs-6">Os</td>
                </tr>
                <tr>
                    <?php   
                        $result = SystemOs($System["SYS_OS"]);
                        $sysos = mysqli_fetch_assoc($result);

                        if($valid == false)
                        {
                            echo "<td class='fs-6 opacity-75 pb-3'>$sysos[OS]</td>"; 
                        }
                        else
                        {

                            $result = GetOSDataFromId($_POST['os']);    
                            $os = mysqli_fetch_assoc($result);

                            if($sysos['OS_ORDER'] <= $os['OS_ORDER'])
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-success'><i class='bi bi-check-circle'></i> $sysos[OS]</td>"; 
                            }
                            else
                            {
                                echo "<td class='fs-6 opacity-75 pb-3 text-danger'><i class='bi bi-exclamation-circle'></i> $sysos[OS]</td>"; 
                            }
                        }
                    ?>
                    <tr>
                        <td class="fw-bold fs-5">Storage</td>
                    </tr>
                    <tr>
                        <td class="fs-6 opacity-75 pb-3"><?php if($System != null) echo $System['SYS_SPACE'] . " GB of space"; else echo "Unavailable";?></td>
                    </tr>
                <tr>
                </tr>
            </table>
            <form action='' method='post'>
                <input type="hidden" name='game' value='<?php echo $G_NAME?>'>
                <div class="mx-auto row justify-content-center g-2 my-3">
                    <?php
                        if(isset($_POST["compare"]) && $valid == false)
                        {
                            echo "<h1 class='text-center text-danger fs-5'>Please select your hardware!</h1>";
                        }
                    ?>
                    <div class="col-md-6">
                        <div class="row g-2">
                            <div class="">
                                <select class="form-select" name='gpu'>
                                    <option selected hidden value='0'>Select your GPU</option>
                                        <?php
                                            $result = AllGpu();
                                            if ($result->num_rows > 0) 
                                            { 
                                                while($row = $result-> fetch_assoc())
                                                {
                                                    echo"<option";
                                                        if(isset($_POST['gpu']) && $_POST['gpu'] == $row["GPU_ID"])
                                                        {
                                                            echo " selected "; 
                                                        }
                                                    echo " value='$row[GPU_ID]'>$row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME] $row[GPU_MEM] GB</option>";
                                                }
                                            }
                                        ?> 
                                </select>           
                            </div>    
                            <div class="">
                                <select class=" form-select" name='cpu'>
                                    <option selected hidden value='0'>Select your CPU</option>
                                        <?php  
                                            $result = AllCpu();
                                            if ($result->num_rows > 0) 
                                            {   
                                                while($row = $result-> fetch_assoc())
                                                {
                                                    echo"<option";
                                                        if(isset($_POST['cpu']) && $_POST['cpu'] == $row["CPU_ID"])
                                                        {
                                                            echo " selected "; 
                                                        }
                                                    echo " value='$row[CPU_ID]'> $row[CPU_MANUF] $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME]</option>";
                                                }
                                            }
                                        ?>
                                </select>         
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row g-2">
                            <div class="">
                                <select class="form-select" name='os'>
                                    <option selected hidden value='0'>Select your OS</option>
                                        <?php
                                            $result = AllOs();
                                            if ($result->num_rows > 0) 
                                            {   
                                                while($row = $result-> fetch_assoc())
                                                {
                                                    echo"<option";
                                                        if(isset($_POST['os']) && $_POST['os'] == $row["OS_ORDER"])
                                                        {
                                                            echo " selected "; 
                                                        }
                                                        echo " value='$row[OS_ORDER]'>$row[OS]</option>";
                                                }
                                            }  
                                        ?>
                                </select>
                            </div>
                        <div class="">
                            <select class="form-select" name='ram'>  
                                <option selected hidden value='0'>Select your RAM</option> 
                                    <?php
                                        $result = AllRam();
                                        if ($result->num_rows > 0) 
                                        {   
                                            while($row = $result-> fetch_assoc())
                                            {
                                                echo"<option";
                                                    if(isset($_POST['ram']) && $_POST['ram'] == $row["RAM_GB"])
                                                    {
                                                        echo " selected "; 
                                                    }
                                                echo " value='$row[RAM_GB]'>$row[RAM_GB] GB</option>";
                                            }
                                        }  
                                    ?>            
                            </select>   
                            </div> 
                        </div>    
                    </div>
                    <div class="col-md-3 ">
                        <div class="row g-2">
                            <div class=""><button type='submit' name="compare" class="btn btn-outline-light w-100">Compare</button></div>
                            <div class=""><button class="btn btn-outline-light w-100">Save Setup</button></div>
                        </div>
                    </div>
            </form>
        </div>
            
        </div>
    </div>
    
