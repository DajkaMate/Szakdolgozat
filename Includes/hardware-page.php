
<body>
    <div class="rgb-bg container-fluid mobile-header">
        <div class="container py-5">
    <?php 
                         
    if (isset($_GET['GPU']))
    {
        $id = $_GET['GPU'];
        $type = "GPU";
        $result = GetHardware($type, $id);
        $row = $result-> fetch_assoc(); 
        echo " <h2 class='text-white fs-1'><i class='bi bi-gpu-card pe-2'></i> $row[GPU_MANUF]  $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME]</h2>";    
        echo "<title>$row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME]</title>";
    }
    if (isset($_GET['CPU']))
    {
        $id = $_GET['CPU'];
        $type = "CPU";
        $result = GetHardware($type, $id);
        $row = $result-> fetch_assoc(); 
        echo " <h2 class='text-white fs-1'><i class='bi bi-cpu pe-2'></i> $row[CPU_MANUF] $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME]</h2>";
        echo "<title>$row[CPU_MANUF] $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME]</title>";
    }

    ?>
        </div>
    </div>
    <div class="bg-dark container-fluid ">
        <div class="container py-3">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <?php 
                        if($type == "GPU")
                        {
                            echo "<img class=' img-fluid w-100' src='$row[GPU_IMG]' alt=''onContextMenu='return false;' ondragstart='return false'>";
                        }
                        if($type == "CPU")
                        {
                            echo "<img class=' img-fluid w-100' src='$row[CPU_IMG]' alt='' onContextMenu='return false;' ondragstart='return false'>";
                        }
                    ?>
                </div>
                <div class="col-lg-8">
                <?php 
                    if($type == "GPU")
                    {
                        
                        echo "<p class='text-white fs-5'>The $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME] is ";
                        if($row['GPU_LEVEL'] == 1)
                        {
                            echo "an enthusiast-class ";
                        }
                        else if($row['GPU_LEVEL'] == 2)
                        {
                            echo "a high-end ";
                        }
                        else if($row['GPU_LEVEL'] == 3)
                        {
                            echo "a performance-segment ";
                        }
                        else if($row['GPU_LEVEL'] == 4)
                        {
                            echo "a mid-range ";
                        }
                        else if($row['GPU_LEVEL'] == 5)
                        {
                            echo "an entry level ";
                        }

                        $formatteddate = date('F d. Y',strtotime($row['GPU_DATE']));
                        echo "graphics card by $row[GPU_MANUF], launched on $formatteddate. The card supports $row[GPU_DIRECTX], This ensures that all modern games will run";
                        

                        echo " on $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME]. ";
                        

                        if(strpos($row['GPU_BRANDNAME'], "RTX") == true)
                        {
                            echo " Additionally, the $row[GPU_DIRECTX] capability guarantees support for hardware-raytracing, variable-rate shading and more, in upcoming video games. ";
                        }
                        
                        echo "$row[GPU_MANUF] has paired $row[GPU_MEM]GB $row[GPU_MEMTYPE] memory with the $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME], which are connected using a $row[GPU_BIT]-bit memory interface. The GPU is operating at a frequency of $row[GPU_BASE] MHz";

                        if($row['GPU_BOOST'] > 0)
                        {
                            echo ", which can be boosted up to $row[GPU_BOOST] MHz.";
                        }
                        else
                        {
                            echo ".";
                        }
                        
                        echo " The GPU belongs to the $row[GPU_PREFIX] $row[GPU_GEN] series";
                        
                        if($row['GPU_SLI'] == 1)
                        {
                            echo " and has SLI support";
                        }

                        echo ". It's price at launch was $row[GPU_PRICE]$.";
                        echo "</p>";
                    }
                ?>
                <?php 
                    if($type == "CPU")
                    {
                        
                        echo "<p class='text-white fs-5 mt-4 pt-4'>The $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME] is desktop processor with $row[CPU_CORES] cores and $row[CPU_THREADS] threads, launched in";
                        
                        $formatteddate = date('F d. Y',strtotime($row['CPU_DATE']));
                        echo " $formatteddate.";
                        
                        echo " It is part of the $row[CPU_BRANDNAME] $row[CPU_LINEUP] lineup, using the $row[CPU_CORENAME] architecture. The $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME] operates at $row[CPU_FREQ] MHz";

                        if ($row['CPU_BOOST'] == 0)
                        {
                            echo ".";
                        }
                        else
                        {
                            echo " by default, but can boost up to $row[CPU_BOOST] MHz, depending on the workload.";
                        }
                        
                        if(strpos($row['CPU_NAME'], "K") == true)
                        {
                            echo " You may freely adjust the unlocked multiplier on $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME], which simplifies overclocking greatly, as you can easily dial in any overclocking frequency";
                        }

                        if($row['CPU_GRAPHICS'] == null)
                        {
                            echo " This processor does not have integrated graphics, you will need a separate graphics card.";
                        }
                        else
                        {
                            echo " This processor features the $row[CPU_GRAPHICS] integrated graphics solutionn you will not need a separate graphics card.";
                        }

                        if($row['CPU_COOLER'] == 0)
                        {
                            echo " The $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME] has a cooler included in the box. ";
                        }

                        echo "It's price at launch";
                        
                        if($row['CPU_PRICE'] == 0)
                        {
                            echo " is unknown.";
                        }
                        else
                        {
                            echo " was $row[CPU_PRICE]$.</p>";
                        }
                        
                    }
                ?>    
                </div>
                
            </div>
            <div class="row specs mt-5">
                <div class="col-lg-4 col-md-6">
                    <table class="w-100 table table-dark table-hover">
                        <thead class="border-0">
                            <tr >
                                <th colspan="2" class="text-center fs-4">
                                    General Info
                                </th>
                            </tr>                   
                        </thead>
                        <tbody>
                            <tr class="text-center fs-6">
                                <th class="w-50 pe-3 text-end">
                                    Release Date:
                                </th>
                                <td class="w-50 ps-3 text-start">
                                    <?php echo $formatteddate?>
                                </td>
                            </tr>
                            <tr class="text-center fs-6">
                                <th class="w-50 pe-3 text-end">
                                    Manufacturer:
                                </th>
                                <td class="w-50 ps-3 text-start">
                                    <?php 
                                        if($type == "GPU")
                                        {
                                            echo $row['GPU_MANUF'];
                                        }
                                        if($type == "CPU")
                                        {
                                            echo $row['CPU_MANUF'];
                                        }    
                                    ?>
                                </td>
                            </tr>
                            <tr class="text-center fs-6">
                                <th class="w-50 pe-3 text-end">
                                    Model Name:
                                </th>
                                <td class="w-50 ps-3 text-start">
                                    <?php 
                                        if($type == "GPU")
                                        {
                                            echo $row['GPU_BRANDNAME'] . " " . $row['GPU_PREFIX'] . " " .  $row['GPU_NAME'];
                                        }
                                        if($type == "CPU")
                                        {
                                            echo $row['CPU_BRANDNAME'] . " " . $row['CPU_LINEUP'] . " " .  $row['CPU_NAME'];
                                        }
                                    ?>
                                   
                                </td>
                            </tr>
                            <tr class="text-center fs-6">
                                <th class="w-50 pe-3 text-end">
                                    Generation:
                                </th>
                                <td class="w-50 ps-3 text-start">
                                    <?php 
                                        if($type == "GPU")
                                        {
                                            echo $row['GPU_PREFIX'] . " " . $row['GPU_GEN'] . " Series";
                                        }
                                        if($type == "CPU")
                                        {
                                            echo $row['CPU_LINEUP'] . " Series";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr class="text-center fs-6">
                                <th class="w-50 pe-3 text-end">
                                    Launch Price:
                                </th>
                                <td class="w-50 ps-3 text-start">
                                    <?php 
                                        if($type == "GPU")
                                        {
                                            echo $row['GPU_PRICE'] . " USD";
                                        }
                                        if($type == "CPU")
                                        {
                                            if($row['CPU_PRICE'] == 0)
                                            {
                                                echo "N/A";
                                            }
                                            else
                                            {
                                                echo $row['CPU_PRICE'] . " USD";
                                            }
                                            
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            if($type == "CPU")
                            {
                                echo "<tr class='text-center fs-6'>
                                        <th class='w-50 pe-3 text-end'>
                                            Market:	
                                        </th>
                                        <td class='w-50 ps-3 text-start'> 
                                            Desktop
                                        </td>
                                    </tr>";
                        
                            }
                            ?>
                        </tbody>
                    </table>
                    <table class="w-100 table table-dark table-hover">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center fs-4">
                                 Graphics
                                </th>
                            </tr>                   
                        </thead>
                        <tbody>
                            <tr class="text-center fs-6">
                                <th class="w-50 pe-3 text-end">
                                    <?php
                                        if($type == "GPU")
                                        {
                                            echo "DirectX:";
                                        }
                                        if($type == "CPU")
                                        {
                                            echo "Integrated Graphics";
                                        }
                                    ?>
                                </th>
                                <td class="w-50 ps-3 text-start">
                                    <?php
                                        if($type == "GPU")
                                        {
                                            echo "$row[GPU_DIRECTX]";
                                        }
                                        if($type == "CPU")
                                        {
                                            echo "$row[CPU_GRAPHICS]";
                                        }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4 col-md-6">
                <table class='w-100 table table-dark table-hover'>
                    <thead>
                        <tr>
                            <th colspan='2' class='text-center fs-4'>
                                 <?php
                                    if($type == "GPU")
                                    {
                                        echo "Clock Speeds";
                                    }
                                    if($type == "CPU")
                                    {
                                        echo "Performance";
                                    }
                                    ?>
                                </th>
                            </tr>                   
                        </thead>
                        <tbody>
                            <tr class='text-center fs-6'>
                                <th class='w-50 pe-3 text-end'>
                                    <?php
                                        if($type == "GPU")
                                        {
                                            echo "Base Clock: ";
                                        }
                                        if($type == "CPU")
                                        {
                                            echo "Frequency: ";
                                        }
                                    ?>
                                </th>
                                <td class='w-50 ps-3 text-start'>
                                    <?php
                                        if($type == "GPU")
                                        {
                                            echo "$row[GPU_BASE] MHz";
                                        }
                                        if($type == "CPU")
                                        {
                                            echo "$row[CPU_FREQ] MHz";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr class='text-center fs-6'>
                                <?php
                                    if($type == "GPU")
                                    {
                                        if($row['GPU_BOOST'] !== "0")
                                        {
                                            echo "<th class='w-50 pe-3 text-end'>Boost Clock:</th>";
                                        }
                                        
                                    }
                                    if($type == "CPU")
                                    {
                                        if($row['CPU_BOOST'] !== "0")
                                        {
                                            echo "<th class='w-50 pe-3 text-end'>Turbo Clock:</th>";
                                        }
                                        
                                    }
                                    if($type == "GPU")
                                    {
                                        if($row['GPU_BOOST'] !== "0")
                                        {
                                            echo "<td class='w-50 ps-3 text-start'>$row[GPU_BOOST] MHz</td>";
                                        }
                                        
                                    }
                                    if($type == "CPU")
                                    {
                                        if($row['CPU_BOOST'] !== "0")
                                        {
                                            echo "<td class='w-50 ps-3 text-start'>$row[CPU_BOOST] MHz</td>";
                                        } 
                                    }
                                ?>   
                            </tr>
                        </tbody>
                    </table>
                    <table class="w-100 table table-dark table-hover">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center fs-4">
                                 Extras
                                </th>
                            </tr>                   
                        </thead>
                        <tbody>
                            <tr class="text-center fs-6">
                                <th class="w-50 pe-3 text-end">
                                    <?php
                                        if($type == "GPU")
                                        {
                                            echo "SLI support:";
                                        }
                                        if($type == "CPU")
                                        {
                                            echo "Cooler Included:";
                                        }
                                    ?>
                                </th>
                                <td class="w-50 ps-3 text-start">
                                    <?php 
                                        if($type == "GPU")
                                        {
                                            if($row['GPU_SLI'] == 1 )
                                            {
                                                echo "Yes";
                                            }
                                            else
                                            {
                                                echo "No";
                                            }
                                        }
                                        if($type == "CPU")
                                        {
                                            if($row['CPU_COOLER'] == 1 )
                                            {
                                                echo "Yes";
                                            }
                                            else
                                            {
                                                echo "No";
                                            }
                                        }
                                    
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="w-100 table table-dark table-hover">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center fs-4">
                                    <?php
                                        if($type == "GPU")
                                        {
                                            echo "Memory";
                                        }
                                        if($type == "CPU")
                                        {
                                            echo "Cores";
                                        }
                                    ?>
                                </th>
                            </tr>                   
                        </thead>
                        <tbody>
                            <tr class="text-center fs-6">
                                <th class="w-50 pe-3 text-end">
                                    <?php 
                                        if($type == "GPU")
                                        {      
                                            echo "Memory Size:";
                                        }
                                        if($type == "CPU")
                                        {      
                                            echo "Cores:";
                                        }
                                    ?> 
                                </th>
                                <td class="w-50 ps-3 text-start">
                                    <?php 
                                        if($type == "GPU")
                                        {
                                            echo $row['GPU_MEM'] . " GB";
                                        }
                                        if($type == "CPU")
                                        {
                                            echo $row['CPU_CORES'];
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr class="text-center fs-6">
                                <th class="w-50 pe-3 text-end">
                                    <?php 
                                        if($type == "GPU")
                                        {      
                                            echo "Memory Type:";
                                        }
                                        if($type == "CPU")
                                        {      
                                            echo "Threads:";
                                        }
                                    ?> 
                                </th>
                                <td class="w-50 ps-3 text-start">
                                    <?php 
                                        if($type == "GPU")
                                        {
                                            echo $row['GPU_MEMTYPE'];
                                        }
                                        if($type == "CPU")
                                        {
                                            echo $row['CPU_THREADS'];
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php 
                                if($type == "GPU")
                                {
                                    echo"
                                    <tr class='text-center fs-6'>
                                        <th class='w-50 pe-3 text-end'>
                                            Memory Bus:
                                        </th>
                                        <td class='w-50 ps-3 text-start'>
                                            $row[GPU_BIT]-bit
                                        </td>
                                    </tr>";
                                }
                                
                            ?>
                            
                            
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4" >
                <table class='w-100 table mb-1'>
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center fs-4">
                                <?php 
                                if(isset($_GET["GPU"]))
                                {
                                    $gpuallrank = GPUALLRank();
                                    $row = mysqli_fetch_array($gpuallrank);
                                    $gpuallrank = $row[0] + 1;
                                }
                                if(isset($_GET["CPU"]))
                                {
                                    $cpuallrank = CPUALLRank();
                                    $row = mysqli_fetch_array($cpuallrank);
                                    $cpuallrank = $row[0] + 1;
                                }
                                echo $type. "-s Ranked";
                                ?>
                            </th>
                        </tr>                   
                    </thead>
                </table> 
                <div class='overflow-auto ' style='height: 380px !important'>
                <table class="w-100 table table-dark table-hover " >
                        <tbody>
                            <?php  
                                if(isset($_GET["GPU"]))
                                {
                                    $i = 0;
                                    $result = GPURank();
                                    while($row = $result-> fetch_assoc())
                                    {
                                        $i++;
                                        echo "
                                            <tr>
                                                <td class='text-center'style='width: 10vh'>";
                                                    echo  $i . "th";
                                        echo   "</td>
                                                <td>
                                                      <a class='text-decoration-none' href='?p=HardwarePage&GPU=$row[GPU_ID]'>
                                                    $row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME] $row[GPU_MEM] GB
                                                    </a>
                                                </td>
                                            </tr>";  
                                    }    
                                } 
                                if(isset($_GET["CPU"]))
                                {
                                    $i = 0;
                                    $result = CPURank();
                                    while($row = $result-> fetch_assoc())
                                    {
                                        $i++;
                                        echo "
                                            <tr>
                                                <td>";
                                                    echo $i . "th 
                                                </td>
                                                <td>
                                                    <a class='text-decoration-none' href='?p=HardwarePage&CPU=$row[CPU_ID]'>
                                                    $row[CPU_MANUF] $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME]
                                                    </a>
                                                </td>
                                            </tr>";
                                    }                                            
                                }                                       
                                ?>
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                
                <?php
                    if(isset($_GET['GPU']))
                    {   
                        $id = $_GET['GPU'];
                        $type = "GPU";
                        $result = GetHardware($type, $id);
                        $row = $result-> fetch_assoc();
                        $gen = $row['GPU_GEN'];
                        $result = SimilarHardware($type, $gen);
                        $aos = 100;
                        if ($result->num_rows > 1)  
                        { 
                            echo "<h1 class='text-white mt-5'>Similar $type-s</h1>";
                            while($row = $result-> fetch_assoc())
                            {
                                if($id != $row['GPU_ID'])
                                {
                                    $gpudate = $row['GPU_DATE'];
                                    $todaydate = date('Y-m-d H:i:s');

                                    $calculate_seconds =  strtotime($todaydate) - strtotime($gpudate);
                                    $day = floor($calculate_seconds / (24 * 60 * 60));  
                                                    
                                    echo"<div class='col-6 col-md-6 col-lg-4 col-xl-2 gamecard px-0' data-aos='fade-up' data-aos-delay='$aos' data-aos-anchor-placement='top-bottom'>
                                    <a href='?p=HardwarePage&GPU=$row[GPU_ID]' class='card card-bg border-0 rounded-4 p-3 text-decoration-none'>
                                    <img data-tilt data-tilt-scale='1.03' class='w-100 rounded-3' src='$row[GPU_IMG]' onContextMenu='return false;' ondragstart='return false';>";
                                                                
                                    if ($day < 30)
                                    {
                                        echo "  <span class='position-absolute translate-middle badge rounded-2 bg-danger p-2 fs-5' style='top: 18px; left: 230px;'>NEW</span>";
                                    }   
                                                                        
                                    echo"<div class='card-body ps-0 pb-0'>
                                    <h4 class='text-start fs-5 card-title text-white p-0 '>$row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_NAME]</h4>                                    
                                    </div>
                                    </a>
                                    </div>";  
                                    $aos = $aos + 50;
                                }
                            
                            } 
                        }
                    }
                ?>
                <?php
                    if(isset($_GET['CPU']))
                    {   
                        $id = $_GET['CPU'];
                        $type = "CPU";
                        $result = GetHardware($type, $id);
                        $row = $result-> fetch_assoc();
                        $gen = $row['CPU_GEN'];
                        $result = SimilarHardware($type, $gen);
                        $aos = 100;
                        if ($result->num_rows > 1)  
                        { 
                            echo "<h1 class='text-white mt-5'>Similar $type-s</h1>";
                            while($row = $result-> fetch_assoc())
                            {
                                if($id != $row['CPU_ID'])
                                {
                                    $gpudate = $row['CPU_DATE'];
                                    $todaydate = date('Y-m-d H:i:s');

                                    $calculate_seconds =  strtotime($todaydate) - strtotime($gpudate);
                                    $day = floor($calculate_seconds / (24 * 60 * 60));  
                                                    
                                    echo"<div class='col-6 col-md-6 col-lg-4 col-xl-2 gamecard px-0' data-aos='fade-up' data-aos-delay='$aos' data-aos-anchor-placement='top-bottom'>
                                    <a href='?p=HardwarePage&CPU=$row[CPU_ID]' class='card card-bg border-0 rounded-4 p-3 text-decoration-none'>
                                    <img data-tilt data-tilt-scale='1.03' class='w-100 rounded-3' src='$row[CPU_IMG]' onContextMenu='return false;' ondragstart='return false';>";
                                                                
                                    if ($day < 30)
                                    {
                                        echo "  <span class='position-absolute translate-middle badge rounded-2 bg-danger p-2 fs-5' style='top: 18px; left: 230px;'>NEW</span>";
                                    }   
                                                                        
                                    echo"<div class='card-body ps-0 pb-0'>
                                    <h4 class='text-start fs-5 card-title text-white p-0 '>$row[CPU_MANUF] $row[CPU_BRANDNAME] $row[CPU_NAME]</h4>                                    
                                    </div>
                                    </a>
                                    </div>";  
                                    $aos = $aos + 50;
                                }
                            
                            } 
                        }
                    }
                ?>
            </div>    
        </div>       
    </div>
