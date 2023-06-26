<div class="modal fade modal-lg" id="LoginOverlay" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down">
        <div class="bg-dark modal-content p-3" style="min-height: 6px;">
            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="d-none d-lg-block">
                <div class="row">
                    <div class="col-5 pt-0">
                        <div class="d-flex flex-column " style="height: 560px;" id="v-pills-tab" role="tablist" aria-orientation="">
                            <h1 class="text-white pb-3 fs-3 mt-4 text-start">Hello <?php echo $user["USER_NAME"]; ?>!</h1>
                            <button class=" btn btn-dark active  fs-5 text-start w-100" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" aria-controls="v-pills-settings" aria-selected="true" role="tab">Account Settings</button>
                            <button class=" btn btn-dark fs-5 text-start w-100" id="v-pills-saved-tab" data-bs-toggle="pill" data-bs-target="#v-pills-saved" aria-controls="v-pills-saved" aria-selected="true" role="tab">Saved Setups</button>
                            <button class=" btn btn-dark fs-5 text-start w-100" id="v-pills-favorite-tab" data-bs-toggle="pill" data-bs-target="#v-pills-favorite" aria-controls="v-pills-favorite" aria-selected="true" role="tab">Bookmarked Games</button>
                            <?php
                                if ($user['USER_ADMIN'] == 1) 
                                {     
                                    echo"
                                    <button class=' btn btn-dark fs-5 text-start w-100' id='v-pills-Admin-tab' data-bs-toggle='pill' data-bs-target='#v-pills-Admin' aria-controls='v-pills-Admin' aria-selected='true' role='tab'><span class='fs-5 pe-2 text-warning'><i class='bi bi-lock-fill'></i></span>Admin functions</button>";
                                }
                            ?>
                            <a class="w-100 btn btn-outline-danger fs-5 mt-auto" href="Includes/Logout.php"><i class="bi bi-door-open-fill pe-2"></i>Log Out
                            </a>
                        </div>
                    </div>
                    <div class="col-7 tab-content" id="v-pills-tabContent">
                        <div class="tab-pane show active fade overflow-auto" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
                            <h1 class="text-white  mt-3 text-start"><i class="bi bi-gear-fill"></i> Account Settings</h1>
                            <p class="text-white fs-5">Customize your profile and change your avatar to reflect your personality.</p>

                            <h1 class="text-white fs-2 pt-3">Profile picture</h1>
                            <div class="position-relative">
                                <form action="includes/upload-avatar.php" method="post" enctype="multipart/form-data">
                                    <label for="file" title="Select Avatar" class="position-absolute bottom-0 start-0 btn btn-light fs-5 py-1 px-2" style="margin-bottom: 70px; margin-left: 110px;"><i class="bi bi-pencil-fill"></i></label>
                                    <input type="file" name="img" class="d-none" id="file" onchange="form.submit()"></input>
                                    <input type="hidden" name="userid" value="<?php echo $user['USER_ID']?>"></input>
                                    <img class='d-block mx-auto rounded-circle' src='img/avatar/<?php echo $user['USER_AVATAR']?>' onContextMenu='return false;' ondragstart='return false' style='width: 200px; height: 200px; object-fit: cover'>
                                    <h1 class="text-white text-center fs-3 mt-2">#<?php echo $user['USER_ID']?></h1>  
                                </form>
                            </div>
                            <?php 
                                if (isset($_GET['error']))
                                {
                                    echo "<script> triggerEvent(test,'click');
                                    function triggerEvent(el,evName)
                                    {el.dispatchEvent(new CustomEvent(evName,{}));} </script>";   

                                    if($_GET['error'] == "toolarge")
                                    {
                                        echo "<h2 class='text-danger fs-5 text-center'>File is too big maximum 5MB</h2>";
                                    }

                                    if($_GET['error'] == "wrongfile")
                                    {
                                        echo "<h2 class='text-danger fs-5 text-center'>Wrong file format</h2>";
                                    }                       
                                } 
                            ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-saved" role="tabpanel" aria-labelledby="v-pills-saved-tab" tabindex="0">
                            <h1 class="text-white  mt-3 text-start"><span class="fs-1 pe-2 text-info"><i class="bi bi-box-arrow-down"></i></span>Saved Setups</h1>
                            <p class="text-white fs-5">View and manage your saved hardware configurations for quick and easy access.</p>
                        </div>
                        <div class="tab-pane fade" id="v-pills-favorite" role="tabpanel" aria-labelledby="v-pills-favorite-tab" tabindex="0">
                            <h1 class="text-white  mt-3 text-start"><span class="fs-1 pe-2 text-success"><i class='bi bi-bookmark-fill '></i></span>Bookmarked Games</h1>
                            <p class="text-white fs-5">Access your bookmarked games and easily check their hardware requirements for optimal performance.</p>
                            <div class="row overflow-auto" style="height: 350px">
                            <?php
                                $userid = $user['ID'];  
                                $result = UserBookmarks($userid);
                                if ($result->num_rows > 0)  
                                {   
                                    while($row = $result-> fetch_assoc())
                                    {            
                                                        
                                        echo"<div class='col-6 gamecard px-0' style='min-width: 2px !important;'>
                                        <a href='./?p=GamePage&Game=$row[G_ID]' class='card card-bg border-0 rounded-4 p-3 text-decoration-none' >
                                            <img data-tilt data-tilt-scale='1.03' class='w-100 rounded-3' src='img/game-img/game-cover/$row[G_COVER]'>   
                                            <div class='card-body ps-0 pb-0'>
                                                <h4 class='text-start fs-5 card-title text-white p-0'>$row[G_NAME]</h4> 
                                            </div>
                                        </a>
                                    </div>";  
                                    }
                                } 
                            ?>
                            </div>
                        </div>
                        <?php
                            if ($user['USER_ADMIN'] == 1) 
                            {  
                                echo"
                                <div class='tab-pane fade' id='v-pills-Admin' role='tabpanel' aria-labelledby='v-pills-Admin-tab' tabindex='0'>
                                    <h1 class='text-white text-cebnter mt-3'><span class='fs-1 pe-2 text-warning'><i class='bi bi-lock-fill'></i></span>Admin Functions</h1>
                                    <p class='text-white fs-5'> Manage the website's database and view all registered users.</p>
                                
                                    <a href='?p=ManageDatabase' class='btn btn-dark fs-5 text-start w-100'>Manage Database</a>   
                                    <a href='?p=Users' class='btn btn-dark fs-5 text-start w-100'>User List</a>   

                                </div>";
                            }
                        ?>
                        <script type="text/javascript" src="js/vanilla-tilt.js"></script>  
                    </div>
                </div>
            </div>
            <div class="d-block d-lg-none">
            <div class="row">
                <h1 class="text-white pb-3 fs-2 text-start">Hello <?php echo $user["USER_NAME"]; ?>!</h1>
                    <div class="col-2 pt-0 p-0">
                        <div class="d-flex flex-column" style="height: 80vh;" id="v-pills-tab2" role="tablist" aria-orientation="">
                            <button class="btn btn-dark active fs-1 text-center" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings2" aria-controls="v-pills-settings2"  aria-selected="true" role="tab">
                                <i class="bi bi-gear-fill"></i> 
                            </button>
                            <button class="btn btn-dark text-info fs-1 text-center" id="v-pills-saved-tab2" data-bs-toggle="pill" data-bs-target="#v-pills-saved2" aria-controls="v-pills-saved2" aria-selected="true" role="tab">
                                <i class="bi bi-box-arrow-down"></i>
                            </button>
                            <button class="btn btn-dark text-success fs-1 text-center" id="v-pills-favorite-tab2" data-bs-toggle="pill" data-bs-target="#v-pills-favorite2" aria-controls="v-pills-favorite2" aria-selected="true" role="tab">
                                <i class='bi bi-bookmark-fill'></i>
                            </button>
                            <?php
                                if ($user['USER_ADMIN'] == 1) 
                                {     
                                    echo"
                                    <button class='btn btn-dark text-warning fs-1 text-center' id='v-pills-Admin-tab' data-bs-toggle='pill' data-bs-target='#v-pills-Admin2' aria-controls='v-pills-Admin2' aria-selected='true' role='tab'><i class='bi bi-lock-fill'></i></button>";
                                }
                            ?>
                            <a class="w-100 btn btn-outline-danger text-center fs-1 mt-auto" href="Includes/Logout.php"><i class="bi bi-door-open-fill"></i></a>
                        </div>
                    </div>
                    <div class="col tab-content" id="v-pills-tabContent2">
                        <div class="tab-pane show active fade overflow-auto" id="v-pills-settings2" role="tabpanel" aria-labelledby="v-pills-settings-tab2" tabindex="0">
                            <h1 class="text-white  mt-3 text-start"><i class="bi bi-gear-fill"></i> Account Settings</h1>
                            <p class="text-white fs-5">Customize your profile and change your avatar to reflect your personality.</p>
                            <h1 class="text-white fs-2 pt-3">Profile picture</h1>
                            <div class="position-relative">
                                <form action="includes/upload-avatar.php" method="post" enctype="multipart/form-data">
                                    <label for="file" title="Select Avatar" class="position-absolute bottom-0 start-0 btn btn-light fs-5 py-1 px-2" style="margin-bottom: 70px; margin-left: 110px;"><i class="bi bi-pencil-fill"></i></label>
                                    <input type="file" name="img" class="d-none" id="file" onchange="form.submit()"></input>
                                    <input type="hidden" name="userid" value="<?php echo $user['USER_ID']?>"></input>
                                    <img class='d-block mx-auto rounded-circle' src='img/avatar/<?php echo $user['USER_AVATAR']?>' onContextMenu='return false;' ondragstart='return false' style='width: 200px; height: 200px; object-fit: cover'>
                                    <h1 class="text-white text-center fs-3 mt-2">#<?php echo $user['USER_ID']?></h1>  
                                </form>
                            </div>
                            <?php 
                                if (isset($_GET['error']))
                                {
                                    echo "<script> triggerEvent(test,'click');
                                    function triggerEvent(el,evName)
                                    {el.dispatchEvent(new CustomEvent(evName,{}));} </script>";   

                                    if($_GET['error'] == "toolarge")
                                    {
                                        echo "<h2 class='text-danger fs-5 text-center'>File is too big maximum 5MB</h2>";
                                    }

                                    if($_GET['error'] == "wrongfile")
                                    {
                                        echo "<h2 class='text-danger fs-5 text-center'>Wrong file format</h2>";
                                    }                       
                                } 
                            ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-saved2" role="tabpanel" aria-labelledby="v-pills-saved-tab2" tabindex="0">
                            <h1 class="text-white  mt-3 text-start"><span class="fs-1 pe-2 text-info"><i class="bi bi-box-arrow-down"></i></span>Saved Setups</h1>
                            <p class="text-white fs-5">View and manage your saved hardware configurations for quick and easy access.</p>
                        </div>
                        <div class="tab-pane fade" id="v-pills-favorite2" role="tabpanel" aria-labelledby="v-pills-favorite-tab2" tabindex="0">
                            <h1 class="text-white  mt-3 text-start"><span class="fs-1 pe-2 text-success"><i class='bi bi-bookmark-fill '></i></span>Bookmarked Games</h1>
                            <p class="text-white fs-5">Access your bookmarked games and easily check their hardware requirements for optimal performance.</p>
                            <div class="row overflow-auto" style="height: 500px">
                            <?php
                                $userid = $user['ID'];  
                                $result = UserBookmarks($userid);
                                if ($result->num_rows > 0)  
                                {   
                                    while($row = $result-> fetch_assoc())
                                    {            
                                                        
                                        echo"<div class='col-12 px-0'>
                                        <a href='./?p=GamePage&Game=$row[G_ID]' class='card card-bg border-0 rounded-4 p-3 text-decoration-none'd>
                                            <img data-tilt data-tilt-scale='1.03' class='w-100 rounded-3' src='img/game-img/game-cover/$row[G_COVER]'>   
                                            <div class='card-body ps-0 pb-0'>
                                                <h4 class='text-start fs-5 card-title text-white p-0'>$row[G_NAME]</h4> 
                                            </div>
                                        </a>
                                    </div>";  
                                    }
                                } 
                            ?>
                            </div>
                        </div>
                        <?php
                            if ($user['USER_ADMIN'] == 1) 
                            {  
                                echo"
                                <div class='tab-pane fade' id='v-pills-Admin2' role='tabpanel' aria-labelledby='v-pills-Admin-tab2' tabindex='0'>
                                    <h1 class='text-white text-cebnter mt-3'><span class='fs-1 pe-2 text-warning'><i class='bi bi-lock-fill'></i></span>Admin Functions</h1>
                                    <p class='text-white fs-5'> Manage the website's database and view all registered users.</p>
                                
                                    <a href='?p=ManageDatabase' class='btn btn-dark fs-5 text-start w-100'>Manage Database</a>   
                                    <a href='?p=Users' class='btn btn-dark fs-5 text-start w-100'>User List</a>   

                                </div>";
                            }
                        ?>
                        <script type="text/javascript" src="js/vanilla-tilt.js"></script>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>