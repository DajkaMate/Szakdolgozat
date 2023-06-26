<?php   
    if(isset($_GET['GPU']))
    {
        $manuf = $_GET['GPU'];
        $type = "GPU";
    }

    if(isset($_GET['CPU']))
    {
        $manuf = $_GET['CPU'];
        $type = "CPU";
    }

?>
<title>Supported <?php echo $manuf?> <?php echo $type?>-s</title>
<div class="rgb-bg container-fluid">
    <div class="container py-5 mobile-header" data-aos='fade-in'>
        <h2 class='text-white fs-1 pb-1'>
            <?php if($type == 'GPU') echo "<i class='bi bi-gpu-card pe-2'></i>"; if($type == 'CPU') echo "<i class='bi bi-cpu pe-2'></i>"; ?>Supported <?php echo $manuf?> <?php echo $type?>-s</h2>
        <p class='text-white fs-4'>Browse all hardware components currently supported in our database.</p>
    </div>
</div>
<div class="pb-3 bg-dark container-fluid pt-5 pb-5">
    <div class="container py-5">
    <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php
                $index = 1;
                if($type == 'GPU')
                {   
                    $result2 = GPUSeries($manuf);
                    while($row2 = $result2-> fetch_assoc())
                    {
                        $gen = $row2['GPU_GEN'];
                        echo "
                            <div class='accordion-item border-0 bg-dark pb-1'>
                                <h2 class='accordion-header' id='flush-heading$index'>
                                    <button class='bg-dark accordion-btn collapsed text-white w-100 border-0 fs-4 text-start p-3 rounded-3 collapsed text-white' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse$index' aria-expanded='false' aria-controls='flush-collapse$index'>
                                     $row2[GPU_GEN] Series
                                    </button>
                                </h2>
                                <div id='flush-collapse$index' class='accordion-collapse collapse"; if($index == 1) echo " show ";  echo "' aria-labelledby='flush-heading$index' data-bs-parent='#accordionFlushExample'>
                                    <div class='accordion-body'>";

                                    echo "
                                    <table class='table w-100 d-none d-md-table table-hover table-dark'>
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th class='text-center'>Memory Config</th>
                                                    <th class='text-center'>Memory Type</th>
                                                    <th class='text-center'>Memory Interface Width</th>
                                                    <th class='text-center'>Base Clock</th>
                                                    <th class='text-center'>Boost Clock</th>
                                                </tr>
                                            </thead>
                                        <tbody>";
                                    
                                            $result3 = GPUSeriesData($gen, $manuf);
                                            while($row3 = $result3-> fetch_assoc())
                                            {    
                                                echo "<td style='width: 240px;'><a class='text-decoration-none' href='?p=HardwarePage&GPU=$row3[GPU_ID]'>$row3[GPU_BRANDNAME] $row3[GPU_PREFIX] $row3[GPU_NAME]</a></td>
                                                    <td class='text-center'>$row3[GPU_MEM] GB</td>
                                                    <td class='text-center'>$row3[GPU_MEMTYPE]</td>
                                                    <td class='text-center'>$row3[GPU_BIT]-bit</td>
                                                    <td class='text-center'>$row3[GPU_BASE] MHz</td>
                                                    <td class='text-center'>";
                                                    if ($row3['GPU_BOOST'] == 0)
                                                    {
                                                        echo "-";
                                                    }
                                                    else
                                                    {
                                                        echo $row3['GPU_BOOST'] . " MHz";
                                                    }
                                                    echo"</td>
                                                   
                                                </tr>";
                                            }    
                                        
                                            echo "
                                        </tbody>
                                    </table>";
                               
                                            $result3 = GPUSeriesData($gen, $manuf);
                                            while($row3 = $result3-> fetch_assoc())
                                            {
                                                echo "<table class='table d-table d-md-none table-hover table-dark mb-5'>";
                                                echo "<tr>
                                                        <th style='width: 40%'>Name</th> 
                                                        <td style=''><a class='text-decoration-none' href='?p=HardwarePage&GPU=$row3[GPU_ID]'>$row3[GPU_BRANDNAME] $row3[GPU_PREFIX] $row3[GPU_NAME]</a>
                                                    </tr>
                                                    <tr>
                                                        <th class=''>Memory Type</th>
                                                        <td class=''>$row3[GPU_MEM] GB</td>
                                                    </tr>
                                                        <th class=''>Memory Interface Width</th>
                                                        <td class=''>$row3[GPU_MEMTYPE]</td>
                                                    </tr>
                                                    <tr>
                                                        <th class=''>Base Clock</th>
                                                        <td class=''>$row3[GPU_BIT]-bit</td>
                                                    </tr>
                                                    <tr>
                                                        <th class=''>Boost Clock</th>
                                                        <td class=''>$row3[GPU_BASE] MHz</td>";
                                                    echo "</table>";

                                            }
                                           
                        echo "</div></div></div>";
                        $index++; 
                    }
                }

                if($type == 'CPU')
                {   
                    $result2 = CPUSeries($manuf);
                    while($row2 = $result2-> fetch_assoc())
                    {
                        $gen = $row2['CPU_GEN'];
                        echo "
                            <div class='accordion-item border-0 bg-dark pb-1'>
                                <h2 class='accordion-header' id='flush-heading$index'>
                                    <button class='bg-dark accordion-btn collapsed text-white w-100 border-0 fs-4 text-start p-3 rounded-3 collapsed text-white' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse$index' aria-expanded='false' aria-controls='flush-collapse$index'>
                                     $row2[CPU_GEN] Series
                                    </button>
                                </h2>
                                <div id='flush-collapse$index' class='accordion-collapse collapse' aria-labelledby='flush-heading$index' data-bs-parent='#accordionFlushExample'>
                                    <div class='accordion-body'>";
                                    echo "
                                    <table class='table mytable table-responsive table-hover table-dark'>
                                        <h1 class='text-white fs-1'></h1>
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th class='text-center'>Base clock speed</th>
                                                    <th class='text-center'>Boost clock speed</th>
                                                    <th class='text-center'>Cores</th>
                                                    <th class='text-center'>Threads</th>
                                                    <th class='text-center'>Integrated graphics</th>
                                                </tr>
                                            </thead>
                                        <tbody>";
                                    
                                            $result3 = CPUSeriesData($gen, $manuf);
                                            while($row3 = $result3-> fetch_assoc())
                                            {    
                                                echo "<td style='width: 240px;'><a class='text-decoration-none' href='?p=HardwarePage&CPU=$row3[CPU_ID]'>$row3[CPU_BRANDNAME] $row3[CPU_LINEUP] $row3[CPU_NAME]</a></td>
                                                    <td class='text-center'>$row3[CPU_FREQ] MHz</td>
                                                    <td class='text-center'>";
                                                    
                                                    if ($row3['CPU_BOOST'] == 0)
                                                    {
                                                        echo "-</td>";
                                                    }
                                                    else
                                                    {
                                                        echo $row3['CPU_BOOST'] . " MHz</td>";
                                                    }
                                                    
                                                    echo "
                                                    <td class='text-center'>$row3[CPU_CORES]</td>
                                                    <td class='text-center'>$row3[CPU_THREADS]</td>
                                                    <td class='text-center'>";

                                                    if ($row3['CPU_GRAPHICS'] == null)
                                                    {
                                                        echo "-</td>";
                                                    }
                                                    else
                                                    {
                                                        echo $row3['CPU_GRAPHICS'] . " MHz</td>";
                                                    }

                                                
                                                echo "</tr>";
                                            }    
                                        
                                            echo "
                                        </tbody>
                                    </table>";
                        echo "</div></div></div>";
                        $index++; 
                    }
                }

                if($type == '1234')
                {   
                    $result2 = CPUSeries($manuf);
                    while($row2 = $result2-> fetch_assoc())
                    {
                        echo "
                            <div class='accordion-item border-0 bg-dark pb-1'>
                                <h2 class='accordion-header' id='flush-heading$index'>
                                    <button class='bg-dark accordion-btn collapsed text-white w-100 border-0 fs-4 text-start p-3 rounded-3 collapsed text-white' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse$index' aria-expanded='false' aria-controls='flush-collapse$index'>
                                    $row2[CPU_BRANDNAME] $row2[CPU_LINEUP] Series
                                    </button>
                                </h2>
                                <div id='flush-collapse$index' class='accordion-collapse collapse' aria-labelledby='flush-heading$index' data-bs-parent='#accordionFlushExample'>
                                    <div class='accordion-body'>";

                                    echo "
                                    <table class='table mytable table-responsive table-hover table-dark'>
                                        <h1 class='text-white fs-1'></h1>
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th class='text-center'>Base clock speed</th>
                                                    <th class='text-center'>Boost clock speed</th>
                                                    <th class='text-center'>Cores</th>
                                                    <th class='text-center'>Threads</th>
                                                    <th class='text-center'>Integrated graphics</th>
                                                </tr>
                                            </thead>
                                        <tbody>";
                                    
                                            $result3 = CPUSeriesData($lineup, $manuf);
                                            while($row3 = $result3-> fetch_assoc())
                                            {    
                                                echo "<td style='width: 240px;'><a class='text-decoration-none' href='?p=HardwarePage&CPU=$row3[CPU_ID]'>$row3[CPU_BRANDNAME] $row3[CPU_LINEUP] $row3[CPU_NAME]</a></td>
                                                    <td class='text-center'>$row3[CPU_FREQ] MHz</td>
                                                    <td class='text-center'>";
                                                    
                                                    if ($row3['CPU_BOOST'] == 0)
                                                    {
                                                        echo "-</td>";
                                                    }
                                                    else
                                                    {
                                                        echo $row3['CPU_BOOST'] . " MHz</td>";
                                                    }
                                                    
                                                    echo "
                                                    <td class='text-center'>$row3[CPU_CORES]</td>
                                                    <td class='text-center'>$row3[CPU_THREADS]</td>
                                                    <td class='text-center'>";

                                                    if ($row3['CPU_GRAPHICS'] == null)
                                                    {
                                                        echo "-</td>";
                                                    }
                                                    else
                                                    {
                                                        echo $row3['CPU_GRAPHICS'] . " MHz</td>";
                                                    }

                                                
                                                echo "</tr>";
                                            }    
                                        
                                            echo "
                                        </tbody>
                                    </table>";
                        echo "</div></div></div>";
                        $index++; 
                    }
                }
                
            ?>  
    </div>
</div>

