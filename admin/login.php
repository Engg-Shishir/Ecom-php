<?php 
    session_start();
    $title = "Admin | Login";
    include_once("../header.php");
    include_once("../connection.php");
    if(isset($_SESSION['user_session'])){
      header("location: dashboard.php");
    }

?>


<body>
    
    <div class="container ">
        <div class="row mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center shadow">
                        <h3>Admin Login</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-login" id="login-form">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
                            </div>
                            <div class="form-group mt-2">
                                <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
                            </div>
                            <!-- <div class="form-group mt-2">
                                <label>Select Image</label>
                                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                            </div> -->
                            <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                <div class="loader"  style="border: 10px solid #f3f3f3;border-radius: 50%;border-top: 7px solid black;border-bottom: 7px solid red;width: 40px;height: 40px;-webkit-animation: spin 2s linear infinite; animation: spin 2s linear infinite; opacity:0;"></div>


                                <button type="submit" class="btn btn-dark shadow" name="login_button" id="login_button">Sign In
                                </button> 
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    
</body>


<script src="js/login.js"></script>


