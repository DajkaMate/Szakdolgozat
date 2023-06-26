<?php
    $manuf = ""; 
    $brandname = "";
    $prefix = "";
    $name = "";
    $memory = "";
    $memtype = "";
    $bit = "";
    $base = "";
    $turbo = "";
    $directx = "";
    $sli = "";
    $date = "";
    $gen = "";
    $level = "";
    $perf = "";
    $price = "";
    $img = "";
    
    $error = "";
    $mess = array("name" => "", "memory" => "", "memtype" => "", "bit" => "", "base" => "", "turbo" => "", "directx" => "", "sli" => "", "date" => "", "gen" => "", "level" => "", "perf" => "", "price" => "", "img" => "");

    if(isset($_POST["submit"])) 
    {  
        $manuf = $_POST["manuf"];
        $brandname = $_POST["brandname"];
        $prefix = $_POST["prefix"];
        $bit = $_POST["bit"];
        $directx = $_POST["directx"];
        $level = $_POST["level"];

        if(empty($_POST["name"]))
        {
            $mess["name"] = "1";
            $error = true;
        }
        else
        {
            $name = $_POST["name"];
        }

        if(empty($_POST["memory"]))
        {
            $mess["memory"] = "1";
            $error = true;
        }
        else
        {
            $memory = $_POST["memory"];
        }

        if(empty($_POST["base"]))
        {
            $mess["base"] = "1";
            $error = true;
        }
        else
        {
            $base = $_POST["base"];
        }

        if(empty($_POST["turbo"]))
        {
            $mess["turbo"] = "1";
            $error = true;
        }
        else
        {
            $turbo = $_POST["turbo"];
        }

        if(empty($_POST["gen"]))
        {
            $mess["gen"] = "1";
            $error = true;
        }
        else
        {
            $gen = $_POST["gen"];
        }

        if(empty($_POST["price"]))
        {
            $mess["price"] = "1";
            $error = true;
        }
        else
        {
            $price = $_POST["price"];
        }

        if(empty($_POST["perf"]))
        {
            $mess["perf"] = "1";
            $error = true;
        }
        else
        {
            $perf = $_POST["perf"];
        }
        
        if(empty($_POST["date"]))
        {
            $mess["date"] = "1";
            $error = true;
        }
        else
        {
            $date = $_POST["date"];
        }

        if(empty($_POST["img"]))
        {
            $mess["img"] = "1";
            $error = true;
        }
        else
        {
            $img = $_POST["img"];
        }

        if(empty($_POST["memtype"]))
        {
            $mess["memtype"] = "1";
            $error = true;
        }
        else
        {
            $memtype = $_POST["memtype"];
        }

        if($error == false)
        {
            $suffix = $_POST["suffix"];
            $name = $name . " " . $suffix;
            AddGPU($manuf, $brandname, $prefix, $name, $memory, $memtype, $bit, $base, $turbo, $directx, $sli, $date, $gen, $level, $perf, $price, $img);
            header("Location: success.php?q=1");

            $manuf = ""; 
            $brandname = "";
            $prefix = "";
            $name = "";
            $memory = "";
            $memtype = "";
            $bit = "";
            $base = "";
            $turbo = "";
            $directx = "";
            $sli = "";
            $date = "";
            $gen = "";
            $level = "";
            $perf = "";
            $price = "";
            $img = "";
        }
    }
?>
<body class="bg-dark " id='override'>
    <title>Add data to database</title>
    <div class="rgb-bg container-fluid ">
        <div class="container pt-5 pb-5">
            <h2 class="text-white fs-1"><i class='bi bi-cpu pe-2'></i>Upload GPU</h2>
        </div>
    </div>
    <div class="container">
    <form action="" method="POST">
        <div class="container-fluid row pt-5">
            <div class="col">
                <h1 class="text-white fs-5">Manufacturer</h1>
                <select class="form-select mb-4" name="manuf">
                    <option <?php if(isset($_POST["manuf"]) && $_POST["manuf"] == "Nvidia") echo " selected "?>value="Nvidia">Nvidia</option>
                    <option <?php if(isset($_POST["manuf"]) && $_POST["manuf"] == "AMD") echo " selected "?>value="AMD">AMD</option>
                    <option <?php if(isset($_POST["manuf"]) && $_POST["manuf"] == "ATI") echo " selected "?>value="ATI">ATI</option>
                    <option <?php if(isset($_POST["manuf"]) && $_POST["manuf"] == "Intel") echo " selected "?>value="Intel">Intel</option>
                </select>
                <h1 class="text-white fs-5">Brand Name</h1>
                <select class="form-select mb-4" name="brandname">                
                    <option class="ATI AMD" <?php if(isset($_POST["brandname"]) && $_POST["brandname"] == "Radeon") echo " selected "?> value="Radeon">Radeon</option>   
                    <option class="Intel" <?php if(isset($_POST["brandname"]) && $_POST["brandname"] == "Arc") echo " selected "?> value="Arc">Arc</option>   
                    <option class="Nvidia" <?php if(isset($_POST["brandname"]) && $_POST["brandname"] == "GeForce") echo " selected "?> value="GeForce">GeForce</option>
                    <option class="Nvidia" <?php if(isset($_POST["brandname"]) && $_POST["brandname"] == "TITAN") echo " selected "?>value="TITAN">TITAN</option>
                </select>  
                <h1 class="text-white fs-5">Prfefix</h1>
                <select class="form-select mb-4" name="prefix">   
                    <option class="ATI" <?php if(isset($_POST["prefix"]) && $_POST["prefix"] == "HD") echo " selected "?>  value="HD">HD</option>   
                    <option class="Nvidia" <?php if(isset($_POST["prefix"]) && $_POST["prefix"] == "GT") echo " selected "?> value="GT">GT</option>
                    <option class="Nvidia" <?php if(isset($_POST["prefix"]) && $_POST["prefix"] == "GTX") echo " selected "?> value="GTX">GTX</option>
                    <option class="Nvidia" <?php if(isset($_POST["prefix"]) && $_POST["prefix"] == "RTX") echo " selected "?> value="RTX">RTX</option>
                    <option class="AMD" <?php if(isset($_POST["prefix"]) && $_POST["prefix"] == "HD") echo " selected "?> value="HD">HD</option>
                    <option class="AMD" <?php if(isset($_POST["prefix"]) && $_POST["prefix"] == "R7") echo " selected "?> value="R7">R7</option>
                    <option class="AMD" <?php if(isset($_POST["prefix"]) && $_POST["prefix"] == "R9") echo " selected "?> value="R9">R9</option>
                    <option class="AMD" <?php if(isset($_POST["prefix"]) && $_POST["prefix"] == "RX") echo " selected "?> value="RX">RX</option>
                    <option class="AMD" <?php if(isset($_POST["prefix"]) && $_POST["prefix"] == "RX") echo " selected "?> value="RX">RX</option>
                    <option class="Nvidia Intel" <?php if(isset($_POST["prefix"]) && $_POST["prefix"] == "") echo " selected "?> value="">-</option>
                </select> 
                <h1 class="fs-5 <?php if($mess['name'] !== "") echo "text-danger"; else echo " text-white"; ?>">Name</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['name'] !== "") echo "border border-danger"?>"  value="<?php echo $name;?>" placeholder="Name" name="name">
                <h1 class="text-white fs-5">Suffix</h1>
                <select class="form-select mb-4" name="suffix">                
                    <option class="Nvidia" <?php if(isset($_POST["suffix"]) && $_POST["suffix"] == "Ti") echo " selected "?> value="Ti">Ti</option>
                    <option class="Nvidia" <?php if(isset($_POST["suffix"]) && $_POST["suffix"] == "Super") echo " selected "?> value="Super">Super</option>      
                    <option class="AMD" <?php if(isset($_POST["suffix"]) && $_POST["suffix"] == "XT") echo " selected "?> value="XT">XT</option>   
                    <option class="AMD" <?php if(isset($_POST["suffix"]) && $_POST["suffix"] == "XTX") echo " selected "?> value="XTX">XTX</option>   
                    <option class="Nvidia AMD" <?php if(isset($_POST["suffix"]) && $_POST["suffix"] == "X") echo " selected "?> value="X">X</option>
                    <option class="ATI" <?php if(isset($_POST["suffix"]) && $_POST["suffix"] == "X2") echo " selected "?> value="X2">X2</option>    
                    <option class="Nvidia AMD ATI" <?php if(isset($_POST["suffix"]) && $_POST["suffix"] == "") echo " selected "?> value="">-</option>      
                </select>      
            </div>
            <div class="col">
                <h1 class="fs-5 <?php if($mess['memory'] !== "") echo "text-danger"; else echo " text-white"; ?>">Memory</h1>
                <input type="number" class="form-control mb-4 <?php if($mess['memory'] !== "") echo "border border-danger"?>" value="<?php echo $memory?>" placeholder="X-GB" name="memory">
                <h1 class="text-white fs-5">Memory Type</h1>
                <select class="form-select mb-4" name="memtype">   
                    <option <?php if(isset($_POST["memtype"]) && $_POST["memtype"] == "GDDR6X") echo " selected "?>  value="GDDR6X">GDDR6X</option>
                    <option <?php if(isset($_POST["memtype"]) && $_POST["memtype"] == "GDDR6") echo " selected "?>  value="GDDR6">GDDR6</option>   
                    <option <?php if(isset($_POST["memtype"]) && $_POST["memtype"] == "GDDR5X") echo " selected "?>  value="GDDR5X">GDDR5X</option>
                    <option <?php if(isset($_POST["memtype"]) && $_POST["memtype"] == "GDDR5") echo " selected "?>  value="GDDR5">GDDR5</option>
                    <option <?php if(isset($_POST["memtype"]) && $_POST["memtype"] == "HBM") echo " selected "?>  value="HBM">HBM</option>
                    <option <?php if(isset($_POST["memtype"]) && $_POST["memtype"] == "HBM2") echo " selected "?>  value="HBM2">HBM2</option>
                </select> 
                <h1 class="fs-5 <?php if($mess['bit'] !== "") echo "text-danger"; else echo " text-white"; ?>">Memory Width</h1>
                <input type="number" class="form-control mb-4 <?php if($mess['bit'] !== "") echo "border border-danger"?>" value="<?php echo $bit?>" placeholder="X-bit" name="bit">
                <h1 class="fs-5 <?php if($mess['base'] !== "") echo "text-danger"; else echo " text-white"; ?>">Clock Rate</h1>
                <input type="number" class="form-control mb-4 <?php if($mess['base'] !== "") echo "border border-danger"?>" value="<?php echo $base?>" placeholder="X-MHz" name="base">
                <h1 class="fs-5 <?php if($mess['img'] !== "") echo "text-danger"; else echo " text-white"; ?>">GPU Image</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['img'] !== "") echo "border border-danger"; else echo " text-white"; ?>" value="<?php echo $img?>" placeholder="img/cpu-img/..." name="img">
            </div>             
            <div class="col">
                <h1 class="fs-5 <?php if($mess['turbo'] !== "") echo "text-danger"; else echo " text-white"; ?>">Turbo Rate</h1>
                <input type="number" class="form-control mb-4 <?php if($mess['turbo'] !== "") echo "border border-danger"?>" value="<?php echo $turbo?>" placeholder="X-MHz" name="turbo">
                <h1 class="fs-5 text-white">DirectX</h1>
                <select class="form-select mb-4" name="directx">   
                    <option <?php if(isset($_POST["directx"]) && $_POST["directx"] == "DirectX 12 Ultimate") echo " selected "?>  value="DirectX 12 Ultimate">DirectX 12 Ultimate</option>
                    <option <?php if(isset($_POST["directx"]) && $_POST["directx"] == "DirectX 12") echo " selected "?>  value="DirectX 12">DirectX 12</option>
                    <option <?php if(isset($_POST["directx"]) && $_POST["directx"] == "DirectX 11") echo " selected "?>  value="DirectX 11">DirectX 11</option>
                    <option <?php if(isset($_POST["directx"]) && $_POST["directx"] == "DirectX 10") echo " selected "?>  value="DirectX 10">DirectX 10</option>
                </select>
                <h1 class="text-white fs-5">SLI Support</h1>
                <select class="form-select mb-4" aria-label="Default select example" name="sli">
                    <option <?php if(isset($_POST["sli"]) && $_POST["sli"] == "0") echo " selected "?> value="0">No</option>
                    <option <?php if(isset($_POST["sli"]) && $_POST["sli"] == "1") echo " selected "?> value="1">Yes</option>
                </select>
                <h1 class="fs-5 <?php if($mess['date'] !== "") echo "text-danger"; else echo " text-white"; ?>">Date</h1>
                <input class="form-control text-white mb-4 <?php if($mess['date'] !== "") echo "border border-danger "; else echo " text-white"; ?>" value="<?php echo $date?>"  placeholder="0" type="date" name="date"> 
            </div>
            <div class="col">
                <h1 class="fs-5 <?php if($mess['gen'] !== "") echo "text-danger"; else echo " text-white"; ?>">Generation</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['gen'] !== "") echo "border border-danger"; else echo " text-white"; ?>" value="<?php echo $gen?>" placeholder="Generation" name="gen">
                <h1 class="fs-5 text-white">GPU Level</h1>
                <select class="form-select mb-4" name="level">   
                    <option <?php if(isset($_POST["level"]) && $_POST["level"] == "1") echo " selected "?>  value="1">Enthusiast-class</option>
                    <option <?php if(isset($_POST["level"]) && $_POST["level"] == "2") echo " selected "?>  value="2">High-end</option>
                    <option <?php if(isset($_POST["level"]) && $_POST["level"] == "3") echo " selected "?>  value="3">Performance-segment</option>
                    <option <?php if(isset($_POST["level"]) && $_POST["level"] == "4") echo " selected "?>  value="4">Mid-range</option>
                    <option <?php if(isset($_POST["level"]) && $_POST["level"] == "5") echo " selected "?>  value="5">Entry level</option>
                </select>
                <h1 class="fs-5 <?php if($mess['perf'] !== "") echo "text-danger"; else echo " text-white"; ?>">Performance</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['perf'] !== "") echo "border border-danger"; else echo " text-white"; ?>" value="<?php echo $perf?>" placeholder="Performance" name="perf">
                <h1 class="fs-5 <?php if($mess['price'] !== "") echo "text-danger"; else echo " text-white"; ?>">Price</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['price'] !== "") echo "border border-danger"; else echo " text-white"; ?>" value="<?php echo $price?>" 
                placeholder="Price (USD)" name="price">
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
        var suffix = $("[name=suffix] option").detach()
        $("[name=manuf]").change(function() {
        var val = $(this).val()
        $("[name=suffix] option").detach()
        suffix.filter("." + val).clone().appendTo("[name=suffix]")
        }).change()
    </script>
