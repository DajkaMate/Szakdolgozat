<?php
    $manuf = ""; 
    $brandname = "";
    $lineup = "";
    $name = "";
    $base = "";
    $turbo = "";
    $cores = "";
    $threads = "";
    $gen= ""; 
    $graphics = ""; 
    $corename = "";
    $cooler = ""; 
    $price = "";
    $perf = "";
    $date = "";
    $img = "";

    $error = "";
    $mess = array("name" => "", "base" => "", "turbo" => "", "cores" => "", "threads" => "", "gen" => "", "graphics" => "", "corename" => "", "price" => "", "perf" => "", "date" => "", "img" => "");

    if(isset($_POST["submit"])) 
    {  

        $manuf = $_POST["manuf"];
        $brandname = $_POST["brandname"];
        $lineup = $_POST["lineup"];
        $cooler = $_POST["cooler"];

        if(empty($_POST["name"]))
        {
            $mess["name"] = "1";
            $error = true;
        }
        else
        {
            $name = $_POST["name"];
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

        if(empty($_POST["cores"]))
        {
            $mess["cores"] = "1";
            $error = true;
        }
        else
        {
            $cores = $_POST["cores"];
        }

        if(empty($_POST["threads"]))
        {
            $mess["threads"] = "1";
            $error = true;
        }
        else
        {
            $threads = $_POST["threads"];
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

        if(empty($_POST["graphics"]))
        {
            $mess["graphics"] = "1";
            $error = true;
        }
        else
        {
            $graphics = $_POST["graphics"];
        }

        if(empty($_POST["corename"]))
        {
            $mess["corename"] = "1";
            $error = true;
        }
        else
        {
            $corename = $_POST["corename"];
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

        if($error == false)
        {
            AddCPU($manuf, $brandname, $lineup, $name, $base, $turbo, $cores, $threads, $graphics, $corename, $cooler, $price, $perf, $date, $img);
            header("Location: success.php?q=1");

            $manuf = ""; 
            $brandname = "";
            $lineup = "";
            $name = "";
            $base = "";
            $turbo = "";
            $cores = "";
            $threads = "";
            $gen= ""; 
            $graphics = ""; 
            $corename = "";
            $cooler = ""; 
            $price = "";
            $perf = "";
            $date = "";
            $img = "";

        }
    }
?>
<body class="bg-dark " id='override'>
    <title>Add data to database</title>
    <div class="rgb-bg container-fluid ">
        <div class="container pt-5 pb-5">
            <h2 class="text-white fs-1"><i class='bi bi-cpu pe-2'></i>Upload CPU</h2>
        </div>
    </div>
    <div class="container">
    <form action="" method="POST">
        <div class="container-fluid row  pt-5">
            <div class="col">
                <h1 class="text-white fs-5">Manufacturer</h1>
                <select class="form-select mb-4" name="manuf">
                    <option <?php if(isset($_POST["manuf"]) && $_POST["manuf"] == "Intel") echo " selected "?>value="Intel">Intel</option>
                    <option <?php if(isset($_POST["manuf"]) && $_POST["manuf"] == "AMD") echo " selected "?>value="AMD">AMD</option>
                </select>
                <h1 class="text-white fs-5">Brand Name</h1>
                <select class="form-select mb-4" name="brandname">                
                    <option class="Intel" <?php if(isset($_POST["brandname"]) && $_POST["brandname"] == "Core") echo " selected "?> value="Core">Core</option>   
                    <option class="Intel" <?php if(isset($_POST["brandname"]) && $_POST["brandname"] == "Core 2") echo " selected "?> value="Core 2">Core 2</option>   
                    <option class="AMD" <?php if(isset($_POST["brandname"]) && $_POST["brandname"] == "Ryzen") echo " selected "?> value="Ryzen">Ryzen</option>
                    <option class="AMD" <?php if(isset($_POST["brandname"]) && $_POST["brandname"] == "Athlon") echo " selected "?>value="Athlon">Athlon</option>
                    <option class="AMD" <?php if(isset($_POST["brandname"]) && $_POST["brandname"] == "Athlon II") echo " selected "?>value="Athlon II">Athlon II</option>
                    <option class="AMD" <?php if(isset($_POST["brandname"]) && $_POST["brandname"] == "Phenom") echo " selected "?>value="Phenom">Phenom</option>
                    <option class="AMD" <?php if(isset($_POST["brandname"]) && $_POST["brandname"] == "Phenom II") echo " selected "?>value="Phenom II">Phenom II</option>
                    <option class="AMD Intel" <?php if(isset($_POST["brandname"]) && $_POST["brandname"] == "") echo " selected "?>value="">-</option>
                </select>  
                <h1 class="text-white fs-5">Lineup</h1>
                <select class="form-select mb-4" name="lineup">   
                    <option class="Intel" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "Quad") echo " selected "?>  value="Quad">Quad</option>   
                    <option class="Intel" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "Duo") echo " selected "?> value="Duo">Duo</option>
                    <option class="Intel" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "Pentium Dual-Core") echo " selected "?> value="Pentium Dual-Core">Pentium Dual-Core</option>
                    <option class="Intel" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "Pentium") echo " selected "?> value="Pentium">Pentium</option> 
                    <option class="Intel" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "Pentium Gold") echo " selected "?> value="Pentium Gold">Pentium Gold</option>
                    <option class="Intel" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "Celeron") echo " selected "?> value="Celeron">Celeron</option> 
                    <option class="Intel" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "i3") echo " selected "?> value="i3">i3</option> 
                    <option class="Intel" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "i5") echo " selected "?> value="i5">i5</option>
                    <option class="Intel" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "i7") echo " selected "?> value="i7">i7</option>
                    <option class="Intel" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "i9") echo " selected "?> value="i9">i9</option>  
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "X3") echo " selected "?> value="X3">X3</option>
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "X4") echo " selected "?> value="X4">X4</option>
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "X6") echo " selected "?> value="X6">X6</option>
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "FX") echo " selected "?> value="FX">FX</option>
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "A4") echo " selected "?> value="A4">A4</option>
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "A6") echo " selected "?> value="A6">A6</option>
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "A8") echo " selected "?> value="A8">A8</option>
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "A10") echo " selected "?> value="A10">A10</option>
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "A12") echo " selected "?> value="A12">A12</option>
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "3") echo " selected "?> value="3">3</option>
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "5") echo " selected "?> value="5">5</option>
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "7") echo " selected "?> value="7">7</option>
                    <option class="AMD" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "9") echo " selected "?> value="9">9</option>
                    <option class="AMD Intel" <?php if(isset($_POST["lineup"]) && $_POST["lineup"] == "") echo " selected "?> value="">-</option>
                </select> 
                <h1 class="fs-5 <?php if($mess['name'] !== "") echo "text-danger"; else echo " text-white"; ?>">Name</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['name'] !== "") echo "border border-danger"?>"  value="<?php echo $name;?>" placeholder="Name" name="name">
            </div>
            <div class="col">
                <h1 class="fs-5 <?php if($mess['base'] !== "") echo "text-danger"; else echo " text-white"; ?>">Clock Rate</h1>
                <input type="number" class="form-control mb-4 <?php if($mess['base'] !== "") echo "border border-danger"?>" value="<?php echo $base?>" placeholder="X-MHz" name="base">
                <h1 class="fs-5 <?php if($mess['turbo'] !== "") echo "text-danger"; else echo " text-white"; ?>">Turbo Clock</h1>
                <input type="number" class="form-control mb-4 <?php if($mess['turbo'] !== "") echo "border border-danger"?>" value="<?php echo $turbo?>" placeholder="X-MHz" name="turbo">
                <h1 class="fs-5 <?php if($mess['cores'] !== "") echo "text-danger"; else echo " text-white"; ?>">Cores</h1>
                <input type="number" class="form-control mb-4 <?php if($mess['cores'] !== "") echo "border border-danger";?>" value="<?php echo $cores?>" placeholder="Cores" name="cores">
                <h1 class="fs-5 <?php if($mess['threads'] !== "") echo "text-danger"; else echo " text-white"; ?>">Threads</h1>
                <input type="number" class="form-control mb-4 <?php if($mess['threads'] !== "") echo "border border-danger";?>" value="<?php echo $threads?>" placeholder="Threads" name="threads">
            </div>             
            <div class="col">
                <h1 class="fs-5 <?php if($mess['gen'] !== "") echo "text-danger"; else echo " text-white"; ?>">Generation</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['gen'] !== "") echo "border border-danger"; else echo " text-white"; ?>" value="<?php echo $gen?>" placeholder="Generation" name="gen">
                <h1 class="fs-5 <?php if($mess['graphics'] !== "") echo "text-danger"; else echo " text-white"; ?>">Integrated Graphics</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['graphics'] !== "") echo "border border-danger"; else echo " text-white"; ?>" value="<?php echo $graphics?>" placeholder="Integrated Graphics" name="graphics">
                <h1 class="fs-5 <?php if($mess['corename'] !== "") echo "text-danger"; else echo " text-white"; ?>">Core Name</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['corename'] !== "") echo "border border-danger"; else echo " text-white"; ?>" value="<?php echo $corename?>" placeholder="Core Name" name="corename">
                <h1 class="text-white fs-5">Cooler Included</h1>
                <select class="form-select mb-4" aria-label="Default select example" name="cooler">
                    <option <?php if(isset($_POST["cooler"]) && $_POST["cooler"] == "0") echo " selected "?> value="0">No</option>
                    <option <?php if(isset($_POST["cooler"]) && $_POST["cooler"] == "1") echo " selected "?> value="1">Yes</option>
                </select>
            </div>
            <div class="col">
                <h1 class="fs-5 <?php if($mess['price'] !== "") echo "text-danger"; else echo " text-white"; ?>">Price</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['price'] !== "") echo "border border-danger"; else echo " text-white"; ?>" value="<?php echo $price?>" placeholder="Price (USD)" name="price">
                <h1 class="fs-5 <?php if($mess['perf'] !== "") echo "text-danger"; else echo " text-white"; ?>">Performance</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['perf'] !== "") echo "border border-danger"; else echo " text-white"; ?>" value="<?php echo $perf?>" placeholder="Performance" name="perf">
                <h1 class="fs-5 <?php if($mess['date'] !== "") echo "text-danger"; else echo " text-white"; ?>">Date</h1>
                <input class="form-control text-white mb-4 <?php if($mess['date'] !== "") echo "border border-danger "; else echo " text-white"; ?>" value="<?php echo $date?>"  placeholder="0" type="date" name="date"> 
                <h1 class="fs-5 <?php if($mess['img'] !== "") echo "text-danger"; else echo " text-white"; ?>">CPU Image</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['img'] !== "") echo "border border-danger "; else echo " text-white"; ?>" value="<?php echo $img?>" value="img/cpu-img/" placeholder="img/cpu-img/..." name="img">
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

        var lineup = $("[name=lineup] option").detach()
        $("[name=manuf]").change(function() {
        var val = $(this).val()
        $("[name=lineup] option").detach()
        lineup.filter("." + val).clone().appendTo("[name=lineup]")
        }).change()


    </script>
