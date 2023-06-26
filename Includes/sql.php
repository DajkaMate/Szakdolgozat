<?php
    include("Database.php");
    function AllComponents()
    {
        $conn = Connect();
        $sql = 'SELECT * FROM ram';
        $result = mysqli_query($conn, $sql);
        $ram = mysqli_num_rows($result);
    
        $sql = 'SELECT * FROM cpu';
        $result = mysqli_query($conn, $sql);
        $cpu = mysqli_num_rows($result);
       
        $sql = 'SELECT * FROM gpu';
        $result = mysqli_query($conn, $sql);
        $gpu = mysqli_num_rows($result);
        
        $all = $ram + $gpu + $cpu;
        mysqli_close($conn);
        return $all;
    } 

    function AllGames()
    {
        $conn = Connect();
        $sql = 'SELECT * FROM games';
        $result = mysqli_query($conn, $sql);
        $games = mysqli_num_rows($result);
        $all = $games;
        return $all;
    }

    function AllUser()
    {
        $conn = Connect();
        $sql = 'SELECT * FROM user';
        $result = mysqli_query($conn, $sql);
        $user = mysqli_num_rows($result);
        $all = $user;
        mysqli_close($conn);
        return $all;         
    }

    function Users()
    {
        $conn = Connect();
        $sql = 'SELECT * FROM user';
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;         
    }
    
    function GetGPUDataFromId($id)
    {
        $conn = Connect();
        $sql = "SELECT * FROM gpu WHERE GPU_ID = '$id'"; 
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function GetCPUDataFromId($id)
    {
        $conn = Connect();
        $sql = "SELECT * FROM cpu WHERE CPU_ID = '$id'"; 
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function GetOSDataFromId($id)
    {
        $conn = Connect();
        $sql = "SELECT * FROM os WHERE OS_ORDER = '$id'"; 
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function AllCpu()
    {
        $conn = Connect();
        $sql = 'SELECT * FROM cpu order by CPU_MANUF desc, CPU_DATE desc, CPU_BRANDNAME desc, CPU_NAME desc ';
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function AllGpu()
    {
        $conn = Connect();
        $sql = 'SELECT * FROM gpu order by GPU_MANUF desc, GPU_BRANDNAME desc, GPU_PREFIX desc, GPU_NAME desc';
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function AllOs()
    {
        $conn = Connect();
        $sql = 'SELECT * FROM os order by OS_DATE desc, os desc';
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function AllRam()
    {
        $conn = Connect();
        $sql = 'SELECT * FROM ram ORDER BY RAM_GB desc';
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }
    function UserNameCheck($name)
    {
        $conn = Connect();
        $sql = "SELECT * FROM user WHERE USER_NAME = '$name'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function UserByID($userid)
    {
        $conn = Connect();
        $sql = "SELECT * from user where USER_id = $userid";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function UserAvatar($fileName, $userid)
    {
        $conn = Connect();
        $sql = "UPDATE user SET USER_AVATAR = '$fileName' where USER_ID = $userid";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    function UserEmailCheck($email)
    {
        $conn = Connect();
        $sql = "SELECT * FROM user WHERE USER_EMAIL = '$email'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }
    function AddUser($name, $email, $password)  
    {
        $conn = Connect();
        $id = rand(10000,99999);
        $sql = "INSERT INTO user (USER_ID, USER_NAME, USER_PASSWORD, USER_EMAIL) VALUES ('$id', '$name', '$password', '$email')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    function AddCPU($manuf, $brandname, $lineup, $name, $base, $turbo, $cores, $threads, $graphics, $corename, $cooler, $price, $perf, $date, $img)
    {
        $conn = Connect();
        $sql = "INSERT INTO cpu (CPU_MANUF, CPU_LINEUP, CPU_NAME, CPU_FREQ, CPU_BOOST, CPU_CORES,CPU_THREADS, CPU_GEN, CPU_GRAPHICS, CPU_CORENAME, CPU_COOLER, CPU_PRICE, CPU_PREF, CPU_DATE, CPU_IMG) VALUES ('$manuf', '$brandname', '$lineup', '$name',  '$base', '$turbo', '$cores', '$threads', '$graphics', '$corename', '$cooler', '$price', '$perf', '$date', '$img')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    function AddGPU($manuf, $brandname, $prefix, $name, $memory, $memtype, $bit, $base, $turbo, $directx, $sli, $date, $gen, $level, $perf, $price, $img)
    {
        $conn = Connect();
        $sql = "INSERT INTO gpu (GPU_MANUF, GPU_BRANDNAME, GPU_PREFIX, GPU_NAME, GPU_MEM, GPU_MEMTYPE, GPU_BIT, GPU_BASE, GPU_BOOST, GPU_DIRECTX, GPU_SLI, GPU_DATE, GPU_GEN, GPU_LEVEL, GPU_PERF, GPU_PRICE, GPU_IMG) VALUES ('$manuf', '$brandname', '$prefix', '$name',  '$memory', '$memtype', '$bit', '$base', '$turbo', '$directx', '$sli', '$date', '$gen', '$level', '$price', '$perf', '$img')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    function AddGame($name, $genre, $dev, $date, $cover, $wide)
    {
        $conn = Connect();
        $sql = "INSERT INTO games (G_NAME, G_GENRE, G_DEV, G_DATE, G_COVER, G_WIDE) VALUES ('$name', '$genre', '$dev', '$date', '$cover', '$wide')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    function AddSys($name, $min_cpu_intel, $min_cpu_amd, $min_gpu_nvidia, $min_gpu_amd, $min_ram, $rec_cpu_intel, $rec_cpu_amd, $rec_gpu_nvidia, $rec_gpu_amd, $rec_ram, $os, $space)
    {
        $conn = Connect();
        $sql = "INSERT INTO systemrec (G_ID, SYS_MIN_CPU_INTEL, SYS_MIN_CPU_AMD, SYS_MIN_GPU_NVIDIA, SYS_MIN_GPU_AMD, SYS_MIN_RAM, SYS_REC_CPU_INTEL, SYS_REC_CPU_AMD, SYS_REC_GPU_NVIDIA, SYS_REC_GPU_AMD, SYS_REC_RAM, SYS_OS, SYS_SPACE) VALUES ('$name', '$min_cpu_intel', '$min_cpu_amd', '$min_gpu_nvidia', '$min_gpu_amd', '$min_ram', '$rec_cpu_intel', '$rec_cpu_amd', '$rec_gpu_nvidia', '$rec_gpu_amd', '$rec_ram', '$os', '$space')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    

    function CheckUser($email, $pass)  
    {
        $conn = Connect();
        $sql = "SELECT * FROM user WHERE USER_EMAIL = '$email' AND USER_PASSWORD = '$pass'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    } 

    function NewestComponent($type, $brandname)
    {
        $conn = Connect();
        if($type == "gpu")
        {
            $sql = "SELECT * FROM gpu WHERE GPU_MANUF = '$brandname' ORDER BY GPU_DATE desc, GPU_NAME desc LIMIT 1";
        }
        else
        {
            $sql = "SELECT * FROM cpu WHERE CPU_MANUF = '$brandname' ORDER BY CPU_DATE desc, CPU_NAME desc LIMIT 1";
        }
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function BrandType($BrandType)
    {
        $conn = Connect();
        $sql = "SELECT * FROM brands where BRAND_TYPE = '$BrandType'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }
    function User()
    {
        $conn = Connect();
        if (isset($_SESSION["USER_ID"]))
        {
            $sql = "SELECT * FROM user WHERE id = {$_SESSION["USER_ID"]}";
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            return $result;
        }
    }
    function GamePage($G_ID)
    {
        $conn = Connect();
        $sql = "SELECT * FROM games WHERE G_ID = '$G_ID'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function Games($sortby)
    {
        $conn = Connect();
        if ($sortby == "Date")
        {
            $sql = "SELECT * FROM games ORDER BY G_DATE desc";
        }
        else if ($sortby == "A-Z")
        {
            $sql = "SELECT * FROM games ORDER BY G_NAME";
        }
        else
        {
            $sql = "SELECT * FROM games where G_GENRE = '$sortby'";
        }
       
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function GameSearch($search)
    {
        $conn = Connect();
        $sql = "SELECT * FROM games where G_NAME like '%$search%' order by G_NAME";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function GPUSearch($search)
    {
        $conn = Connect();
        $sql = "SELECT * FROM gpu where GPU_MANUF like '%$search%' or GPU_BRANDNAME like '%$search%' or 
        GPU_PREFIX like '%$search%' or GPU_NAME like '%$search%'  or GPU_PREFIX like '%$search%' order by GPU_NAME";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function CPUSearch($search)
    {
        $conn = Connect();
        $sql = "SELECT * FROM cpu where CPU_NAME like '%$search%' order by CPU_NAME";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function GamesGenres()
    {
        $conn = Connect();
        $sql = 'SELECT * FROM games GROUP BY G_GENRE ORDER BY G_GENRE';
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function GPURank()
    {
        $conn = Connect();
        $sql = "SELECT * FROM gpu order by GPU_ID desc";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function CPURank()
    {
        $conn = Connect();
        $sql = "SELECT * FROM cpu order by CPU_PREF desc";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function GPUALLRank()
    {
        $conn = Connect();
        $sql = "SELECT count(GPU_ID) FROM gpu ";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function CPUALLRank()
    {
        $conn = Connect();
        $sql = "SELECT count(CPU_ID) FROM cpu ";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function SystemRec($G_ID)
    {
        $conn = Connect();
        $sql = "SELECT * FROM systemrec WHERE G_ID = '$G_ID'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function SystemRecGPU($id)
    {
        $conn = Connect();
        $sql = "SELECT * FROM gpu WHERE '$id' = GPU_ID";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function SystemRecCPU($id)
    {
        $conn = Connect();
        $sql = "SELECT * FROM cpu WHERE '$id' = CPU_ID";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function SystemOs($id)
    {
        $conn = Connect();
        $sql = "SELECT * FROM os WHERE '$id' = OS_ID";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }
   
    function Bookmarks($USERID, $G_ID)
    {
        $conn = Connect();
        $sql = "SELECT * FROM bookmarks WHERE U_ID = '$USERID' and G_ID = '$G_ID'"; 
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function UserBookmarks($userid)
    {
        $conn = Connect();
        $sql = "SELECT games.G_NAME, games.G_COVER, bookmarks.U_ID, bookmarks.G_ID FROM games, bookmarks WHERE games.G_ID = bookmarks.G_ID and bookmarks.U_ID = '$userid'";    
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function GPUSeries($manuf)
    {
        $conn = Connect();
        $sql = "SELECT * FROM gpu WHERE GPU_MANUF = '$manuf' Group by GPU_GEN order by MIN(GPU_DATE) desc";  
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function GPUSeriesData($gen, $manuf)
    {
        $conn = Connect();
        $sql = "SELECT * FROM gpu WHERE GPU_GEN = '$gen' and GPU_MANUF = '$manuf' order by GPU_NAME desc";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function CPUSeries($manuf)
    {
        $conn = Connect();
        $sql = "SELECT * FROM cpu WHERE CPU_MANUF = '$manuf' Group by CPU_LINEUP order by CPU_GEN desc";  
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }
    
    function CPUSeriesData($gen, $manuf)
    {
        $conn = Connect();
        $sql = "SELECT * FROM cpu WHERE CPU_GEN = '$gen' and CPU_MANUF = '$manuf' order by CPU_NAME + 0 DESC";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function GetHardware($type, $id)
    {
        $conn = Connect();
        if($type == "GPU")
        {
            $sql = "SELECT * FROM gpu WHERE GPU_ID = '$id'";    
        }
        else
        {
            $sql = "SELECT * FROM cpu WHERE CPU_ID = '$id'";    
        }

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
       
        return $result;
    }

    function SimilarHardware($type, $gen)
    {
        $conn = Connect();
        if($type == "GPU")
        {
            $sql = "SELECT * FROM gpu WHERE GPU_GEN = '$gen'";    
        }
        if($type == "CPU")
        {
            $sql = "SELECT * FROM cpu WHERE CPU_GEN = '$gen'";    
        }

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
       
        return $result;
    }