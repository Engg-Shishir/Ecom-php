<?php  
    if(strpos($_SERVER['REQUEST_URI'], "product.php")) 
    { ?> <script> 
      $(function(){  
        $('.product-li-parent').addClass("menu-open");
        $('.product-li-parent').addClass("actives");
        $('.all-product-li').addClass("actives");  
          
      })
    </script> <?php }

    if(strpos($_SERVER['REQUEST_URI'], "dashboard.php")) 
    { ?> <script> 
    $(function(){  $('.profile-li').addClass("actives");   })
    </script> <?php }

?>
<link rel="stylesheet" href="css/sidebar.css">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
          <!-- Brand Logo -->
          <a href="./profile.php" class="brand-link">
            <img id="sidebar_profile_logo" src="Asset/image/avatar.png" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-bold" id="sidebar_profile_name">User Name</span>
          </a>

          <!-- Sidebar -->
          <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->                
                <li class="nav-item profile-li">
                  <a href="./dashboard.php" class="nav-link">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>               
                <li class="nav-item common-li">
                  <a href="./order.php" class="nav-link">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                      Order
                    </p>
                  </a>
                </li>  
                <li class="nav-item product-li-parent">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chess-queen"></i>
                    <p>
                      Management
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" >             
                    <li class="nav-item common-li">
                      <a href="./common.php" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                          Common
                        </p>
                      </a>
                    </li>
                    <li class="nav-item  all-product-li">
                      <a href="./product.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Products</p>
                      </a>
                    </li>
                    <li class="nav-item  brand_category-li">
                      <a href="./category/category.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Brand & Category</p>
                      </a>
                    </li>
                  </ul>
                </li>             
                <li class="nav-item logout-li">
                  <a href="./action/logout.php" class="nav-link">
                    <ion-icon class="nav-icon" src="./image/Fixed/arrow-up-right-from-square-solid.svg"></ion-icon>
                    <p>
                      Logout
                    </p>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>