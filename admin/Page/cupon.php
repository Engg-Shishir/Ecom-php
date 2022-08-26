<?php
session_start();
$title = "Admin | Cupon";
include_once("../../Connection/connection.php");
include_once("../Layout/header.php");
if (!isset($_SESSION['user_session'])) {
    header("location: login.php");
}
?>
</head>

<body>
    <div class="containers">
        <div class="wrapper">
            <?php include_once("../Layout/navBar.php");  ?>
            <?php include_once("../Layout/sideBar.php");  ?>
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row mt-4">
                        <div class="col-md-8 offset-2">
                            <table class="table table-dark table-bordered">
                                <thead>
                                    <tr>
                                        <th  scope="col">sno</th>
                                        <th  scope="col">Name</th>
                                        <th  scope="col">Discount</th>
                                        <th  scope="col">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" class="d-flex align-items-center justify-content-between"><span>Action</span> <span class="fas fa-plus mr-2"></a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php include_once("../Component/cuponModal.php");  ?>
            </div>
        </div>
    </div>
</body>
<script src="../Asset/js/Dashboard.js"></script>
<script src="../Asset/js/cupon.js"></script>

</html>