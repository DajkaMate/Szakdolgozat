<title>Can You Run it?</title>
<body>
    <div class="rgb-bg pb-5 pt-lg-0 mt-lg-0 overflow-non" style="height: 76vh">
        <div class="d-flex flex-column col-12 col-lg-7 justify-content-center h-100 mx-auto">
            <h1 class="display-1 text-white fw-bold text-center ">Welcome!</h1> 
            <p class="text-center text-white fs-5 d-none d-lg-block">to our hardware comparing and game system requirements checker website! Browse our extensive database of CPU and GPU information, compare hardware components, and check game system requirements for smooth gameplay. Make informed decisions for your custom PC build and optimize your gaming experience.</p>
            <p class="text-center text-white fs-6 d-block d-lg-none ps-5 pe-5">Welcome to our hardware and game system requirements website! Compare components, check game requirements, and access our up-to-date CPU and GPU database.</p>
            <div class="row p-0 justify-content-center pt-3">
                <div class="col-3 text-center" data-aos="fade-up" data-aos-delay='100'>
                    <p class="text-white"><i class="bi bi-cpu-fill display-4"></i></p>
                    <p class=" fs-4 mb-0 text-white text-center fw-bold num pb-0" data-val="<?php $AllComponents = AllComponents(); echo $AllComponents;?>">0</p><p class="text-center  stats fs-4 text-white fw-bold">Components</p> 
                </div>
                <div class="col-3 text-center" data-aos="fade-up" data-aos-delay='200'>
                    <p class="text-white"><i class="bi bi-joystick display-4"></i></p>
                    <p class=" fs-4 mb-0 text-white text-center fw-bold num pb-0" data-val="<?php $AllGames = AllGames(); echo $AllGames;?>">0</p><p class="text-center  stats fs-4 text-white fw-bold">Games</p> 
                </div>
                <div class="col-3 text-center" data-aos="fade-up" data-aos-delay='300'>
                    <p class="text-white"><i class="bi bi-person-fill display-4"></i></p>
                    <p class=" fs-4 mb-0 text-white text-center fw-bold num pb-0" data-val="<?php $AllUser = AllUser(); echo $AllUser;?>">0</p><p class="text-center  stats fs-4 text-white fw-bold">Members</p> 
                </div>
            </div> 
        </div>
    </div>
    <div class="bg-dark container-fluid d-block d-md-none py-5">
        <div class="container py-5">
            <div class="col-sm py-5">
                <div data-aos="fade-up" data-aos-delay='200' >
                    <img class="w-100 d-block mx-auto " src="img\article1.png" onContextMenu='return false;' ondragstart='return false'>
                    <p class="text-white fs-5 pt-3"><span class="fw-bold fs-2">Check Game System Requirements</span> <br> Ensure your hardware meets the minimum or recommended requirements for games.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay='300' >
                    <img class="w-100 d-block mx-auto mt-5" src="img\article2.png" onContextMenu='return false;' ondragstart='return false'>
                    <p class="text-white fs-5 pt-3"><span class="fw-bold fs-2">Access the Database:</span> <br> Explore our comprehensive database of CPU and GPU information, regularly updated with the latest specs and benchmarks.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay='400' >
                    <img class="w-100 d-block mx-auto mt-5" src="img\article3.png" onContextMenu='return false;' ondragstart='return false'>
                    <p class="text-white fs-5 pt-3"><span class="fw-bold fs-2">Compare Hardware Components:</span> <br> Browse and compare CPU and GPU models based on their specifications.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark container-fluid d-none d-lg-block" style=" padding-top: 100px;" >
        <div class="container "  >
            <div class="row">
                <div class="col order-5" >
                    <img class="article one" src="img\article1.png" onContextMenu='return false;' ondragstart='return false' data-aos="fade-up" data-aos-delay='300' data-aos-anchor-placement='center-bottom'>
                    <img class="article two" src="img\article2.png" onContextMenu='return false;' ondragstart='return false' data-aos="fade-up" data-aos-delay='400'data-aos-anchor-placement='center-bottom'>
                    <img class="article three" src="img\article3.png" onContextMenu='return false;' ondragstart='return false' data-aos="fade-up" data-aos-delay='500'data-aos-anchor-placement='center-bottom'>
                </div>
                <div class="col" data-aos="fade-up" data-aos-delay='100'>
                    <h2 class="display-1 text-white fw-bold mb-5">How does this site works?</h2>
                    <ul>
                        <li>
                            <p class="text-white fs-5"><span class="fw-bold">Check Game System Requirements:</span> <br> Ensure your hardware meets the minimum or recommended requirements for games.</p>
                        </li>
                        <li>
                            <p class="text-white fs-5"><span class="fw-bold">Access the Database:</span> <br> Explore our comprehensive database of CPU and GPU information, regularly updated with the latest specs and benchmarks.</p>
                        </li>
                        <li>
                            <p class="text-white fs-5 "><span class="fw-bold">Compare Hardware Components:</span> <br> Browse and compare CPU and GPU models based on their specifications.</p>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php 
        if (!isset($_SESSION["USER_ID"]))
        {
            echo "
            <div class='container-fluid bg-secondary pt-5 pb-5' style=''>
                <div class='container pb-5 pt-5' data-aos='fade-up'>
                    <h2 class='display-1 text-white fw-bold text-center pb-5 pt-5'>Save your setup!</h2>
                    <p class='text-white fs-5 pb-4'>By signing up for our website, you can save your hardware setup options, eliminating the need to select components every time. You can also bookmark games from our library for quick access, making it easier to find your favorites.</p>
                    <a href='includes/SignUp.php' class='btn btn-outline-light fs-5 d-block mx-auto' style='max-width: 500px;'>Sing up for free</a>
                    <p class='text-white fs-4 pb-4 text-center pt-4'>You already have an account? <a href='includes/login.php'>Login</a></p>
                </div>
            </div>";
        }
    ?>
<script src="js/counting.js"></script>

    