<?php 
    session_start();
    $title = "Admin | Menu";
    include_once("../header.php");
    include_once("../component/connection/connection.php");
    if(isset($_SESSION['user_session'])){
      header("location: dashboard.php");
    }

?>


<body>
    
    <div class="container ">
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header text-center shadow">
                        <h3>Primary Menu</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-login" id="login-form">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                <div class="loader"  style="border: 10px solid #f3f3f3;border-radius: 50%;border-top: 7px solid black;border-bottom: 7px solid red;width: 40px;height: 40px;-webkit-animation: spin 2s linear infinite; animation: spin 2s linear infinite; opacity:0;"></div>


                                <button type="submit" class="btn btn-dark shadow" name="login_button" id="login_button">Sign In
                                </button> 
                            </div> 
                        </form>
                    </div>
                </div>
                <div class="card shadow mt-3">
                    <div class="card-header text-center shadow">
                        <h3>Secondary Menu</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-login" id="login-form">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                <div class="loader"  style="border: 10px solid #f3f3f3;border-radius: 50%;border-top: 7px solid black;border-bottom: 7px solid red;width: 40px;height: 40px;-webkit-animation: spin 2s linear infinite; animation: spin 2s linear infinite; opacity:0;"></div>


                                <button type="submit" class="btn btn-dark shadow" name="login_button" id="login_button">Sign In
                                </button> 
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header text-center shadow">
                        <h3>Menu List</h3>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>


<script src="js/login.js"></script>


