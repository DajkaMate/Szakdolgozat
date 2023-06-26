<title>Game Library</title>
<div class="rgb-bg container-fluid mobile-header">
    <div class="container py-5" data-aos='fade-in'>
        <h2 class="text-white pb-1 fs-1"><i class="bi bi-joystick pe-2"></i>Game Library</h2>
        <p class="text-white fs-4">Game on! Check system requirements for your next adventure in our game library.</p>
    </div>
</div>
    <div class="bg-dark container-fluid pt-3 pb-5">
        <div class="container">
            <div class=" d-flex justify-content-end mt-3">
                <div class="dropdown">
                    <a class="fs-4 text-decoration-none dropdown-toggle pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sort by</a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                        <li><h6 class="dropdown-header">Sort by</h6></li>
                        <li><a class='dropdown-item py-2' href='./?p=GameLibrary&sort=Date'>Date</a></li>
                        <li><a class='dropdown-item py-2' href='./?p=GameLibrary&sort=A-Z'>A-Z</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <a class="fs-4 text-decoration-none dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-funnel-fill"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                        <li><h6 class="dropdown-header">Filter by Genres</h6></li>
                            <?php
                                $result = GamesGenres();
                                while ($row = $result-> fetch_assoc()) 
                                {
                                    echo "<li><a class='dropdown-item py-2' href='./?p=GameLibrary&sort=Genre&Genre=$row[G_GENRE]'>$row[G_GENRE]</a></li>";
                                }
                            ?>
                    </ul>
                </div>
            </div>
            <h1 class='text-white fs-1'>
            <?php
                if($_GET['sort'] == "Date")
                {
                    echo "Date";
                    $sortby = "Date";                
                }
                else if($_GET['sort'] == "A-Z")
                {
                    echo "A-Z";
                    $sortby = "A-Z";
                
                }
                else if($_GET['sort'] == "Genre" && $_GET['Genre'] != " ")
                {
                    $genre = $_GET['Genre']; 
                    $sortby = $genre;
                    echo "$genre";
                }
            ?>
           </h1>
                <div class='row'>
                <?php   
                    $index = 1;
                    $result = Games($sortby);
                    $aos = 0;

                    while($row = $result-> fetch_assoc())
                    {                               
                        $gamedate = $row['G_DATE'];
                        $todaydate = date('Y-m-d H:i:s');

                        $calculate_seconds =  strtotime($todaydate) - strtotime($gamedate);
                        $day = floor($calculate_seconds / (24 * 60 * 60));  
                                        
                        echo"<div class='col-6 col-md-6 col-lg-4 col-xl-2 gamecard px-0' data-aos-delay='$aos' data-aos='fade-up' data-aos-anchor-placement='top-bottom' style=''>
                        <a href='?p=GamePage&Game=$row[G_ID]' class='card card-bg border-0 rounded-4 p-3 text-decoration-none' >
                        <img data-tilt data-tilt-scale='1.03' class='w-100 rounded-3' src='img/game-img/game-cover/$row[G_COVER]' onContextMenu='return false;' ondragstart='return false';>";
                                        
                        if ($day < 30)
                        {
                            echo "  <span class='position-absolute translate-middle badge rounded-2 bg-danger p-2 fs-5' style='top: 18px; left: 230px;'>NEW</span>";
                        }   
                                                
                        echo"<div class='card-body p-0 pt-3'>
                        <h4 class='text-start card-title text-white' style='font-size: 1.3rem !important'>$row[G_NAME]</h4>                                    
                        </div>
                        </a>
                        </div>";  
                        $aos = $aos + 50;
                    }            
                        ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>

