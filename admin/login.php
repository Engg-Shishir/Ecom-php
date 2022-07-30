<?php 
    session_start();
    $title = "Admin | Login";
    include_once("./layout/header.php");
    include_once("../component/connection/connection.php");
    if(isset($_SESSION['user_session'])){
      header("location: dashboard.php");
    }

?>
       <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<div class="container">
	<div class="row d-flex justify-content-center mt-5">
		<div class="col-12 col-md-8 col-lg-6 col-xl-5">
			<div class="card py-3 px-2">
				<!-- <p class="text-center mb-3 mt-2">Connect with</p>
				<div class="row mx-auto ">
					<div class="col-4">
						<i class="fab fa-twitter"></i>
					</div>
					<div class="col-4">
						<i class="fab fa-facebook"></i>
					</div>
					<div class="col-4">
						<i class="fab fa-google"></i>
					</div>
				</div> -->
				<div class="division">
					<div class="row">
						<div class="col-3"><div class="line l"></div></div>
						<div class="col-6"><span>Login With Email</span></div>
						<div class="col-3"><div class="line r"></div></div>
					</div>
				</div>
				<form class="myform"  id="login-form">
					<div class="form-group">
                        <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
  					</div>
 					<div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
  					</div>
                    <div class="form-group d-flex align-items-center justify-content-between mt-3">
  						<button id="login_button" type="button" class="btn btn-block  btn-primary"><small><i class="far fa-user pr-2"></i>Se connecter</small></button>
                    </div> 
  					<div class="form-group mt-3">
  					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</body>
<script src="js/login.js"></script>
</html>