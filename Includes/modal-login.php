
<div class="modal fade modal-lg" id="LoginOverlay" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="bg-dark modal-content pt-3 pb-3 px-4">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 mt-1 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="row">
                <div class="col-lg-5 pt-5 p-md-0">
                    <form action="includes/login-connect-modal.php" method="post">
                        <div class=" bg-dark border-0 pt-5 p-md-0">
                            <img src="img\icon.png" class="d-block mx-auto my-3" style="height: 50px; !important">
                        </div>
                        <?php 
                            if (isset($_GET['state']) && $_GET['state'] == "invalid")
                            {
                                echo "<h2 class='text-danger fs-5 text-center'>Invalid login</h2>";
                                
                                echo "<script> triggerEvent(test,'click');
                                    function triggerEvent(el,evName)
                                    {el.dispatchEvent(new CustomEvent(evName,{}));} </script>";                           
                            } 
                         ?>	    
                        <div class="form-control bg-dark border-0">
                            <label for="exampleInputEmail1" class=" fs-5 text-white pb-0">Email address</label>
                            <input class="form-control" id="exampleInputEmail1" placeholder="name@example.com" aria-describedby="emailHelp" name="Email">
                        </div>
                        <div class="form-control bg-dark border-0">
                            <label for="exampleInputPassword1" class=" fs-5 text-white">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="Password">
                        </div>
                        <div class="form-control bg-dark border-0">
                            <div class="form check">
                                <button type="submit" name="submit" class="btn btn-outline-light mt-3 mb-2 w-100">Login</button>
                                <label class="fs-6 text-white pt-1 text-center" for="">Dont have an account?</label>
                                <a href="includes/Signup.php" class="btn btn-dark mt-3 w-100">Sign Up</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-7 modalp2">
                    <h1 class="text-white fs-1 pt-0 mb-5 mt-3">Why sould i Sign up?</h1>
                    <p class="text-white fs-5 pb-2">Sign up to save hardware setup options and bookmark games from our library for quick access.</p> 
                    <img src="img\modal.png" class="w-100 px-5 my-3" alt="">                       
                </div>
            </div>
        </div>
    </div>
</div>
