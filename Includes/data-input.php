<?php
if($_POST["type"] == "GAME")
{
    $name = $_POST["name"];
    $genre = $_POST["genre"];
    $dev = $_POST["dev"];
    $date = date('Y-m-d h:i:s', strtotime($_POST["date"])); 
    $cover = $_POST["cover"];
    $wide = $_POST["wide"];

    if (!empty($_POST["name"]) || !empty($_POST["genre"]) || !empty($_POST["dev"]) || !empty($_POST["date"]) || !empty($_POST["cover"]) || !empty($_POST["wide"]))
    {
        include "database.php";
        $conn = Connect();
        

        if (mysqli_connect_error())
        {
            die('Connect Error('. mysqli_connect_errorno().')'.mysqli_connect_error());
        }
        else
        {
            $SELECT = "SELECT G_NAME from games where G_NAME = ? Limit 1";
            $INSERT = "INSERT INTO games (G_NAME, G_GENRE, G_DEV, G_DATE, G_COVER, G_WIDE)
            Values(?, ?, ?, ?, ?, ?)";
    
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s",$name);
            $stmt->execute();
            $stmt->bind_result($name);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
    
            if ($rnum==0)
            {
                $stmt = $conn->prepare($INSERT); 
                $stmt->bind_param("ssssss", $name, $genre, $dev, $date, $cover, $wide);
                $stmt->execute();
                header("Location: ./?p=ManageDatabase&state=done");
            }
            else
            {
                header("Location: ./?p=ManageDatabase&state=name taken");
            }
        }
        $stmt->close();
        $conn->close();
    }
    else
    {
        header("Location: ./?p=ManageDatabase&state=data missing");
        die;
    }
}
if($_POST["type"] == "GPU")
{
    $manufacturer = $_POST["gpumanufacturer"];
    $brandname = $_POST["gpubrandname"];
    $name = $_POST["name"];
    $memory = $_POST["memory"];
    $memoryType = $_POST["MemoryType"];
    $memorybit = $_POST["memorybit"];
    $basespeed = $_POST["basespeed"];
    $boostspeed = $_POST["boostspeed"];
    $date = date('Y-m-d h:i:s', strtotime($_POST["date"])); 
    $series = $_POST["series"];
    $image = $_POST["img"];
    $DirectX = $_POST["DirectX"];
    $SLI = $_POST["SLI"];
    $LEVEL = $_POST["LEVEL"];
    $PRICE = $_POST["PRICE"];

    if(!empty($_POST['gpuversion'])) 
    { 
        $name = $name . " " . $_POST['gpuversion'];   
    }

    if (!empty($manufacturer) || !empty($brandname) || !empty($name) || !empty($memory) || !empty($memoryType) || !empty($memorybit) || !empty($basespeed) || !empty($boostspeed) || !empty($date) || !empty($series) || !empty($image) || !empty($DirectX) || !empty($SLI) || !empty($LEVEL) || !empty($PRICE))
    {
        include "database.php";
        $conn = Connect();

        if (mysqli_connect_error())
        {
            die('Connect Error('. mysqli_connect_errorno().')'.mysqli_connect_error());
        }
        else
        {
            $SELECT = "SELECT GPU_NAME from GPU where GPU_NAME = ? Limit 1";
            $INSERT = "INSERT INTO GPU (GPU_NAME, GPU_BRANDNAME, GPU_MANUF, GPU_MEM, GPU_MEMTYPE, GPU_BIT, GPU_BASE, GPU_BOOST, GPU_DATE, GPU_SERIES, GPU_IMG, GPU_DIRECTX, GPU_SLI, GPU_LEVEL, GPU_PRICE)
            Values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("i",$name);
            $stmt->execute();
            $stmt->bind_result($name);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
    
            if ($rnum==0)
            {
                $stmt = $conn->prepare($INSERT); 
                $stmt->bind_param("sssisiiisissiii", $name, $brandname, $manufacturer, $memory, $memoryType, $memorybit, $basespeed, $boostspeed, $date, $series, $image, $DirectX, $SLI, $LEVEL, $PRICE);
                $stmt->execute();
                header("Location: ./../?p=ManageDatabase&state=done");
            }
            else
            {
                header("Location:./../?p=ManageDatabase&state=name taken");
            }
        }
        $stmt->close();
        $conn->close();
    }
    else
    {
        echo "All field are required!"; 
        die();
    } 
} 
if($_POST["type"] == "CPU")
{
    $cpumanufacturer = $_POST["cpumanufacturer"];
    $cpubrandname = $_POST["cpubrandname"];
    $name = $_POST["name"];
    $series = $_POST["series"];
    $base = $_POST["base"];
    $turbo = $_POST["turbo"];
    $cores = $_POST["cores"];
    $threads = $_POST["threads"];
    $gen = $_POST["gen"];
    $graphics = $_POST["graphics"];
    $corename = $_POST["corename"];
    $cooler = $_POST["cooler"];
    $date = $_POST["date"];
    $date = date('Y-m-d h:i:s', strtotime($_POST["date"])); 
    $img = $_POST["img"];
    

    if (!empty($cpumanufacturer) || !empty($cpubrandname) || !empty($name) || !empty($series) || !empty($base) || !empty($turbo) || !empty($cores) || !empty($threads) || !empty($gen) || !empty($graphics) || !empty($corename) || !empty($cooler) || !empty($date) || !empty($img))
    {
        include "database.php";
        $conn = Connect();

        if (mysqli_connect_error())
        {
            die('Connect Error('. mysqli_connect_errorno().')'.mysqli_connect_error());
        }
        else
        {
            $SELECT = "SELECT CPU_NAME from CPU where CPU_NAME = ? Limit 1";
            $INSERT = "INSERT INTO CPU (CPU_NAME, CPU_BRANDNAME, CPU_MANUF, CPU_SERIES, CPU_FREQ, CPU_BOOSTFREQ, CPU_CORES, CPU_THREADS, CPU_GEN, CPU_GRAPHICS, CPU_CORENAME, CPU_COOLER, CPU_DATE,CPU_IMG)
            Values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s",$name);
            $stmt->execute();
            $stmt->bind_result($name);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
    
            if ($rnum==0)
            {
                $stmt = $conn->prepare($INSERT); 
                $stmt->bind_param("ssssiiiisssiss", $name, $cpubrandname, $cpumanufacturer, $series, $base, $turbo, $cores, $threads, $gen, $graphics, $corename, $cooler, $date, $img);
                $stmt->execute();
                header("Location:../../?p=ManageDatabase&state=done");
            }
            else
            {
                header("Location:../../?p=ManageDatabase&state=name taken");
            }
        }
        $stmt->close();
        $conn->close();
    }
    else
    {
        echo "All field are required!"; 
        die();
    } 
}   
if($_POST["type"] == "SYS")
{
    $G_NAME = $_POST["G_NAME"];
    $SYS_MIN_CPU_INTEL = $_POST["SYS_MIN_CPU_INTEL"];
    $SYS_MIN_CPU_AMD = $_POST["SYS_MIN_CPU_AMD"];
    $SYS_MIN_GPU_NVIDIA = $_POST["SYS_MIN_GPU_NVIDIA"];
    $SYS_MIN_GPU_AMD = $_POST["SYS_MIN_GPU_AMD"];
    $SYS_MIN_RAM = $_POST["SYS_MIN_RAM"];
    $SYS_REC_CPU_INTEL = $_POST["SYS_REC_CPU_INTEL"];
    $SYS_REC_CPU_AMD = $_POST["SYS_REC_CPU_AMD"];
    $SYS_REC_GPU_NVIDIA = $_POST["SYS_REC_GPU_NVIDIA"];
    $SYS_REC_GPU_AMD = $_POST["SYS_REC_GPU_AMD"];
    $SYS_REC_RAM = $_POST["SYS_REC_RAM"];
    $SYS_OS = $_POST["SYS_OS"];
    $SYS_SPACE = $_POST["SYS_SPACE"];

    if (!empty($G_NAME) || !empty($SYS_MIN_CPU_INTEL) || !empty($SYS_MIN_CPU_AMD) || !empty($SYS_MIN_GPU_NVIDIA) || !empty($SYS_MIN_GPU_AMD) || !empty($SYS_MIN_RAM) || !empty($SYS_REC_CPU_INTEL) || !empty($SYS_REC_CPU_AMD) || !empty($SYS_REC_GPU_NVIDIA) || !empty($SYS_REC_GPU_AMD) || !empty($SYS_REC_RAM) || !empty($SYS_OS) || !empty($SYS_SPACE))
    {
        include "database.php";
        $conn = Connect();

        if (mysqli_connect_error())
        {
            die('Connect Error('. mysqli_connect_errorno().')'.mysqli_connect_error());
        }
        else
        {
            $SELECT = "SELECT G_NAME from systemrec where G_NAME = ? Limit 1";
            $INSERT = "INSERT INTO systemrec (G_NAME, SYS_MIN_CPU_INTEL, SYS_MIN_CPU_AMD, SYS_MIN_GPU_NVIDIA, SYS_MIN_GPU_AMD, SYS_MIN_RAM, SYS_REC_CPU_INTEL, SYS_REC_CPU_AMD, SYS_REC_GPU_NVIDIA, SYS_REC_GPU_AMD, SYS_REC_RAM, SYS_OS, SYS_SPACE)
            Values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s",$G_NAME);
            $stmt->execute();
            $stmt->bind_result($name);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
    
            if ($rnum==0)
            {
                $stmt = $conn->prepare($INSERT); 
                $stmt->bind_param("sssssissssisi", $G_NAME, $SYS_MIN_CPU_INTEL, $SYS_MIN_CPU_AMD, $SYS_MIN_GPU_NVIDIA, $SYS_MIN_GPU_AMD, $SYS_MIN_RAM, $SYS_REC_CPU_INTEL, $SYS_REC_CPU_AMD, $SYS_REC_GPU_NVIDIA, $SYS_REC_GPU_AMD, $SYS_REC_RAM, $SYS_OS, $SYS_SPACE);
                $stmt->execute();
                header("Location:../../?p=ManageDatabase&state=done");
            }
            else
            {
                header("Location:../../?p=ManageDatabase&state=name taken");
            }
        }
        $conn->close();
        $mysqli->close();
    }
    else
    {
        echo "All field are required!"; 
        die();
    }
} 
?>  