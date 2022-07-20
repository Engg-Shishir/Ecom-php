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
          <a href="./dashboard.php" class="brand-link">
            <img id="sidebar_profile_logo" src="" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-bold" id="sidebar_profile_name"></span>
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
                      Profile
                    </p>
                  </a>
                </li>
                <li class="nav-item product-li-parent">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chess-queen"></i>
                    <p>
                      Product
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" >
                    <li class="nav-item  all-product-li">
                      <a href="./product.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Products</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>