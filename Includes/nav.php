<nav class="navbar navbar-expand-xl navbar-dark bg-dark sticky-top fs-5">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="./">
            <div class="d-flex align-items-center">
                <img class="pe-2" src="img\icon.png" alt="" style="height: 30px;">
                <span class="d-none d-md-block">CAN YOU RUN IT?</span> 
            </div> 
        </a>
        <button class="navbar-toggler btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  pb-3 pb-xl-0" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                <?php
                    $type = "gpu";
                    $brandname = "Nvidia";
                    $result = NewestComponent($type, $brandname); 
                    $row = $result-> fetch_assoc();

                    echo  "<a class='nav-link' aria-current='page' href='./?p=HardwareCompare&GPU=$row[GPU_ID]";
              
                    $type = "gpu";
                    $brandname = "Amd";
                    $result = NewestComponent($type, $brandname); 
                    $row = $result-> fetch_assoc();
                        
                    echo  "&GPU2=$row[GPU_ID]'>Hardware Compare</a>";    
                ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./?p=GameLibrary&sort=Date">Games</a>
                </li>
                <li class="nav-item">   
                    <a class="nav-link" aria-current="page" href="./?p=SupportedComponents">Supported Components</a>
                </li>      
                <li class="nav-item">
                    <a class="nav-link d-block d-xl-none" data-bs-toggle="modal" data-bs-target="#LoginOverlay" aria-current="page" href="#">My Account</a>
                </li>
            </ul>
            <form class="d-flex me-2" role="search" action="includes/Search.php" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary search" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                </div>
            </form>
            <?php
                if (isset($_SESSION["USER_ID"]))
                {   
                    echo "<a href='' class='ms-2 d-none d-xl-block' id=test data-bs-toggle='modal' data-backdrop='false' data-bs-target='#LoginOverlay' >
                        <img  class='rounded-circle nav-avatar ' src='img/avatar/$user[USER_AVATAR]' onContextMenu='return false;' ondragstart='return false' style='width: 40px; height: 40px; object-fit: cover;'>
                    </a>";
                }
                else
                {
                    echo "<a href='' id=test class='Personcircle' data-bs-toggle='modal' data-backdrop='false' data-bs-target='#LoginOverlay'><i class='bi bi-person-fill fs-2'></i></a>";
                }
            ?> 
        </div>
    </div>
</nav>

