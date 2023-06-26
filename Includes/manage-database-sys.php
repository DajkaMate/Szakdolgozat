<?php
    $name = ""; 
    $min_cpu_intel = "";
    $min_cpu_amd = "";
    $min_gpu_nvidia = "";
    $min_gpu_amd = "";
    $min_ram = "";
    $rec_cpu_intel = "";
    $rec_cpu_amd = "";
    $rec_gpu_nvidia = "";
    $rec_gpu_amd = "";
    $rec_ram = "";
    $os = "";
    $space = "";
    
    $error = "";
    $mess = array("name" => "", "min_cpu_intel" => "", "min_cpu_amd" => "", "min_gpu_nvidia" => "", "min_gpu_amd" => "", "min_ram" => "", "rec_cpu_intel" => "", "rec_cpu_amd" => "", "rec_gpu_nvidia" => "", "rec_gpu_amd" => "", "rec_ram" => "", "os" => "", "space" => "", );

    if(isset($_POST["submit"])) 
    {  
        $name = $_POST["name"];
        $min_cpu_intel = $_POST["min_cpu_intel"];
        $min_cpu_amd = $_POST["min_cpu_amd"];
        $min_gpu_nvidia = $_POST["min_gpu_nvidia"];
        $min_gpu_amd = $_POST["min_gpu_amd"];
        $rec_cpu_intel = $_POST["rec_cpu_intel"];
        $rec_cpu_amd = $_POST["rec_cpu_amd"];
        $rec_gpu_nvidia = $_POST["rec_gpu_nvidia"];
        $rec_gpu_amd = $_POST["rec_gpu_amd"];

        if(empty($_POST["min_ram"]))
        {
            $mess["min_ram"] = "1";
            $error = true;
        }
        else
        {
            $min_ram = $_POST["min_ram"];
        }

        if(empty($_POST["rec_ram"]))
        {
            $mess["rec_ram"] = "1";
            $error = true;
        }
        else
        {
            $rec_ram = $_POST["rec_ram"];
        }

        if(empty($_POST["os"]))
        {
            $mess["os"] = "1";
            $os = true;
        }
        else
        {
            $rec_ram = $_POST["rec_ram"];
        }

        if(empty($_POST["space"]))
        {
            $mess["space"] = "1";
            $error = true;
        }
        else
        {
            $space = $_POST["space"];
        }
        

        if($error == false)
        {

            AddSys($name, $min_cpu_intel, $min_cpu_amd, $min_gpu_nvidia, $min_gpu_amd, $min_ram, $rec_cpu_intel, $rec_cpu_amd, $rec_gpu_nvidia, $rec_gpu_amd, $rec_ram, $os, $space);
            header("Location: success.php?q=1");

            $name = ""; 
            $min_cpu_intel = "";
            $min_cpu_amd = "";
            $min_gpu_nvidia = "";
            $min_gpu_amd = "";
            $min_ram = "";
            $rec_cpu_intel = "";
            $rec_cpu_amd = "";
            $rec_gpu_nvidia = "";
            $rec_gpu_amd = "";
            $rec_ram = "";
            $os = "";
            $space = "";
        }
    }
?>
<body class="bg-dark " id='override'>
    <title>Add data to database</title>
    <div class="rgb-bg container-fluid ">
        <div class="container pt-5 pb-5">
            <h2 class="text-white fs-1"><i class='bi bi-cpu pe-2'></i>Upload System Requirements</h2>
        </div>
    </div>
    <div class="container">
    <form action="" method="POST">
        <div class="container-fluid row pt-5">
            <div class="w-25">
                <h1 class="text-white fs-5">Game</h1>
                <select class="form-select mb-4" name="name">
                    <?php
                        $sortby = "A-Z";
                        $result = Games($sortby);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo"<option";
                                if(isset($_POST['name']) && $_POST['name'] == $row["G_ID"])
                                {
                                    echo " selected "; 
                                }
                            echo " value='$row[G_ID]'>$row[G_NAME]</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="container-fluid row pt-5">
            <div class="col">
                <h1 class="text-center text-white fs-2">Minimum</h1>
                <h1 class="text-white fs-5">CPU intel</h1>
                <select class="form-select mb-4" name="min_cpu_intel">
                    <?php
                        $result = AllCpu();
                        while($row = mysqli_fetch_assoc($result))
                        {
                            if($row["CPU_MANUF"] == "Intel")
                            {
                                echo"<option";
                                if(isset($_POST['min_cpu_intel']) && $_POST['min_cpu_intel'] == $row["CPU_ID"])
                                {
                                    echo " selected "; 
                                }
                                echo " value='$row[CPU_ID]'>$row[CPU_MANUF] $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME]</option>";
                            }
                        
                        }
                    ?>
                </select>
                <h1 class="text-white fs-5">CPU AMD</h1>
                <select class="form-select mb-4" name="min_cpu_amd">
                    <?php
                        $result = AllCpu();
                        while($row = mysqli_fetch_assoc($result))
                        {
                            if($row["CPU_MANUF"] == "AMD")
                            {
                                echo"<option";
                                if(isset($_POST['min_cpu_amd']) && $_POST['min_cpu_amd'] == $row["CPU_ID"])
                                {
                                    echo " selected "; 
                                }
                                echo " value='$row[CPU_ID]'>$row[CPU_MANUF] $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME]</option>";
                            }
                        
                        }
                    ?>
                </select>
                <h1 class="text-white fs-5">GPU Nvidia</h1>
                <select class="form-select mb-4" name="min_gpu_nvidia">
                    <?php
                        $result = AllGpu();
                        while($row = mysqli_fetch_assoc($result))
                        {
                            if($row["GPU_MANUF"] == "NVIDIA")
                            {
                                echo"<option";
                                if(isset($_POST['min_gpu_nvidia']) && $_POST['min_gpu_nvidia'] == $row["GPU_ID"])
                                {
                                    echo " selected "; 
                                }
                                echo " value='$row[GPU_ID]'>$row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME]</option>";
                            }
                        
                        }
                    ?>
                </select>
                <h1 class="text-white fs-5">GPU Nvidia</h1>
                <select class="form-select mb-4" name="min_gpu_amd">
                    <?php
                        $result = AllGpu();
                        while($row = mysqli_fetch_assoc($result))
                        {
                            if($row["GPU_MANUF"] == "AMD")
                            {
                                echo"<option";
                                if(isset($_POST['min_gpu_amd']) && $_POST['min_gpu_amd'] == $row["GPU_ID"])
                                {
                                    echo " selected "; 
                                }
                                echo " value='$row[GPU_ID]'>$row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME]</option>";
                            }
                        
                        }
                    ?>
                </select>
                <h1 class="fs-5 <?php if($mess['min_ram'] !== "") echo "text-danger"; else echo " text-white"; ?>">Ram</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['min_ram'] !== "") echo "border border-danger"; else echo " text-white"; ?>" value="<?php echo $min_ram?>" placeholder="GB" name="min_ram">
            </div>
            <div class="col">
                <h1 class="text-center text-white fs-2">Recommanded</h1>
                <h1 class="text-white fs-5">CPU intel</h1>
                <select class="form-select mb-4" name="rec_cpu_intel">
                    <?php
                        $result = AllCpu();
                        while($row = mysqli_fetch_assoc($result))
                        {
                            if($row["CPU_MANUF"] == "Intel")
                            {
                                echo"<option";
                                if(isset($_POST['rec_cpu_intel']) && $_POST['rec_cpu_intel'] == $row["CPU_ID"])
                                {
                                    echo " selected "; 
                                }
                                echo " value='$row[CPU_ID]'>$row[CPU_MANUF] $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME]</option>";
                            }
                        
                        }
                    ?>
                </select>
                <h1 class="text-white fs-5">CPU AMD</h1>
                <select class="form-select mb-4" name="rec_cpu_amd">
                    <?php
                        $result = AllCpu();
                        while($row = mysqli_fetch_assoc($result))
                        {
                            if($row["CPU_MANUF"] == "AMD")
                            {
                                echo"<option";
                                if(isset($_POST['rec_cpu_amd']) && $_POST['rec_cpu_amd'] == $row["CPU_ID"])
                                {
                                    echo " selected "; 
                                }
                                echo " value='$row[CPU_ID]'>$row[CPU_MANUF] $row[CPU_BRANDNAME] $row[CPU_LINEUP] $row[CPU_NAME]</option>";
                            }
                        
                        }
                    ?>
                </select>
                <h1 class="text-white fs-5">GPU Nvidia</h1>
                <select class="form-select mb-4" name="rec_gpu_nvidia">
                    <?php
                        $result = AllGpu();
                        while($row = mysqli_fetch_assoc($result))
                        {
                            if($row["GPU_MANUF"] == "NVIDIA")
                            {
                                echo"<option";
                                if(isset($_POST['rec_gpu_nvidia']) && $_POST['rec_gpu_nvidia'] == $row["GPU_ID"])
                                {
                                    echo " selected "; 
                                }
                                echo " value='$row[GPU_ID]'>$row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME]</option>";
                            }
                        
                        }
                    ?>
                </select>
                <h1 class="text-white fs-5">GPU AMD</h1>
                <select class="form-select mb-4" name="rec_gpu_amd">
                    <?php
                        $result = AllGpu();
                        while($row = mysqli_fetch_assoc($result))
                        {
                            if($row["GPU_MANUF"] == "AMD")
                            {
                                echo"<option";
                                if(isset($_POST['rec_gpu_amd']) && $_POST['rec_gpu_amd'] == $row["GPU_ID"])
                                {
                                    echo " selected "; 
                                }
                                echo " value='$row[GPU_ID]'>$row[GPU_MANUF] $row[GPU_BRANDNAME] $row[GPU_PREFIX] $row[GPU_NAME]</option>";
                            }
                        
                        }
                    ?>
                </select>
                <h1 class="fs-5 <?php if($mess['rec_ram'] !== "") echo "text-danger"; else echo " text-white"; ?>">Ram</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['rec_ram'] !== "") echo "border border-danger"; else echo " text-white"; ?>" value="<?php echo $rec_ram?>" placeholder="GB" name="rec_ram">
            </div>
        </div>
        <div class="container fluid row mt-5">
            <div class="col">
                <h1 class="fs-5 <?php if($mess['space'] !== "") echo "text-danger"; else echo " text-white"; ?>">Space</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['space'] !== "") echo "border border-danger"; else echo " text-white"; ?>" value="<?php echo $space?>" placeholder="GB"name="space">
            </div>
            <div class="col">
            <h1 class="text-white fs-5">Os</h1>
                <select class="form-select mb-4" name="os">
                    <?php
                        $result = AllOs();
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo"<option";
                            if(isset($_POST['os']) && $_POST['os'] == $row["OS_ID"])
                            {
                                echo " selected "; 
                            }
                            echo " value='$row[OS_ID]'>$row[OS]</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <button type="submit" name="submit" class="mt-5 mb-5 btn btn-outline-light w-25 p-2 fs-5 d-block mx-auto">Upload</button></a>
        </form>
    </div>
    <script src="js\jquery.js"></script>
    <script>
        
        var manufacturer = $("[name=brandname] option").detach()
        $("[name=manuf]").change(function() {
        var val = $(this).val()
        $("[name=brandname] option").detach()
        manufacturer.filter("." + val).clone().appendTo("[name=brandname]")
        }).change()

        var prefix = $("[name=prefix] option").detach()
        $("[name=manuf]").change(function() {
        var val = $(this).val()
        $("[name=prefix] option").detach()
        prefix.filter("." + val).clone().appendTo("[name=prefix]")
        }).change()


    </script>
