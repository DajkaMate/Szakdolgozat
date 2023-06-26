<?php
    $name = ""; 
    $genre = "";
    $dev = "";
    $date = "";
    $cover = "";
    $wide = "";

    $error = "";
    $mess = array("name" => "", "genre" => "", "dev" => "",  "date" => "", "cover" => "", "wide" => "");

    if(isset($_POST["submit"])) 
    {  
        if(empty($_POST["name"]))
        {
            $mess["name"] = "1";
            $error = true;
        }
        else
        {
            $name = $_POST["name"];
        }

        if(empty($_POST["genre"]))
        {
            $mess["genre"] = "1";
            $error = true;
        }
        else
        {
            $genre = $_POST["genre"];
        }

        if(empty($_POST["dev"]))
        {
            $mess["dev"] = "1";
            $error = true;
        }
        else
        {
            $dev = $_POST["dev"];
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

        if(empty($_POST["cover"]))
        {
            $mess["cover"] = "1";
            $error = true;
        }
        else
        {
            $cover = $_POST["cover"];
        }

        if(empty($_POST["wide"]))
        {
            $mess["wide"] = "1";
            $error = true;
        }
        else
        {
            $wide = $_POST["wide"];
        }

        if($error == false)
        {
            AddGame($name, $genre, $dev, $date, $cover, $wide);
            header("Location: success.php?q=1");

            $name = ""; 
            $genre = "";
            $dev = "";
            $date = "";
            $cover = "";
            $wide = "";
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
        <div class="container-fluid row pt-5">
            <div class="col">
                <h1 class="fs-5 <?php if($mess['name'] !== "") echo "text-danger"; else echo " text-white"; ?>">Game Name</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['name'] !== "") echo "border border-danger"?>"  value="<?php echo $name;?>" placeholder="Name" name="name">
                <h1 class="fs-5 <?php if($mess['genre'] !== "") echo "text-danger"; else echo " text-white"; ?>">Genre</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['genre'] !== "") echo "border border-danger"?>"  value="<?php echo $genre;?>" placeholder="Genre" name="genre">
                <h1 class="fs-5 <?php if($mess['dev'] !== "") echo "text-danger"; else echo " text-white"; ?>">Developer</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['dev'] !== "") echo "border border-danger"?>"  value="<?php echo $dev;?>" placeholder="Developer" name="dev">
            </div>
            <div class="col">
                <h1 class="fs-5 <?php if($mess['date'] !== "") echo "text-danger"; else echo " text-white"; ?>">Date</h1>
                <input type="date" class="form-control mb-4 <?php if($mess['date'] !== "") echo "border border-danger"?>"  value="<?php echo $date;?>" placeholder="Name" name="date">
                <h1 class="fs-5 <?php if($mess['cover'] !== "") echo "text-danger"; else echo " text-white"; ?>">Game Cover</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['cover'] !== "") echo "border border-danger"?>"  value="<?php echo $cover;?>" placeholder="img\game-img\game-cover\" name="cover">
                <h1 class="fs-5 <?php if($mess['wide'] !== "") echo "text-danger"; else echo " text-white"; ?>">Game Banner</h1>
                <input type="text" class="form-control mb-4 <?php if($mess['wide'] !== "") echo "border border-danger"?>"  value="<?php echo $wide;?>" placeholder="img\game-img\game-wide\" name="wide">
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
