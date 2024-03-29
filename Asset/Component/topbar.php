<!-- Header -->
<header class="header shop">
    <!-- Topbar -->
    <div class="middle-inner" style="display:none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="./Asset/frontend/images/logo.png" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select>
                                <option selected="selected">All Category</option>
                                <option>watch</option>
                                <option>mobile</option>
                                <option>kid’s item</option>
                            </select>
                            <form>
                                <input name="search" placeholder="Search Products Here....." type="search">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fas fa-user" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <?php  
                              if(isset($_SESSION['user_session'])){  
                            ?>

                            <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>

                            <?php  
                               }
                            ?>

                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>2 Items</span>
                                    <a href="#">View Cart</a>
                                </div>
                                <ul class="shopping-list">
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        <h4><a href="#">Woman Ring</a></h4>
                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                    </li>
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        <h4><a href="#">Woman Necklace</a></h4>
                                        <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                    </li>
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">$134.00</span>
                                    </div>
                                    <a href="checkout.html" class="btn animate">Checkout</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li>   
                              <a href="index.html"><img src="./Asset/frontend/images/logo.png" alt="logo"></a>
                            </li>
                            <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                            <li><i class="ti-email"></i> support@shophub.com</li>
                            <li><i class="ti-location-pin"></i> Store location</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-5 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <?php   
                              if(!isset($_SESSION['user_session'])){
                            ?>
                            <li>
                                <div class="sinlge-bar shopping" style="width:100%;">
                                    <a id="userLoginBtn" href="#"><i class="ti-power-off"></i> Login</a>
                                    <!-- Shopping Item -->
                                    <div class="user-login">
                                        <div class="login-box">
                                            <div class="card card-outline">
                                            <div class="card-header text-center">
                                                <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
                                                <hr>
                                                <?php include_once"part/tabBar.php"; ?>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content" id="nav-tabContent">
                                                  <?php include_once"part/tabContent_loginForm.php"; ?>

                                                  <?php include_once"part/tabContent_signUpForm.php"; ?>

                                                  <?php include_once"part/tabContent_recover.php"; ?>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <?php 
                            }else{ ?>
                            <li>
                                <div class="sinlge-bar shopping">
                                    <a id="userLoginBtn" href="#"><i class="ti-user usernameShow mr-2"></i></a>
                                    <div class="user-login">
                                            <ul class="d-flex flex-column">
                                                <a class=" btn animate text-light px-5 py-1 text-left mb-1" href="./User/Page/dashboard.php">Your Account</a>
                                                <a class=" btn animate text-light px-5 py-1 text-left mb-1" href="">Orders</a>
                                                <a class=" btn animate text-light px-5 py-1 text-left mb-1" href="">Catr</a>
                                                <a class=" btn animate text-light px-5 py-1 text-left " href="./user/Action/logout.php">Logout</a>
                                            </ul>
                                    </div>
                                </div>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-md-12 col-lg-3">
                        <div class="all-category">
                            <h3 style="cursor:pointer;" class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
                            <ul class="main-category" style="display:none;">
                                <li><a href="#">New Arrivals <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    <ul class="sub-category">
                                        <li class="secondLi"><a href="#">denim <i class="fa fa-angle-right"></i></a>
                                                <ul class="sub-category">
                                                    <li><a href="#">accessories</a></li>
                                                    <li><a href="#">best selling</a></li>
                                                    <li><a href="#">top 100 offer</a></li>
                                                </ul>
                                        </li>
                                        <li><a href="#">accessories</a></li>
                                        <li><a href="#">best selling</a></li>
                                        <li><a href="#">top 100 offer</a></li>
                                        <li class="secondLi"><a href="#">sunglass <i class="fa fa-angle-right"></i></a>
                                                <ul class="sub-category">
                                                    <li><a href="#">accessories</a></li>
                                                    <li><a href="#">best selling</a></li>
                                                    <li><a href="#">top 100 offer</a></li>
                                                </ul>
                                        </li>
                                        <li><a href="#">watch</a></li>
                                        <li><a href="#">man’s product</a></li>
                                        <li><a href="#">ladies</a></li>
                                        <li><a href="#">westrn dress</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">accessories</a></li>
                                <li><a href="#">top 100 offer</a></li>
                                <li><a href="#">sunglass</a></li>
                                <li><a href="#">watch</a></li>
                                <li><a href="#">man’s product</a></li>
                                <li><a href="#">ladies</a></li>
                                <li><a href="#">westrn dress</a></li>
                                <li><a href="#">denim </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-9">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg mb-2 mb-lg-0">
                                <div class="navbar-collapse">	
                                    <div class="nav-inner w-100">	
                                        <ul class="nav main-menu menu navbar-nav w-100 text-center">
                                            <li class="active"><a href="#">Home</a></li>
                                            <li><a href="#">Product</a></li>												
                                            <li><a href="#">Service</a></li>
                                            <li><a href="#">Pages</a></li>									
                                            <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="mb-2 mb-lg-0"><a href="contact.html">Contact Us</a></li>
                                            <?php   
                                                 if(isset($_SESSION['user_session'])){
                                            ?>
                                            <li class="cartLi" data-toggle="modal" data-target="#exampleModal" data-backdrop="static">
                                                <i class="fas fa-solid fa-cart-arrow-down"><span class="cartCountSpan"></span></i>
                                            </li>
                                            <?php   }?>
                                            <li class="mb-2 pl-3 mb-lg-0 d-flex align-items-center justify-content-center">
                                            <div class="input-group">
                                                <input id="searchProductField" type="text" class="form-control pl-1" placeholder="Search">
                                                <div class="input-group-append">
                                                    <div class="input-group-text" style="cursor:pointer;">
                                                    <i class="ti-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->
