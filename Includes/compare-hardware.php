
<body class="bg-dark">
    <div class="rgb-bg container-fluid mobile-header">
        <div class="container py-5">
            <h2 class="text-white fs-1"><i class="bi bi-tools pe-2"></i>Compare Hardware</h2>
            <p class="text-white pt-2 fs-4">Elevate your computing experience with our CPU and GPU comparison tool. Find the perfect hardware match for you!</p>
        </div>
    </div>
        <div class="bg-dark container-fluid mt-5 mb-5">
            <div class="container-fluid">
                <div class="container mt-3">
                    <table class="w-100 big-table">
                        <tr>
                            <td class="align-top" style="width: 20%;">   
                                <div class="nav-pills">
                                    <!--Newest Harwdare-->
                                    <?php
                                        $type = "gpu";
                                        $brandname = "Nvidia";
                                        $result = NewestComponent($type, $brandname); 
                                        $row1 = $result-> fetch_assoc();

                                        $type = "gpu";
                                        $brandname = "Amd";
                                        $result = NewestComponent($type, $brandname); 
                                        $row2 = $result-> fetch_assoc();

                                        echo "<a class='btn btn-dark nav-link w-100 p-2 fs-5 mb-1 "; 
                                            
                                        if(isset($_GET["GPU"]))
                                        {
                                            echo "active ";
                                        }

                                        echo "'aria-current='page' href='?p=HardwareCompare&GPU=$row1[GPU_ID]&GPU2=$row2[GPU_ID]'>GPU</a>";  
                                                 
                                        $type = "cpu";
                                        $brandname = "Intel";
                                        $result = NewestComponent($type, $brandname); 
                                        $row1 = mysqli_fetch_assoc($result);
                                         
                                        $type = "cpu";  
                                        $brandname = "Amd";
                                        $result = NewestComponent($type, $brandname); 
                                        $row2 = mysqli_fetch_assoc($result);

                                        echo  "<a class='btn btn-dark nav-link w-100 p-2 fs-5 mb-1 ";
                                            
                                        if(isset($_GET["CPU"]))
                                        {
                                            echo "active ";
                                        }  
                                            
                                        echo "'aria-current='page' href='?p=HardwareCompare&CPU=$row1[CPU_ID]&CPU2=$row2[CPU_ID]'>CPU</a>";
                                    ?>      
                                </div>
                            </td>
                            <td class="px-4 align-top" style="width: 40%;">
                                <div class="dropdown mb-3"> 
                                    <!--GPU1/CPU1 Data-->
                                    <?php
                                        include("compare-hardware-functions.php");
                                        if(isset($_GET["GPU"]))
                                        {
                                            $type1 = "gpu";
                                            $id = $_GET["GPU"]; 
                                            $result = GetGPUDataFromId($id);
                                            $GPU1 = mysqli_fetch_assoc($result);    
                                        }
                                        else
                                        {
                                            $type1 = "cpu";
                                            $id = $_GET["CPU"]; 
                                            $result = GetCPUDataFromId($id);
                                            $CPU1 = mysqli_fetch_assoc($result);
                                            
                                        }    
                                    ?>
                                    <button class="p-2 btn btn-dark text-white mb-3 fs-6 border-white dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php if($type1 == "gpu") echo "$GPU1[GPU_MANUF] $GPU1[GPU_BRANDNAME] $GPU1[GPU_PREFIX] $GPU1[GPU_NAME]"; else if($type1 == "cpu") echo "$CPU1[CPU_MANUF] $CPU1[CPU_BRANDNAME] $CPU1[CPU_LINEUP] $CPU1[CPU_NAME]"; else echo "Select Hardware";?>
                                    </button>
                                    <ul class=" dropdown-menu dropdown-menu-dark w-100 overflow-auto " style="max-height: 250px;">
                                    <!--GPU/CPU Dropdown-->
                                        <?php  
                                            if(isset($_GET["GPU"]))
                                            {
                                                $result = AllGpu();
                                                while($row = $result-> fetch_assoc())
                                                {
                                                    echo "<li><a class='dropdown-item' href='?p=HardwareCompare&GPU=$row[GPU_ID]'>$row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME] $row[GPU_MEM]GB</a></li>";  
                                                }    
                                            } 
                                            if(isset($_GET["CPU"]))
                                            {
                                            $result = AllCpu();
                                                while($row = $result-> fetch_assoc())
                                                {
                                                    echo "<li><a class='dropdown-item' href='?p=HardwareCompare&CPU=$row[CPU_ID]'>$row[CPU_MANUF] $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME]</a></li>";  
                                                }   
                                            }                                       
                                        ?>
                                        </ul>
                                        <!--GPU1/CPU1 Image-->   
                                        <img class='d-block mx-auto w-100 pb-2 ' src='          
                                            <?php 
                                                if(isset($_GET["GPU"]))
                                                { 
                                                    echo $GPU1['GPU_IMG'];
                                                }
                                                else
                                                {
                                                    echo $CPU1['CPU_IMG'];
                                                }
                                            ?>' onContextMenu='return false;' ondragstart='return false;' data-aos="fade-up" data-aos-delay='100'>                                      
                                    </div>
                                </td>
                                <td class="px-4 align-top" style="width: 40% !important;">  
                                    <div class="dropdown mb-3">
                                        <!--GPU2/CPU2 Data-->
                                        <?php
                                            if(isset($_GET["GPU2"]))
                                            {
                                                $type2 = "gpu";
                                                $id = $_GET["GPU2"]; 
                                                $result = GetGPUDataFromId($id);
                                                $GPU2 = mysqli_fetch_assoc($result);    
                                            }
                                            else if(isset($_GET["CPU2"]))
                                            {
                                                $type2 = "cpu";
                                                $id = $_GET["CPU2"]; 
                                                $result = GetCPUDataFromId($id);
                                                $CPU2 = mysqli_fetch_assoc($result);
                                                
                                            }    
                                        ?>
                                        <button class="p-2 btn btn-dark  text-white mb-3 fs-6 border-white dropdown-toggle w-100 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php if(isset($_GET["GPU2"]) && $type2 == "gpu") echo "$GPU2[GPU_MANUF] $GPU2[GPU_BRANDNAME] $GPU2[GPU_PREFIX] $GPU2[GPU_NAME]"; else if(isset($_GET["CPU2"]) && $type2 == "cpu") echo "$CPU2[CPU_MANUF] $CPU2[CPU_BRANDNAME] $CPU2[CPU_LINEUP] $CPU2[CPU_NAME]"; else echo "Select Hardware";?>
                                    </button>
                                        <ul class=" dropdown-menu dropdown-menu-dark w-100 overflow-auto" style="max-height: 250px;">
                                            <!--GPU/CPU Dropdown-->
                                            <?php     
                                            $result = AllGpu(); 
                                            if ($result->num_rows > 0) 
                                            {   
                                                if(isset($_GET["GPU"]))
                                                {
                                                    $result = AllGpu();
                                                    while($row = $result-> fetch_assoc())
                                                    {
                                                        echo "<li><a class='dropdown-item' href='?p=HardwareCompare&GPU=$_GET[GPU]&GPU2=$row[GPU_ID]'>$row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME] $row[GPU_MEM]GB</a></li>";  
                                                    }    
                                                } 
                                                if(isset($_GET["CPU"]))
                                                {
                                                    $result = AllCpu();
                                                    while($row = $result-> fetch_assoc())
                                                    {
                                                        echo "<li><a class='dropdown-item' href='?p=HardwareCompare&CPU=$_GET[CPU]&CPU2=$row[CPU_ID]'>$row[CPU_MANUF] $row[CPU_BRANDNAME]  $row[CPU_LINEUP] $row[CPU_NAME]</a></li>";  
                                                    }   
                                                }      
                                            }                                     
                                            ?>
                                        </ul>
                                        <!--GPU2/CPU2 Image-->   
                                        <img class='d-block mx-auto w-100 pb-2 ' src='
                                        <?php 
                                            if(isset($_GET["GPU2"]))
                                            { 
                                                echo $GPU2['GPU_IMG'];
                                            }
                                            else if(isset($_GET["CPU2"]))
                                            {
                                                echo $CPU2['CPU_IMG'];
                                            }
                                        ?>' onContextMenu='return false;' ondragstart='return false;' data-aos="fade-up" data-aos-delay='200'>
                                        
                                        <title> <?php
                                        if((isset($_GET["GPU"]) && isset($_GET["GPU2"])) || (isset($_GET["CPU"]) && isset($_GET["CPU2"])))
                                        {
                                            if(isset($_GET["GPU"]) && isset($_GET["GPU2"]))
                                            {
                                                echo "$GPU1[GPU_MANUF] $GPU1[GPU_BRANDNAME] $GPU1[GPU_PREFIX] $GPU1[GPU_NAME] vs $GPU2[GPU_MANUF] $GPU2[GPU_BRANDNAME] $GPU2[GPU_PREFIX] $GPU2[GPU_NAME]";
                                            }

                                            if(isset($_GET["CPU"]) && isset($_GET["CPU2"]))
                                            {
                                                echo "$CPU1[CPU_MANUF] $CPU1[CPU_BRANDNAME] $CPU1[CPU_LINEUP] $CPU1[CPU_NAME] vs $CPU2[CPU_MANUF] $CPU2[CPU_BRANDNAME] $CPU2[CPU_LINEUP] $CPU2[CPU_NAME]";
                                            }
                                        }
                                        else
                                        {
                                            echo "Compare Hardware";
                                        }
                                        ?>
                                        </title>
                                    </div>
                                </td>
                            </tr>
                    </table>
                    <table class="w-100 mobile-table mb-3">
                        <tr>
                            <td style="width: 50%">    
                                <div class='me-1'>
                                    <!--Newest Harwdare-->
                                    <?php
                                        $type = "gpu";
                                        $brandname = "Nvidia";
                                        $result = NewestComponent($type, $brandname); 
                                        $row1 = $result-> fetch_assoc();

                                        $type = "gpu";
                                        $brandname = "Amd";
                                        $result = NewestComponent($type, $brandname); 
                                        $row2 = $result-> fetch_assoc();

                                        if(isset($_GET["GPU"]))
                                        {
                                            echo "<a class='btn btn btn-outline-light active w-100 p-1 fs-6 mb-1  ";
                                        }
                                        else
                                        {
                                            echo "<a class='btn btn-dark active w-100 p-1 fs-6 mb-1 "; 
                                        }

                                        echo "'aria-current='page' href='?p=HardwareCompare&GPU=$row1[GPU_ID]&GPU2=$row2[GPU_ID]'>GPU</a>";  
                                                 
                                        
                                    ?>
                                </div>                                  
                            </td>   
                            <td style="width: 50%" class="align-top">
                                <div class='me-1'>
                                    <?php
                                        $type = "cpu";
                                        $brandname = "Intel";
                                        $result = NewestComponent($type, $brandname); 
                                        $row1 = mysqli_fetch_assoc($result);
                                         
                                        $type = "cpu";  
                                        $brandname = "Amd";
                                        $result = NewestComponent($type, $brandname); 
                                        $row2 = mysqli_fetch_assoc($result);

                                        
                                            
                                        if(isset($_GET["CPU"]))
                                        {
                                            echo "<a class='btn btn btn-outline-light active w-100 p-1 fs-6 mb-1  ";
                                        }
                                        else
                                        {
                                            echo "<a class='btn btn-dark active w-100 p-1 fs-6 mb-1 "; 
                                        }
                                            
                                        echo "'aria-current='page' href='?p=HardwareCompare&CPU=$row1[CPU_ID]&CPU2=$row2[CPU_ID]'>CPU</a>";
                                    ?>
                                </div>          
                            </td>  
                        </tr>
                            <tr>
                                <td class="align-top" >
                                    <div class="dropdown me-1"> 
                                        <button class="btn btn-dark text-white fs-6 border-white dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>
                                        <ul class=" dropdown-menu dropdown-menu-dark w-100 overflow-auto " style="max-height: 250px; min-width: 80vw;">
                                         <!--GPU/CPU Dropdown-->
                                            <?php  
                                                if(isset($_GET["GPU"]))
                                                {
                                                    $result = AllGpu();
                                                    while($row = $result-> fetch_assoc())
                                                    {
                                                        echo "<li><a class='dropdown-item' style='font-size: 15px !important' href='?p=HardwareCompare&GPU=$row[GPU_ID]'>$row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_NAME] $row[GPU_MEM]GB</a></li>";  
                                                    }    
                                                } 
                                                if(isset($_GET["CPU"]))
                                                {
                                                    $result = AllCpu();
                                                    while($row = $result-> fetch_assoc())
                                                    {
                                                        echo "<li><a class='dropdown-item' style='font-size: 15px !important' href='?p=HardwareCompare&CPU=$row[CPU_ID]'>$row[CPU_MANUF] $row[CPU_BRANDNAME] $row[CPU_NAME]</a></li>";  
                                                    }   
                                                }      
                                                                            
                                            ?>
                                        </ul>
                                        <!--GPU1/CPU1 Image-->   
                                        <img class='d-block mx-auto w-100 pt-2' alt="No image" src='          
                                            <?php 
                                                if(isset($_GET["GPU"]))
                                                { 
                                                    echo $GPU1['GPU_IMG'];
                                                }
                                                else
                                                {
                                                    echo $CPU1['CPU_IMG'];
                                                }
                                            ?>' onContextMenu='return false;' ondragstart='return false;'>                                      
                                    </div>
                                </td>
                                <td class="align-top">  
                                    <div class="dropdown ms-1">
                                        <button class="btn btn-dark text-white fs-6 border-white dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>
                                        <ul class=" dropdown-menu dropdown-menu-dark w-100 overflow-auto" style="max-height: 250px; min-width: 80vw;">
                                            <!--GPU/CPU Dropdown-->
                                            <?php     
                                            $result = AllGpu(); 
                                            if ($result->num_rows > 0) 
                                            {   
                                                if(isset($_GET["GPU"]))
                                                {
                                                    $result = AllGpu();
                                                    while($row = $result-> fetch_assoc())
                                                    {
                                                        echo "<li><a class='dropdown-item' style='font-size: 15px !important' href='?p=HardwareCompare&GPU=$_GET[GPU]&GPU2=$row[GPU_ID]'>$row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_NAME] $row[GPU_MEM]GB</a></li>";  
                                                    }    
                                                } 
                                                if(isset($_GET["CPU"]))
                                                {
                                                    $result = AllCpu();
                                                    while($row = $result-> fetch_assoc())
                                                    {
                                                        echo "<li><a class='dropdown-item' style='font-size: 15px !important' href='?p=HardwareCompare&CPU=$_GET[CPU]&CPU2=$row[CPU_ID]'>$row[CPU_MANUF] $row[CPU_BRANDNAME] $row[CPU_NAME]</a></li>";  
                                                    }   
                                                }      
                                            }                                     
                                            ?>
                                        </ul>
                                        <!--GPU2/CPU2 Image-->  
                                        <img class='w-100 pt-2' src='
                                        <?php 
                                            if(isset($_GET["GPU2"]))
                                            { 
                                                echo $GPU2['GPU_IMG'];
                                            }
                                            else if(isset($_GET["CPU2"]))
                                            {
                                                echo $CPU2['CPU_IMG'];
                                            }
                                            else
                                            {
                                                echo "";
                                            }
                                        ?>' onContextMenu='return false;' ondragstart='return false; '>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h1 class='text-white fs-6 text-center'>
                                        <?php 
                                            if($type1 == "cpu") echo "$CPU1[CPU_MANUF] $CPU1[CPU_BRANDNAME] $CPU1[CPU_LINEUP] $CPU1[CPU_MANUF] $CPU1[CPU_NAME]";
                                            else if($type1 == "gpu") echo "$GPU1[GPU_MANUF] $GPU1[GPU_BRANDNAME] $GPU1[GPU_PREFIX] $GPU1[GPU_MANUF] $GPU1[GPU_NAME]";
                                            else echo "";   
                                        ?>
                                    </h1>
                                </td>
                                <td>
                                    <h1 class='text-white fs-6 text-center'>
                                        <?php 
                                            if(isset($_GET["GPU2"]) || isset($_GET["CPU2"]))
                                            {
                                                if($type2 == "cpu") echo "$CPU2[CPU_MANUF] $CPU2[CPU_BRANDNAME] $CPU2[CPU_LINEUP] $CPU2[CPU_MANUF] $CPU2[CPU_NAME]";
                                                else if($type2 == "gpu") echo "$GPU2[GPU_MANUF] $GPU2[GPU_BRANDNAME] $GPU2[GPU_PREFIX] $GPU2[GPU_MANUF] $GPU2[GPU_NAME]";
                                                else echo "";
                                            }                                      
                                        ?>
                                    </h1>
                                </td>       
                            </tr>
                    </table>
                    <div class="accordion bg-dark" id="accordionFlushExample">
                        <div class='accordion-item border-0 bg-dark '>
                            <h2 class='accordion-header bg-dark mb-2'>
                                <button class='accordion-btn text-white shadow-none w-100 border-0 fs-4 text-start p-3 rounded-3' data-bs-toggle='collapse' data-bs-target='#collapse1' aria-expanded='true' aria-controls='collapse1'>General information</button>
                            </h2>
                            <div id='collapse1' class='bg-dark accordion-collapse collapse show' aria-labelledby='headingOne'>
                                <div class='accordion-body'>
                                    <table class="w-100 big-table">
                                        <tr class="border-bottom " style="width: 20%;">
                                            <td>
                                                <h1 class='text-white fs-5 mb-0 py-3 ps-3'>Manufacturer</h1>
                                            </td>
                                            <td class="text-center col-5 px-5" style="width: 40%;">
                                                <?php echo "<h1 class='text-white fs-5 fw-light mb-0'>"; if(isset($_GET['GPU'])) echo "$GPU1[GPU_MANUF]"; else if(isset($_GET["CPU"])) echo "$CPU1[CPU_MANUF]"; echo "</h1>";?>  
                                            </td>
                                            <td class="text-center col-5" style="width: 40%;">
                                                <?php echo "<h1 class='text-white fs-5 fw-light mb-0'>"; if(isset($_GET['GPU2'])) echo "$GPU2[GPU_MANUF]"; else if(isset($_GET["CPU2"])) echo "$CPU2[CPU_MANUF]"; echo "</h1>"; ?>        
                                            </td>
                                        </tr>  
                                        <tr class="border-bottom">
                                            <td>
                                                <h1 class='text-white fs-5 mb-0 py-3  ps-3'>Model Name</h1>  
                                            </td>
                                            <td class="text-center">
                                                <?php echo "
                                                <h1 class='text-white fs-5 fw-light mb-0'>
                                                    <a class='text-decoration-none' href='?p=HardwarePage&"; 
                                                        if(isset($_GET['GPU'])) 
                                                        {
                                                            echo "&GPU=" . $GPU1['GPU_ID']; 
                                                        }                               
                                                        else if(isset($_GET['CPU'])) 
                                                        {
                                                            echo "&CPU=" . $CPU1['CPU_ID']; 
                                                        }
                                                        
                                                        echo "'class='text-decoration-none fs-5 fw-light mb-0'>"; 
                                                        if(isset($_GET['GPU'])) 
                                                        {
                                                            echo "$GPU1[GPU_PREFIX] $GPU1[GPU_NAME]"; 
                                                        }  
                                                        else if(isset($_GET['CPU'])) 
                                                        {
                                                            echo "$CPU1[CPU_NAME]"; 
                                                        }
                                                        echo "</a></h1>";
                                                        ?> 
                                            </td>  
                                            <td class="text-center">
                                                <?php echo "
                                                <h1 class='text-white fs-5 fw-light mb-0'>
                                                    <a class='text-decoration-none' href='?p=HardwarePage"; 
                                                        if(isset($_GET['GPU2'])) 
                                                        {
                                                            echo "&GPU=" . $GPU2['GPU_ID']; 
                                                        }                               
                                                        else if(isset($_GET['CPU2'])) 
                                                        {
                                                            echo "&CPU=" . $CPU2['CPU_ID']; 
                                                        }

                                                        echo "'class='text-decoration-none fs-5 fw-light mb-0'>"; 
                                                        if(isset($_GET['GPU2'])) 
                                                        {
                                                            echo "$GPU2[GPU_PREFIX] $GPU2[GPU_NAME]"; 
                                                        }  
                                                        else if(isset($_GET['CPU2'])) 
                                                        {
                                                            echo "$CPU2[CPU_NAME]"; 
                                                        }
                                                        echo "</a></h1>";      
                                                ?>
                                        </tr> 
                                        <tr class="border-bottom">
                                            <td>
                                                <h1 class='text-white fs-5 mb-0 py-3 ps-3 '>Series</h1>  
                                            </td>
                                            <td class="text-center">
                                                <?php echo "<h1 class='text-white fs-5 fw-light mb-0 '>"; if(isset($_GET['GPU'])) echo "$GPU1[GPU_GEN] Series</h1>"; else if(isset($_GET['CPU']))  echo "$CPU1[CPU_GEN] Series</h1>";?> 
                                            </td>
                                            <td class="text-center">
                                                 <?php echo "<h1 class='text-white fs-5 fw-light mb-0 '>"; if(isset($_GET['GPU2'])) echo "$GPU2[GPU_GEN] Series</h1>"; else if(isset($_GET['CPU2'])) echo "$CPU2[CPU_GEN] Series</h1>";?>        
                                            </td>   
                                        </tr>
                                            <?php
                                                if(isset($_GET['CPU']))
                                                {  
                                                    echo" 
                                                        <tr class='border-bottom'>
                                                            <td>
                                                                <h1 class='text-white fs-5 mb-0 py-3 ps-3 '>Core Name</h1>  
                                                            </td>
                                                            <td class='text-center'>
                                                                <h1 class='text-white fs-5 fw-light mb-0'>$CPU1[CPU_CORENAME]</h1>
                                                            </td>
                                                            <td class='text-center'>";   
                                                                   if(isset($_GET['CPU2']))
                                                                {        
                                                                    echo "<h1 class='text-white fs-5 fw-light mb-0 '> $CPU2[CPU_CORENAME]</h1>";
                                                                }   
                                                    echo "</td></tr>";  
                                                }
                                            ?>        
                                        <tr>
                                            <td>
                                                <h1 class='text-white fs-5 mb-0 py-3 ps-3'>Release Date</h1>  
                                            </td>
                                            <td class="text-center">
                                                <?php 
                                                    echo "<h1 class='text-white fs-5 fw-light mb-0'>"; 
                                                        if(isset($_GET['GPU'])) echo date('Y. F d.',strtotime($GPU1["GPU_DATE"])); 
                                                        else if(isset($_GET['CPU'])) echo date('Y. F d.',strtotime($CPU1["CPU_DATE"])); 
                                                    echo "</h1>"; 
                                                ?>                       
                                            </td>
                                            <td class="text-center">
                                                <?php 
                                                    echo "<h1 class='text-white fs-5 fw-light mb-0'>"; 
                                                        if(isset($_GET['GPU2'])) echo date('Y. F d.',strtotime($GPU2["GPU_DATE"])); 
                                                        else if(isset($_GET['CPU2'])) echo date('Y. F d.',strtotime($CPU2["CPU_DATE"])); 
                                                    echo "</h1>";     
                                                ?>        
                                            </td>
                                        </tr> 
                                    </table>
                                    <table class="w-100 mobile-table">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">    
                                                    <h1 class='text-white fs-5'>Manufacturer</h1>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td colspan="1" class="text-center" style="width: 50%">
                                                    <?php 
                                                        echo "<h1 class='text-white fs-6 fw-light'>"; 
                                                            if(isset($_GET['GPU'])) echo "$GPU1[GPU_MANUF]"; 
                                                            else if(isset($_GET["CPU"])) echo "$CPU1[CPU_MANUF]"; 
                                                        echo "</h1>";
                                                    ?>  
                                                </td>
                                                <td colspan="1" class="text-center" style="width: 50%">
                                                    <?php echo "<h1 class='text-white fs-6 fw-light'>"; if(isset($_GET['GPU2'])) echo "$GPU2[GPU_MANUF]"; else if(isset($_GET["CPU2"])) echo "
                                                    $CPU2[CPU_MANUF]"; echo "</h1>"; ?>        
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">    
                                                    <h1 class='text-white fs-5 pt-3'>Model Name</h1>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td colspan="1" class="text-center" style="width: 50%">
                                                    <?php echo "<h1 class='text-white fs-6 fw-light'>"; 
                                                        echo "<a class='text-decoration-none' href='?p=HardwarePage&"; 
                                                        if(isset($_GET['GPU'])) 
                                                        {
                                                            echo "&GPU=" . $GPU1['GPU_ID']; 
                                                        }                               
                                                        else if(isset($_GET['CPU'])) 
                                                        {
                                                            echo "&CPU=" . $CPU1['CPU_ID']; 
                                                        }
                                                        
                                                        echo "'class='text-decoration-none fs-5 fw-light mb-0'>"; 
                                                        if(isset($_GET['GPU'])) 
                                                        {
                                                            echo "$GPU1[GPU_PREFIX] $GPU1[GPU_NAME]"; 
                                                        }  
                                                        else if(isset($_GET['CPU'])) 
                                                        {
                                                            echo "$CPU1[CPU_NAME]"; 
                                                        }
                                                        echo "</a></h1>";
                                                        ?> 
                                                </td>
                                                <td colspan="1" class="text-center" style="width: 50%">
                                                <?php echo "<h1 class='text-white fs-6 fw-light'>"; 
                                                        echo "<a class='text-decoration-none' href='?p=HardwarePage&"; 
                                                        if(isset($_GET['GPU'])) 
                                                        {
                                                            echo "&GPU=" . $GPU2['GPU_ID']; 
                                                        }                               
                                                        else if(isset($_GET['CPU'])) 
                                                        {
                                                            echo "&CPU=" . $CPU2['CPU_ID']; 
                                                        }
                                                        
                                                        echo "'class='text-decoration-none fs-5 fw-light mb-0'>"; 
                                                        if(isset($_GET['GPU2'])) 
                                                        {
                                                            echo "$GPU2[GPU_PREFIX] $GPU2[GPU_NAME]"; 
                                                        }  
                                                        else if(isset($_GET['CPU2'])) 
                                                        {
                                                            echo "$CPU2[CPU_NAME]"; 
                                                        }
                                                        echo "</a></h1>";
                                                        ?> 
                                                </td>        
                                            </tr>
                                            <tr>
                                                <td colspan="2">    
                                                    <h1 class='text-white fs-5 pt-3'>Series</h1>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="text-center">
                                                    <?php echo "<h1 class='text-white fs-6 fw-light'>"; if(isset($_GET['GPU'])) echo "$GPU1[GPU_GEN] Series</h1>"; else if(isset($_GET['CPU'])) echo "$CPU1[CPU_GEN] Series</h1>";?> 
                                                </td>
                                                <td class="text-center">
                                                    <?php echo "<h1 class='text-white fs-6 fw-light'>"; if(isset($_GET['GPU2'])) echo "$GPU2[GPU_GEN] Series</h1>"; else if(isset($_GET['CPU2'])) echo "$CPU2[CPU_GEN] Series</h1>";?> 
                                                </td>
                                            </tr>
                                            <?php
                                                if(isset($_GET['CPU']))
                                                {  
                                                    echo"
                                                    <tr>
                                                        <td colspan='2'>    
                                                            <h1 class='text-white fs-5 pt-3'>Core Name</h1>
                                                        </td>
                                                    </tr> 
                                                    <tr class='border-bottom'>
                                                        <td class='text-center'>
                                                            <h1 class='text-white fs-6 fw-light'>$CPU1[CPU_CORENAME]</h1>
                                                        </td>   
                                                        <td class='text-center'>
                                                            <h1 class='text-white fs-6 fw-light'>";
                                                            if(isset($_GET["CPU2"])) echo "$CPU2[CPU_CORENAME]"; echo "</h1>
                                                        </td> 
                                                    </tr>";
                                                }   
                                                ?>   
                                            <tr>
                                                <td colspan="2">    
                                                    <h1 class='text-white fs-5 pt-3'>Release Date</h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" class="text-center col-5" style="width: 50%">
                                                    <?php 
                                                        echo "<h1 class='text-white fs-6 fw-light'>"; 
                                                            if(isset($_GET['GPU'])) echo date('Y. F d.',strtotime($GPU1["GPU_DATE"])); 
                                                            else if(isset($_GET['CPU'])) echo date('Y. F d.',strtotime($CPU1["CPU_DATE"])); 
                                                        echo "</h1>"; 
                                                    ?>   
                                                </td>
                                                <td colspan="1" class="text-center col-5" style="width: 50%">
                                                    <?php 
                                                        echo "<h1 class='text-white fs-6 fw-light'>"; 
                                                            if(isset($_GET['GPU2'])) echo date('Y. F d.',strtotime($GPU2["GPU_DATE"])); 
                                                            else if(isset($_GET['CPU2'])) echo date('Y. F d.',strtotime($CPU2["CPU_DATE"])); 
                                                        echo "</h1>"; 
                                                    ?>  
                                                </td>
                                            </tr>     
                                        </tbody>        
                                    </table>         
                                </div>
                            </div>
                <div class='accordion-item border-0 bg-dark pb-1'>
                    <h2 class='accordion-header bg-dark mb-2'>
                        <button class='accordion-btn text-white shadow-none w-100 border-0 fs-4 text-start p-3 rounded-3' data-bs-toggle='collapse' data-bs-target='#collapse2' aria-expanded='true' aria-controls='collapse2'>Specifications</button>
                    </h2>
                    <div id='collapse2' class='bg-dark accordion-collapse collapse show' aria-labelledby='headingOne'>
                        <div class='accordion-body'>
                            <table class="w-100 big-table mb-3">
                                <?php
                                    if(isset($_GET['GPU']))
                                    {   
                                        $last = 0;
                                        $TITLE = "Memory";
                                        $GPUCOMPARE1 = $GPU1['GPU_MEM'];
                                        if(isset($_GET['GPU2']))
                                        {   
                                            $GPUCOMPARE2 = $GPU2['GPU_MEM'];
                                        }
                                        else
                                        {
                                            $GPUCOMPARE2 = null;
                                        }
                                        $compareout = TableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                        echo $compareout;
                                        
                                        $last = 0;
                                        $TITLE = "Memory Type";
                                        $GPUCOMPARE1 = $GPU1['GPU_MEMTYPE'];
                                        if(isset($_GET['GPU2']))
                                        {   
                                            $GPUCOMPARE2 = $GPU2['GPU_MEMTYPE'];
                                        }
                                        else
                                        {
                                            $GPUCOMPARE2 = null;
                                        }
                                        $compareout = TableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                        echo $compareout; 

                                        $last = 0;
                                        $TITLE = "Memory Interface";
                                        $GPUCOMPARE1 = $GPU1['GPU_BIT'];
                                        if(isset($_GET['GPU2']))
                                        {   
                                            $GPUCOMPARE2 = $GPU2['GPU_BIT'];
                                        }
                                        else
                                        {
                                            $GPUCOMPARE2 = null;
                                        }
                                        $compareout = TableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                        echo $compareout; 

                                        $last = 0;
                                        $TITLE = "Base Clockrate";
                                        $GPUCOMPARE1 = $GPU1['GPU_BASE'];
                                        if(isset($_GET['GPU2']))
                                        {   
                                            $GPUCOMPARE2 = $GPU2['GPU_BASE'];
                                        }
                                        else
                                        {
                                            $GPUCOMPARE2 = null;
                                        }
                                        
                                        $compareout = TableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                        echo $compareout;

                                        $last = 0;
                                        $TITLE = "Boost Clockrate";
                                        $GPUCOMPARE1 = $GPU1['GPU_BOOST'];
                                        if(isset($_GET['GPU2']))
                                        {   
                                            $GPUCOMPARE2 = $GPU2['GPU_BOOST'];
                                        }
                                        else
                                        {
                                            $GPUCOMPARE2 = null;
                                        }                           
                                        $compareout = TableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                        echo $compareout;

                                        $last = 1;
                                        $TITLE = "DirectX";
                                        $GPUCOMPARE1 = $GPU1['GPU_DIRECTX'];
                                        if(isset($_GET['GPU2']))
                                        {   
                                            $GPUCOMPARE2 = $GPU2['GPU_DIRECTX'];
                                        }
                                        else
                                        {
                                            $GPUCOMPARE2 = null;
                                        } 
                                        $compareout = TableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                        echo $compareout;

                                    }

                                    //CPU
                                    if(isset($_GET['CPU']))
                                    { 
                                        $last = 0;
                                        $TITLE = "Cores";
                                        $CPUCOMPARE1 = $CPU1['CPU_CORES'];
                                        if(isset($_GET['CPU2']))
                                        {   
                                            $CPUCOMPARE2 = $CPU2['CPU_CORES'];
                                        }
                                        else
                                        {
                                            $CPUCOMPARE2 = null;
                                        }
                                        $compareout = TableOut($last, $TITLE, $CPUCOMPARE1, $CPUCOMPARE2);
                                        echo $compareout;

                                        $last = 0;
                                        $TITLE = "Threads";
                                        $CPUCOMPARE1 = $CPU1['CPU_THREADS'];
                                        if(isset($_GET['CPU2']))
                                        {   
                                            $CPUCOMPARE2 = $CPU2['CPU_THREADS'];
                                        }
                                        else
                                        {
                                            $CPUCOMPARE2 = null;
                                        }
                                        $compareout = TableOut($last, $TITLE, $CPUCOMPARE1, $CPUCOMPARE2);
                                        echo $compareout;

                                       
                                        $last = 0;
                                        $TITLE = "Base Clock Rate";
                                        $CPUCOMPARE1 = $CPU1['CPU_FREQ'];
                                        if(isset($_GET['CPU2']))
                                        {   
                                            $CPUCOMPARE2 = $CPU2['CPU_FREQ'];
                                        }
                                        else
                                        {
                                            $CPUCOMPARE2 = null;
                                        }
                                        $compareout = TableOut($last, $TITLE, $CPUCOMPARE1, $CPUCOMPARE2);
                                        echo $compareout;


                                        $last = 0;
                                        $TITLE = "Turbo Clock Rate";
                                        $CPUCOMPARE1 = $CPU1['CPU_BOOST'];
                                        if(isset($_GET['CPU2']))
                                        {   
                                            $CPUCOMPARE2 = $CPU2['CPU_BOOST'];
                                        }
                                        else
                                        {
                                            $CPUCOMPARE2 = null;
                                        }
                                        $compareout = TableOut($last, $TITLE, $CPUCOMPARE1, $CPUCOMPARE2);
                                        echo $compareout;    

                                    
                                        //GPU Integrated Graphics
                                        echo "
                                        <tr style='width: 20%;'><td>
                                        <h1 class='text-white fs-5 mb-0 py-3 ps-3'>Integrated Graphics</h1></td>
                                            <td class='text-center' style='width: 40%;'>
                                                <h1 class='text-white fs-5 fw-light mb-0'>";
                                                if($CPU1['CPU_GRAPHICS'] != null)
                                                {
                                                    echo "$CPU1[CPU_GRAPHICS]</h1></td>";
                                                }
                                                else
                                                {
                                                    echo "-</h1></td>";
                                                }
                                                echo "<td class='text-center' style='width: 40%;'><h1 class='text-white fs-5 fw-light mb-0'>";
                                                if(isset($_GET['CPU2']))
                                                {
                                                    if($CPU2['CPU_GRAPHICS'] != null)
                                                    {
                                                        echo "$CPU2[CPU_GRAPHICS]</h1></td>";
                                                    }
                                                    else
                                                    {
                                                        echo "-</h1></td>";
                                                    }
                                                }
                                               echo "</tr>";
                                        }
                                    ?>
                            </table> 
                            <table class="w-100 mobile-table mb-3">
                                <?php
                                    if(isset($_GET['GPU']))
                                    {   
                                        $last = 0;
                                        $TITLE = "Memory";
                                        $GPUCOMPARE1 = $GPU1['GPU_MEM'];
                                        if(isset($_GET['GPU2']))
                                        {   
                                            $GPUCOMPARE2 = $GPU2['GPU_MEM'];
                                        }
                                        else
                                        {
                                            $GPUCOMPARE2 = null;
                                        }
                                        $compareout = MobileTableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                        echo $compareout;
                                        
                                        $last = 0;
                                        $TITLE = "Memory Type";
                                        $GPUCOMPARE1 = $GPU1['GPU_MEMTYPE'];
                                        if(isset($_GET['GPU2']))
                                        {   
                                            $GPUCOMPARE2 = $GPU2['GPU_MEMTYPE'];
                                        }
                                        else
                                        {
                                            $GPUCOMPARE2 = null;
                                        }
                                        $compareout = MobileTableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                        echo $compareout; 

                                        $last = 0;
                                        $TITLE = "Memory Interface";
                                        $GPUCOMPARE1 = $GPU1['GPU_BIT'];
                                        if(isset($_GET['GPU2']))
                                        {   
                                            $GPUCOMPARE2 = $GPU2['GPU_BIT'];
                                        }
                                        else
                                        {
                                            $GPUCOMPARE2 = null;
                                        }
                                        $compareout = MobileTableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                        echo $compareout; 

                                        $last = 0;
                                        $TITLE = "Base Clockrate";
                                        $GPUCOMPARE1 = $GPU1['GPU_BASE'];
                                        if(isset($_GET['GPU2']))
                                        {   
                                            $GPUCOMPARE2 = $GPU2['GPU_BASE'];
                                        }
                                        else
                                        {
                                            $GPUCOMPARE2 = null;
                                        }
                                        
                                        $compareout = MobileTableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                        echo $compareout;

                                        $last = 0;
                                        $TITLE = "Boost Clockrate";
                                        $GPUCOMPARE1 = $GPU1['GPU_BOOST'];
                                        if(isset($_GET['GPU2']))
                                        {   
                                            $GPUCOMPARE2 = $GPU2['GPU_BOOST'];
                                        }
                                        else
                                        {
                                            $GPUCOMPARE2 = null;
                                        }                           
                                        $compareout = MobileTableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                        echo $compareout;

                                        $last = 1;
                                        $TITLE = "DirectX";
                                        $GPUCOMPARE1 = $GPU1['GPU_DIRECTX'];
                                        if(isset($_GET['GPU2']))
                                        {   
                                            $GPUCOMPARE2 = $GPU2['GPU_DIRECTX'];
                                        }
                                        else
                                        {
                                            $GPUCOMPARE2 = null;
                                        } 
                                        $compareout = MobileTableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                        echo $compareout;

                                    }

                                    //CPU
                                    if(isset($_GET['CPU']))
                                    { 
                                        $last = 0;
                                        $TITLE = "Cores";
                                        $CPUCOMPARE1 = $CPU1['CPU_CORES'];
                                        if(isset($_GET['CPU2']))
                                        {   
                                            $CPUCOMPARE2 = $CPU2['CPU_CORES'];
                                        }
                                        else
                                        {
                                            $CPUCOMPARE2 = null;
                                        }
                                        $compareout = MobileTableOut($last, $TITLE, $CPUCOMPARE1, $CPUCOMPARE2);
                                        echo $compareout;

                                        $last = 0;
                                        $TITLE = "Threads";
                                        $CPUCOMPARE1 = $CPU1['CPU_THREADS'];
                                        if(isset($_GET['CPU2']))
                                        {   
                                            $CPUCOMPARE2 = $CPU2['CPU_THREADS'];
                                        }
                                        else
                                        {
                                            $CPUCOMPARE2 = null;
                                        }
                                        $compareout = MobileTableOut($last, $TITLE, $CPUCOMPARE1, $CPUCOMPARE2);
                                        echo $compareout;

                                       
                                        $last = 0;
                                        $TITLE = "Base Clock Rate";
                                        $CPUCOMPARE1 = $CPU1['CPU_FREQ'];
                                        if(isset($_GET['CPU2']))
                                        {   
                                            $CPUCOMPARE2 = $CPU2['CPU_FREQ'];
                                        }
                                        else
                                        {
                                            $CPUCOMPARE2 = null;
                                        }
                                        $compareout = MobileTableOut($last, $TITLE, $CPUCOMPARE1, $CPUCOMPARE2);
                                        echo $compareout;


                                        $last = 0;
                                        $TITLE = "Turbo Clock Rate";
                                        $CPUCOMPARE1 = $CPU1['CPU_BOOST'];
                                        if(isset($_GET['CPU2']))
                                        {   
                                            $CPUCOMPARE2 = $CPU2['CPU_BOOST'];
                                        }
                                        else
                                        {
                                            $CPUCOMPARE2 = null;
                                        }
                                        $compareout = MobileTableOut($last, $TITLE, $CPUCOMPARE1, $CPUCOMPARE2);
                                        echo $compareout;    

                                        
                                        //GPU Integrated Graphics
                                        echo "
                                        <tr>
                                            <td colspan='2'> 
                                                <h1 class='text-white fs-5 pt-3 mb-2'>Integrated Graphics</h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='text-center' style='width: 50%;'>
                                                <h1 class='text-white fs-6 fw-light mb-0'>";
                                                if($CPU1['CPU_GRAPHICS'] != null)
                                                {
                                                    echo "$CPU1[CPU_GRAPHICS]</h1></td>";
                                                }
                                                else
                                                {
                                                    echo "-</h1></td>";
                                                }
                                                echo "<td class='text-center' style='width: 50%;'><h1 class='text-white fs-6 fw-light mb-0'>";
                                                if(isset($_GET['CPU2']))
                                                {
                                                    if($CPU2['CPU_GRAPHICS'] != null)
                                                    {
                                                        echo "$CPU2[CPU_GRAPHICS]</h1></td>";
                                                    }
                                                    else
                                                    {
                                                        echo "-</h1></td>";
                                                    }
                                                }
                                               echo "</tr>";
                                        }
                                    ?>
                            </table>        
                        </div>
                    </div>  
                    <div class='accordion-item border-0 bg-dark pb-1'>
                    <h2 class='accordion-header bg-dark mb-2'>
                        <button class='accordion-btn text-white shadow-none w-100 border-0 fs-4 text-start p-3 rounded-3' data-bs-toggle='collapse' data-bs-target='#collapse3' aria-expanded='true' aria-controls='collapse3'>Extras</button>
                    </h2>
                    <div id='collapse3' class='bg-dark accordion-collapse collapse show' aria-labelledby='headingOne'>
                        <div class='accordion-body'>
                            <table class="w-100 big-table">
                                <?php
                                //GPU EXTRAS
                                if(isset($_GET['GPU'])) 
                                {

                                    $last = 0;
                                    $TITLE = "SLI Support";
                                    $GPUCOMPARE1 = $GPU1['GPU_SLI'];
                                    if(isset($_GET['GPU2']))
                                    {   
                                        $GPUCOMPARE2 = $GPU2['GPU_SLI'];
                                    }
                                    else
                                    {
                                        $GPUCOMPARE2 = null;
                                    }                      
                                    $compareout = TableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                    echo $compareout;

                                }

                                $last = 0;
                                $TITLE = "Price";
                                if(isset($_GET['GPU'])) 
                                {
                                    $GPUCOMPARE1 = $GPU1['GPU_PRICE'];
                                    if(isset($_GET['GPU2']))
                                    {   
                                        $GPUCOMPARE2 = $GPU2['GPU_PRICE'];
                                    }
                                    else
                                    {
                                        $GPUCOMPARE2 = null;
                                    }                      
                                    $compareout = TableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                    echo $compareout;

                                }
                                if(isset($_GET['CPU'])) 
                                {
                                    $CPUCOMPARE1 = $CPU1['CPU_PRICE'];
                                    if(isset($_GET['CPU2']))
                                    {   
                                        $CPUCOMPARE2 = $CPU2['CPU_PRICE'];
                                    }
                                    else
                                    {
                                        $CPUCOMPARE2 = null;
                                    }                      
                                    $compareout = TableOut($last, $TITLE, $CPUCOMPARE1, $CPUCOMPARE2);
                                    echo $compareout;

                                }
                                //CPU EXTRAS
                                if(isset($_GET['CPU'])) 
                                {   
                                    $last = 0;
                                    $TITLE = "Cooler Included";
                                    $CPUCOMPARE1 = $CPU1['CPU_COOLER'];
                                    if(isset($_GET['CPU2']))
                                    {   
                                        $CPUCOMPARE2 = $CPU2['CPU_COOLER'];
                                    }
                                    else
                                    {
                                        $CPUCOMPARE2 = null;
                                    }                      
                                    $compareout = TableOut($last, $TITLE, $CPUCOMPARE1, $CPUCOMPARE2);
                                    echo $compareout;
                                }   
                                
                                $last = 1;
                                $TITLE = "Age";
                                if(isset($_GET['GPU']))
                                {
                                    $AGE1 = date('Y-m-d',strtotime($GPU1['GPU_DATE'])); 
                                    
                                    if(isset($_GET['GPU2']))
                                    {   
                                        $AGE2 = date('Y-m-d',strtotime($GPU2['GPU_DATE']));          
                                    } 
                                    else
                                    {
                                        $AGE2 = null;
                                    }        
                                }
                                if(isset($_GET['CPU']))
                                {
                                    $AGE1 = date('Y-m-d',strtotime($CPU1['CPU_DATE'])); 
                                    
                                    if(isset($_GET['CPU2']))
                                    {   
                                        $AGE2 = date('Y-m-d',strtotime($CPU2['CPU_DATE']));          
                                    } 
                                    else
                                    {
                                        $AGE2 = null;
                                    }        
                                }                    
                                $compareout = TableOut($last, $TITLE, $AGE1, $AGE2);
                                echo $compareout;
                                ?>
                            </table>
                            <table class="w-100 mobile-table">
                                <?php
                                //GPU EXTRAS

                                if(isset($_GET['GPU'])) 
                                {
                                    $last = 0;
                                    $TITLE = "SLI Support";
                                    $GPUCOMPARE1 = $GPU1['GPU_SLI'];
                                    if(isset($_GET['GPU2']))
                                    {   
                                        $GPUCOMPARE2 = $GPU2['GPU_SLI'];
                                    }
                                    else
                                    {
                                        $GPUCOMPARE2 = null;
                                    }                      
                                    $compareout = MobileTableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                    echo $compareout;

                                }
                                $last = 0;
                                $TITLE = "Price";
                                if(isset($_GET['GPU'])) 
                                {

                                    $GPUCOMPARE1 = $GPU1['GPU_PRICE'];
                                    if(isset($_GET['GPU2']))
                                    {   
                                        $GPUCOMPARE2 = $GPU2['GPU_PRICE'];
                                    }
                                    else
                                    {
                                        $GPUCOMPARE2 = null;
                                    }                      
                                    $compareout = MobileTableOut($last, $TITLE, $GPUCOMPARE1, $GPUCOMPARE2);
                                    echo $compareout;

                                }
                                if(isset($_GET['CPU'])) 
                                {

                                    $last = 0;
                                    $TITLE = "Price";
                                    $CPUCOMPARE1 = $CPU1['CPU_PRICE'];
                                    if(isset($_GET['CPU2']))
                                    {   
                                        $CPUCOMPARE2 = $CPU2['CPU_PRICE'];
                                    }
                                    else
                                    {
                                        $CPUCOMPARE2 = null;
                                    }                      
                                    $compareout = MobileTableOut($last, $TITLE, $CPUCOMPARE1, $CPUCOMPARE2);
                                    echo $compareout;

                                }
                                //CPU EXTRAS
                                if(isset($_GET['CPU'])) 
                                {   
                                    $last = 0;
                                    $TITLE = "Cooler Included";
                                    $CPUCOMPARE1 = $CPU1['CPU_COOLER'];
                                    if(isset($_GET['CPU2']))
                                    {   
                                        $CPUCOMPARE2 = $CPU2['CPU_COOLER'];
                                    }
                                    else
                                    {
                                        $CPUCOMPARE2 = null;
                                    }                      
                                    $compareout = MobileTableOut($last, $TITLE, $CPUCOMPARE1, $CPUCOMPARE2);
                                    echo $compareout;
                                }   
                                
                                $last = 1;
                                $TITLE = "Age";
                                if(isset($_GET['GPU']))
                                {
                                    $AGE1 = date('Y-m-d',strtotime($GPU1['GPU_DATE'])); 
                                    
                                    if(isset($_GET['GPU2']))
                                    {   
                                        $AGE2 = date('Y-m-d',strtotime($GPU2['GPU_DATE']));          
                                    } 
                                    else
                                    {
                                        $AGE2 = null;
                                    }        
                                }
                                if(isset($_GET['CPU']))
                                {
                                    $AGE1 = date('Y-m-d',strtotime($CPU1['CPU_DATE'])); 
                                    
                                    if(isset($_GET['CPU2']))
                                    {   
                                        $AGE2 = date('Y-m-d',strtotime($CPU2['CPU_DATE']));          
                                    } 
                                    else
                                    {
                                        $AGE2 = null;
                                    }        
                                }                    
                                $compareout = MobileTableOut($last, $TITLE, $AGE1, $AGE2);
                                echo $compareout;
                                ?>
                            </table>
                        </div>
                    </div>       
                    </div>
                </div>                 
            </div>
        </div>

        
    </div>
    </div> 
    </div>   
    </div>         
</body>

