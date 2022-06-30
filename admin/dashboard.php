
<?php 
    $title = "Admin | Dashboard";
?>

<link rel="stylesheet" href="css/profilepage.css">
<link rel="stylesheet" href="../css/adminlte.min.css">
<body>

<div class="container">
    <div class="row mt-3">
      
        <!-- Sidebar -->
        <div class="col-md-3">
          <?php include_once"./layout/sidebar.php"; ?>
        </div>

        
        <div class="col-md-9">
            <div class="card shadow">
            <div class="card-body admin-card-body" >
                <div class="admin_profilePic shadow">
             
                       <img id="profile_photo_show" src="" alt="vbnbv"  height="150px" width="150px" style="border-radius:50%;">

                </div>

                <div class="card-body shadow-lg">
                        <form class="form-login" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-md-6">
                                  <input type="text" class="form-control" placeholder="Your name" name="name" id="name" value="" />
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Email" id="user_email" />
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="row  mt-3">
                            <div class="col-md-6 ">
                                <!-- <div class="field input">
                                  <input type="password" name="password"   id="password"  value="" required >
                                  <i id="show_hide_password" class="fas fa-eye-slash"></i>
                                </div> -->

                                

                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Enter new password" id="password" />
                                    <div class="input-group-prepend">
                                      <span  style="cursor:pointer;" class="input-group-text"><i id="show_hide_password" class="fas fa-eye-slash"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="file" id="file" name='file'  required>
                            </div>
                          </div>
                            <hr />
                            <div class="form-group d-flex align-items-center justify-content-between ">
                                <div class="loader"  style="border: 10px solid #f3f3f3;border-radius: 50%;border-top: 7px solid black;border-bottom: 7px solid red;width: 40px;height: 40px;-webkit-animation: spin 2s linear infinite; animation: spin 2s linear infinite; opacity:0;"></div>
        

                                <button type="button" class="btn btn-dark" id="update_profile_button">Update
                                </button> 
                            </div> 
                        </form>
                    </div>
            </div>
        </div>
        
    </div>
</div>


</body>

<script src="js/updateProfile.js"></script>