

<div class="container pt-5">
    <?php
        if(isset($_GET['state']))
        {
            if($_GET['state'] == 'name taken')
            {
                echo "<h1 class='text-danger text-center pb-3 fs-4'>Row already in database with the same name</h1>";
            } 
            if($_GET['state'] == 'done')
            {
                echo "<h1 class='text-success text-center  pb-3 fs-4'>Row added to database</h1>";
            }
            if($_GET['state'] == 'data missing')
            {
                echo "<h1 class='text-success text-center  pb-3 fs-4'>Empty fields</h1>";
            }   
        }
    ?>        
    <nav> 
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active fs-4" style="width: 200px;"  data-bs-toggle="tab" data-bs-target="#nav-cpu" type="button" role="tab" aria-controls="nav-cpu" aria-selected="true">CPU</button>
            <button class="nav-link fs-4" style="width: 200px;"  data-bs-toggle="tab" data-bs-target="#nav-gpu" type="button" role="tab" aria-controls="nav-gpu" aria-selected="false">GPU</button>
            <button class="nav-link fs-4" style="width: 200px;"  data-bs-toggle="tab" data-bs-target="#nav-game" type="button" role="tab" aria-controls="nav-game" aria-selected="true">Game</button>
            <button class="nav-link fs-4" style="width: 200px;"  data-bs-toggle="tab" data-bs-target="#nav-sys" type="button" role="tab" aria-controls="nav-sys" aria-selected="true">System Rec</button>    
        </div>
            <div class="tab-content pb-5 mb-5" id="nav-tabContent">      
                <div class="tab-pane fade  show active" id="nav-cpu" role="tabpanel" aria-labelledby="nav-cpu-tab" tabindex="0">
                    
                </div>  
                <div class="tab-pane fade " id="nav-game" role="tabpanel" aria-labelledby="nav-game-tab" tabindex="0">
                    <form action="includes/data-input.php" method="POST" class="needs-validation" novalidate>
                        <input placeholder="0" type="hidden" value="GAME" name=type required> 
                        <div class="container-fluid row gx-2 pt-5">
                            <h2 class="text-white fs-2 pb-4">Game Data</h2>
                            <div class="col-3">
                                <h1 class="text-white fs-5">Name</h1>
                                <input type="text" class="form-control mb-4" placeholder="Name" name="name" required>
                                <h1 class="text-white fs-5">Genre</h1>
                                <input type="text" class="form-control mb-4" placeholder="Genre" name="genre" required>
                                <h1 class="text-white fs-5">Developer</h1>
                                <input type="text" class="form-control mb-4" placeholder="Developer" name="dev" required>
                            </div>
                            <div class="col-3 ms-5 mb-5">
                                <h1 class="text-white fs-5">Cover</h1>
                                <input type="text" class="form-control mb-4" placeholder="Gamename_Cover.jpg" name="cover" required>
                                <h1 class="text-white fs-5">Wide</h1>
                                <input type="text" class="form-control mb-4" placeholder="Gamename_Wide.jpg" name="wide" required>    
                                <h1 class="text-white fs-5">Date</h1>
                                <input class="form-control text-white mb-4" placeholder="0" type="date" name=date required> 
                            </div> 
                        </div>   
                        <button type="submit" class="mt-5 mb-5 btn btn-outline-light w-25 p-2 fs-5 d-block mx-auto">Upload</button></a>
                    </form> 
                </div> 
                <div class="tab-pane fade " id="nav-sys" role="tabpanel" aria-labelledby="nav-sys-tab" tabindex="0">
                    <form action="includes/data-input.php" method="POST" class="needs-validation" novalidate>
                        <input placeholder="0" type="hidden" value="SYS" name=type required> 
                        <div class=" row pt-5">
                            <h2 class="text-white fs-2 pb-4">System Requirements</h2>
                            <div class="col-3">
                                <h1 class="text-white fs-5">Game Name</h1>
                                <select class="form-select mb-4" name="G_NAME">  
                                    <option selected hidden value="null">Select Game</option> 
                                    <?php
                                        $sortby = "A-Z";
                                        $result = Games($sortby);
                                        if ($result->num_rows > 0) 
                                        {   
                                            while($row = $result-> fetch_assoc())
                                            {
                                                echo "<option>$row[G_NAME]</option>";
                                            }
                                        }
                                    ?>              
                                </select>
                            </div>  
                            <div class="row pt-5">                  
                                <div class="col-4">
                                    <h1 class="text-white fs-5">Minimum Intel CPU</h1>
                                    <input type="text" class="form-control mb-4" placeholder="Minimum Intel CPU" name="SYS_MIN_CPU_INTEL" required>  
                                    <h1 class="text-white fs-5">Minimum AMD CPU</h1>
                                    <input type="text" class="form-control mb-4" placeholder="Minimum AMD CPU" name="SYS_MIN_CPU_AMD" required>
                                    <h1 class="text-white fs-5">Minimum Nvidia GPU</h1>
                                    <input type="text" class="form-control mb-4" placeholder="Minimum Nvidia GPU" name="SYS_MIN_GPU_NVIDIA" required>    
                                    <h1 class="text-white fs-5">Minimum AMD GPU</h1>
                                    <input type="text" class="form-control mb-4" placeholder="Minimum AMD GPU" name="SYS_MIN_GPU_AMD" required>    
                                    <h1 class="text-white fs-5">Minimum RAM</h1>
                                    <input type="number" class="form-control mb-4" placeholder="X GB" name="SYS_MIN_RAM" required> 
                                </div>
                                <div class="col-4 ms-5">
                                    <h1 class="text-white fs-5">Recommended Intel CPU</h1>
                                    <input type="text" class="form-control mb-4" placeholder="Recommended Intel CPU" name="SYS_REC_CPU_INTEL" required>  
                                    <h1 class="text-white fs-5">Recommended AMD CPU</h1>
                                    <input type="text" class="form-control mb-4" placeholder="Recommended AMD CPU" name="SYS_REC_CPU_AMD" required>
                                    <h1 class="text-white fs-5">Recommended Nvidia GPU</h1>
                                    <input type="text" class="form-control mb-4" placeholder="Recommended Nvidia GPU" name="SYS_REC_GPU_NVIDIA" required>    
                                    <h1 class="text-white fs-5">Recommended AMD GPU</h1>
                                    <input type="text" class="form-control mb-4" placeholder="Recommended AMD GPU" name="SYS_REC_GPU_AMD" required>    
                                    <h1 class="text-white fs-5">Recommended RAM</h1>
                                    <input type="number" class="form-control mb-4" placeholder="X GB" name="SYS_REC_RAM" required> 
                                </div>  
                                <div class="col-2 ms-5">
                                    <h1 class="text-white fs-5">OS</h1>
                                    <input type="text" class="form-control mb-4" placeholder="OS" name="SYS_OS" required>  
                                    <h1 class="text-white fs-5">Minimum Space</h1>
                                    <input type="number" class="form-control mb-4" placeholder="X GB" name="SYS_SPACE" required>
                                </div>  
                            </div>  
                            <button type="submit" class="mt-5 mb-5 btn btn-outline-light w-25 p-2 fs-5 d-block mx-auto">Upload</button></a>
                        </div>
                    </form>                  
                </div>
                <div class="tab-pane fade" id="nav-gpu" role="tabpanel" aria-labelledby="nav-gpu-tab" tabindex="0">
                    <form action="includes/data-input.php" method="POST" class="needs-validation" novalidate>
                        <input placeholder="0" type="hidden" value="GPU" name=type required> 
                        <div class="container-fluid row gx-2 pt-5">
                            <h2 class="text-white fs-2 pb-4">GPU</h2>
                            <div class="col-2">
                                <h1 class="text-white fs-5">Manufacturer</h1>
                                <select class="form-select mb-4 " name="gpumanufacturer" >                
                                    <option selected value="NVIDIA">NVIDIA</option>
                                    <option value="AMD">AMD</option>
                                </select>
                                <h1 class="text-white fs-5 ">Brand Name</h1>
                                <select class="form-select mb-4" name="gpubrandname">                
                                    <option class="NVIDIA" value="GeForce GT">GeForce GT</option>   
                                    <option class="NVIDIA" value="GeForce GTX">GeForce GTX</option>
                                    <option class="NVIDIA" selected value="GeForce RTX">GeForce RTX</option>
                                    <option class="AMD" value="Radeon RX">Radeon RX</option>
                                    <option class="AMD" value="Radeon R9">Radeon R9</option>
                                    <option class="AMD" value="Radeon R7">Radeon R7</option>
                                    <option class="AMD" value="Radeon HD">Radeon HD</option>
                                </select>
                                <h1 class="text-white fs-5">Name</h1>
                                <input type="number" class="form-control mb-4" placeholder="Name" name="name" required>
                                <h1 class="text-white fs-5">Version</h1>
                                <select class="form-select mb-4" name="gpuversion"> 
                                    <option class="NVIDIA" value="Ti">Ti</option>   
                                    <option class="NVIDIA" value="Super">Super</option>
                                    <option class="NVIDIA AMD" selected  value="">None</option>
                                    <option class="AMD" value="XT">XT</option>
                                    <option class="AMD" value="XTX">XTX</option>
                                </select>
                            </div>
                            <div class="col-2 ms-5">
                                <h1 class="text-white fs-5">Memory</h1>
                                <input type="number" placeholder="X GB" class="form-control mb-4 "  name="memory" required>
                                <h1 class="text-white fs-5">Memory Type</h1>
                                <select class="form-select mb-4" aria-label="Default select example" name=MemoryType required>
                                    <option value="DDR3">DDR3</option>                  
                                    <option value="GDDR3">GDDR3</option>
                                    <option value="GDDR4">GDDR4</option>
                                    <option value="GDDR5">GDDR5</option>
                                    <option value="GDDR5X">GDDR5X</option>
                                    <option value="GDDR6">GDDR6</option>
                                    <option selected value="GDDR6X">GDDR6X</option>
                                </select>
                                <h1 class="text-white fs-5">Memory bit</h1>
                                <input type="number" class="form-control mb-4" placeholder="X-bit"  name="memorybit" required>
                                <h1 class="text-white fs-5">Base Speed</h1>
                                <input type="number" class="form-control mb-4" placeholder="X-MHz"  name="basespeed" required>
                            </div> 
                            <div class="col-2 ms-5">
                                <h1 class="text-white fs-5">Boost Speed</h1>
                                <input type="number" class="form-control mb-4" placeholder="X-MHz"  name="boostspeed" required>
                                <h1 class="text-white fs-5">Date</h1>
                                <input class="form-control text-white mb-4" placeholder="0" type="date" name=date required>
                                <h1 class="text-white fs-5 ">Series</h1>
                                <input type="number" class="form-control mb-4" placeholder="X Series" name="series" required>
                                <h1 class="text-white fs-5 ">image</h1>
                                <input type="text" class="form-control mb-4" value="img/gpu-img/" placeholder="img/gpu-img/.." name="img" required>
                            </div>
                            <div class="col-2 ms-5">
                                <h1 class="text-white fs-5">DirectX</h1>
                                <select class="form-select mb-4" aria-label="DirectX" name=DirectX required>            
                                    <option value="DirectX 9">DirectX 9</option>
                                    <option value="DirectX 10">DirectX 10</option>
                                    <option value="DirectX 11">DirectX 11</option>
                                    <option value="DirectX 12">DirectX 12</option>
                                    <option selected value="DirectX 12 Ultimate">DirectX 12 Ultimate</option>
                                </select>
                                <h1 class="text-white fs-5">SLI Support</h1>
                                <select class="form-select mb-4" aria-label="Default select example" name="SLI" required>
                                    <option selected value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <h1 class="text-white fs-5">GPU Level</h1>
                                <select class="form-select mb-4" aria-label="Default select example" name="LEVEL" required>
                                    <option selected value="1">Enthusiast-Class</option>
                                    <option value="2">High-End</option>
                                    <option value="3">Performance-Segment</option>
                                    <option value="4">Mid Range</option>
                                    <option value="5">Entry Level</option>
                                </select>
                                <h1 class="text-white fs-5 ">image</h1>
                                <input type="number" class="form-control mb-4" placeholder="Lauch Price in USD" name="PRICE" required>
                            </div>
                        </div>
                        <button type="submit" class="mt-5 mb-5 btn btn-outline-light w-25 p-2 fs-5 d-block mx-auto">Upload</button></a>
                    </form>
                <form action="" method="post">
                <table class='table mytable table-responsive table-dark table-hover'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class='text-center'>Memory Config</th>
                            <th class='text-center'>Memory Type</th>
                            <th class='text-center'>Interface Width</th>
                            <th class='text-center'>Base Clock</th>
                            <th class='text-center'>Boost Clock</th>
                            <th class='text-center'>Date</th>
                            <th class='text-center' style="width: 10px;"></th>
                            <th class='text-center' style="width: 10px;"></th>    
                        </tr>
                    </thead>
                <tbody>
                    <?php
                        $result = AllGpu();
                        $i = 0;
                        while($row = $result-> fetch_assoc())
                        {       
                            if($index++ < 100)
                            {
                                echo "
                                <tr class='align-middle'>
                                    <td style='width: 240px;'><a class='text-decoration-none' href='?p=HardwarePage&GPU=$row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_NAME]'>$row[GPU_BRANDNAME] $row[GPU_NAME]</a></td> 
                                    <td class='text-center'>$row[GPU_MEM] GB</td>
                                    <td class='text-center'>$row[GPU_MEMTYPE]</td>
                                    <td class='text-center'>$row[GPU_BIT]-bit</td>
                                    <td class='text-center'>$row[GPU_BASE] MHz</td>
                                    <td class='text-center'>$row[GPU_BOOST] MHz</td>
                                    <td class='text-center'>$row[GPU_DATE]</td>
                                    <td class='text-center'> 
                                        <a class='p-0 m-0 text-decoration-none text-danger' data-bs-toggle='modal' href='' data-bs-target='#confirm-modal'>
                                            <i class='fs-5 bi bi-trash'></i>
                                        </a>
                                    </td>
                                    <td class='text-center'>
                                        <a class='p-0 m-0 text-decoration-none text-warning' href='Assets/Includes/edit-row.php?type=GPU&row=$row[GPU_NAME]'>
                                            <i class='fs-5 bi bi-pencil-fill'></i>
                                        </a>
                                    </td>          
                                </tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>                            
            <a class='btn p-0 m-0 text-decoration-none text-danger' href='Assets/Includes/delete-row.php?type=GPU&row=$row[GPU_NAME]'><i class='fs-5 bi bi-trash'></i></a></td>
        </nav>
        
        <script>
                    (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
                })
            })()
        </script>
        
        <script>
            var gpumanufacturer = $("[name=gpubrandname] option").detach()
            $("[name=gpumanufacturer]").change(function() {
            var val = $(this).val()
            $("[name=gpubrandname] option").detach()
            gpumanufacturer.filter("." + val).clone().appendTo("[name=gpubrandname]")
            }).change()
        </script>
        <script>
            var gpuversion = $("[name=gpuversion] option").detach()
            $("[name=gpumanufacturer]").change(function() {
            var val = $(this).val()
            $("[name=gpuversion] option").detach()
            gpuversion.filter("." + val).clone().appendTo("[name=gpuversion]")
            }).change()
        </script>
    </div>
</div>

