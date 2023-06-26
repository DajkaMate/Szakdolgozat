<div class="rgb-bg container-fluid ">
    <div class="container pt-5 pb-5">
        <h2 class="text-white fs-1"><i class="bi bi-search pe-2"></i>Search results</h2>
    </div>
</div>
<div class="container">
    <div class="row pb-5 mb-5">
        <?php
            $search = $_GET['Search'];
            echo "<title>Results for '$search'</title>";
            $result = GameSearch($search);
            $result2 = GPUSearch($search);
            $result3 = CPUSearch($search);
            if ($result->num_rows > 0 || $result2->num_rows > 0 || $result3->num_rows > 0)  
            {
                if ($result->num_rows > 0)
                {   
                    echo "<h1 class='text-white fs-1 pt-5'>Games</h1>";
                    $aos = 0;
                    while($games = $result-> fetch_assoc())
                    {
                        $gamedate = $games['G_DATE'];
                        $todaydate = date('Y-m-d H:i:s');
                        $calculate_seconds =  strtotime($todaydate) - strtotime($gamedate);
                        $day = floor($calculate_seconds / (24 * 60 * 60));  
                                                    
                        echo"<div class='col-6 col-md-6 col-lg-4 col-xl-2 gamecard px-0' data-aos='fade-up' data-aos-delay='$aos' data-aos-anchor-placement='top-bottom'>
                                <a href='?p=GamePage&Game=$games[G_ID]' class='card card-bg border-0 rounded-4 p-3 text-decoration-none' >
                                    <img data-tilt data-tilt-scale='1.03' class='w-100 rounded-3' src='img/game-img/game-cover/$games[G_COVER]' onContextMenu='return false;' ondragstart='return false';>";              
                                        if ($day < 30)
                                        {
                                            echo "  <span class='position-absolute translate-middle badge rounded-2 bg-danger p-2 fs-5' style='top: 18px; left: 230px;'>NEW</span>";
                                        }   
                                                            
                                echo"<div class='card-body ps-0 pb-0'>
                                        <h4 class='text-start fs-5 card-title text-white p-0 '>$games[G_NAME]</h4>                                    
                                    </div>
                                </a>
                        </div>";  
                        $aos = $aos + 50;  
                    }
                }
                if ($result2->num_rows > 0)
                {
                    echo "<h1 class='text-white fs-1 pt-5'>GPU-s</h1>";
                    $aos = 0;
                    while($HW = $result2-> fetch_assoc())
                    {
                        $gpudate = $HW['GPU_DATE'];
                        $todaydate = date('Y-m-d H:i:s');

                        $calculate_seconds =  strtotime($todaydate) - strtotime($gpudate);
                        $day = floor($calculate_seconds / (24 * 60 * 60));  
                                                    
                        echo"<div class='col-6 col-md-6 col-lg-4 col-xl-2 gamecard px-0' data-aos='fade-up' data-aos-delay='$aos' data-aos-anchor-placement='top-bottom'>
                        <a href='?p=HardwarePage&GPU=$HW[GPU_ID]' class='card card-bg border-0 rounded-4 p-3 text-decoration-none' style='height: 250px !important;'>
                        <img data-tilt data-tilt-scale='1.03' class='w-100 rounded-3' src='$HW[GPU_IMG]' onContextMenu='return false;' ondragstart='return false';>";
                                                    
                        if ($day < 30)
                        {
                            echo "  <span class='position-absolute translate-middle badge rounded-2 bg-danger p-2 fs-5' style='top: 18px; left: 230px;'>NEW</span>";
                        }   
                                                            
                        echo"<div class='card-body ps-0 pb-0'>
                        <h4 class='text-start fs-5 card-title text-white p-0 '>$HW[GPU_MANUF] $HW[GPU_BRANDNAME] $HW[GPU_NAME]</h4>                                    
                        </div>
                        </a>
                        </div>";  
                        $aos = $aos + 50;
                    }
                }

                if ($result3->num_rows > 0)
                {

                    echo "<h1 class='text-white fs-1 pt-5'>CPU-s</h1>";
                    $aos = 0;
                    while($HW2 = $result3-> fetch_assoc())
                    {
                        $cpudate = $HW2['CPU_DATE'];
                        $todaydate = date('Y-m-d H:i:s');

                        $calculate_seconds =  strtotime($todaydate) - strtotime($cpudate);
                        $day = floor($calculate_seconds / (24 * 60 * 60));  
                                                    
                        echo"<div class='col-6 col-md-6 col-lg-4 col-xl-2 gamecard px-0' data-aos='fade-up' data-aos-delay='$aos' data-aos-anchor-placement='top-bottom' style='min-width: 264px;'>
                        <a href='?p=HardwarePage&CPU=$HW2[CPU_ID]' class='card card-bg border-0 rounded-4 p-3 text-decoration-none' style='height: 250px !important;'>
                        <img data-tilt data-tilt-scale='1.03' class='w-100 rounded-3' src='$HW2[CPU_IMG]' onContextMenu='return false;' ondragstart='return false';>";
                                                    
                        if ($day < 30)
                        {
                            echo "  <span class='position-absolute translate-middle badge rounded-2 bg-danger p-2 fs-5' style='top: 18px; left: 230px;'>NEW</span>";
                        }   
                                                            
                        echo"<div class='card-body ps-0 pb-0'>
                        <h4 class='text-start fs-5 card-title text-white p-0 '>$HW2[CPU_MANUF] $HW2[CPU_BRANDNAME] $HW2[CPU_NAME]</h4>                                    
                        </div>
                        </a>
                        </div>";  
                        $aos = $aos + 50;
                    }
                }
            }
            else
            {
                echo "<h1 class='text-white fs-2 pt-5 text-center'>No results for '$search'</h1>";
            }
        ?>
    </div>
</div>
