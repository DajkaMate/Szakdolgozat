<title>Supported Components</title>
<body class="bg-dark">
    <div class="rgb-bg container-fluid mobile-header">
        <div class="container py-5" data-aos='fade-in'>
            <h2 class="text-white pb-1 fs-1 "><i class="bi bi-list-ul pe-2"></i>Supported Components</h2>
            <p class="text-white fs-4">Browse all hardware components currently supported in our database.</p>
        </div>
    </div>
    <div class="bg-dark container-fluid pt-3 pb-5">
        <div class="container py-3">
                <h1 class='text-white fs-1'>GPU-s</h1>
                    <div gx-0 class='row'>
                        <?php   
                            $aos = 0;
                            $BrandType = "GPU";
                            $result = BrandType($BrandType);
                            if ($result->num_rows > 0)  
                            {   
                                while($row = $result-> fetch_assoc())
                                {           
                                    $aos = $aos + 100;                    
                                    echo"
                                    <div class='col-6 col-md-6 col-lg-4 col-xl-2 gamecard px-0' data-aos-delay='$aos' data-aos='fade-up' >              
                                        <a href='?p=SupportedComponents&GPU=$row[BRAND_NAME]' class='card card-bg border-0 rounded-4 p-3 text-decoration-none'>                         
                                            <img data-tilt data-tilt-scale='1.03' class='w-100 rounded-3' src='img/brands-img/$row[LOGO]'>
                                            <div class='card-body ps-0 pb-0'>
                                                <h4 class='text-start fs-5 card-title text-white p-0 '>$row[BRAND_NAME]</h4> 
                                            </div>
                                        </a>
                                    </div>";    
                                }
                            }             
                            ?>
                         </div>
                        <div gx-0 class='row'>
                        <h1 class='text-white fs-1 pt-5'>CPU-s</h1>
                        <?php   
                            $aos = 0;
                            $BrandType = "CPU";
                            $result = BrandType($BrandType);
                            if ($result->num_rows > 0)  
                            {   
                            while($row = $result-> fetch_assoc())
                            {     
                                $aos = $aos + 100;                                     
                                echo"<div class='col-6 col-md-6 col-lg-4 col-xl-2 gamecard px-0' data-aos-delay='$aos' data-aos='fade-up' >
                                <a href='?p=SupportedComponents&CPU=$row[BRAND_NAME]' class='card card-bg border-0 rounded-4 p-3 text-decoration-none'>                         
                                <img data-tilt data-tilt-scale='1.03' class='w-100 rounded-3' src='img/brands-img/$row[LOGO]'>
                                <div class='card-body ps-0 pb-0'>
                                <h4 class='text-start fs-5 card-title text-white p-0 '>$row[BRAND_NAME]</h4> 
                                </div>
                                </a>
                                </div>";    
                            }
                        }             
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>    
