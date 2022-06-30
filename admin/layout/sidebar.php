
<?php 
     session_start();
    include_once("../connection.php");
    include_once"../header.php"; 

    if(!isset($_SESSION['user_session'])){
        header("location: ../login.php");
    }

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE uid = {$_SESSION['user_session']}");
    if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
    }

    ?>
      <script>
        $('document').ready(function() { 
            $('.nav-link').each(function(index, value) {
                $(this).removeClass("active");
                $(this).css("color","white");
            });
        });
      </script>
    <?php






    if(strpos($_SERVER['REQUEST_URI'], "product.php")) 
    { ?> <script> 
      $(function(){  $('.li-product').addClass("active");   })
    </script> <?php }

    if(strpos($_SERVER['REQUEST_URI'], "dashboard.php")) 
    { ?> <script> 
    $(function(){  $('.li-dashboard').addClass("active");   })
    </script> <?php }

?>


            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark shadow">

                <div class="dropdown d-flex align-items-center justify-content-center">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" > -->
                        <img  src="action/images/<?php echo $row['profile_photo']; ?>" alt=""  height="50px" width="50px" style="border-radius:50%;" class="rounded-circle" id="sidebar_profile_logo">
                    </a>&nbsp;&nbsp;&nbsp;
                    

                    <h5 class="ml-2">Shishir Bhuiyan</h5>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="dashboard.php">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../admin/action/logout.php">Sign out</a></li>
                    </ul>
                </div>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="../admin/dashboard.php" class="nav-link li-dashboard" aria-current="page">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                    Home
                    </a>
                </li>
                <li>
                    <!-- <a href="../admin/product.php" class="nav-link li-product text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                    Products
                    </a> -->
                    <a href="../admin/product.php" class="nav-link li-product text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                    Products
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                    Customers
                    </a>
                </li>
                </ul>
                <hr>
            </div>
