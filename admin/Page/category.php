<?php
session_start();
$title = "Admin | Category";
include_once("../../Connection/connection.php");
include_once("../Layout/header.php");
if (!isset($_SESSION['user_session'])) {
  header("location: login.php");
}
?>

<style>
  .select2.select2-container {
    width: 100% !important;
  }

  .select2.select2-container .select2-selection {
    border: 1px solid #ccc;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    height: 34px;
    margin-bottom: 15px;
    outline: none !important;
    transition: all .15s ease-in-out;
  }



  .select2.select2-container .select2-selection .select2-selection__arrow {
    background: #f8f8f8;
    border-left: 1px solid #ccc;
    -webkit-border-radius: 0 3px 3px 0;
    -moz-border-radius: 0 3px 3px 0;
    border-radius: 0 3px 3px 0;
    height: 32px;
    width: 33px;
  }

  .select2-container .select2-dropdown .select2-search {
    padding: 0;
  }
</style>
</head>

<body>
  <div class="containers">
    <div class="wrapper">
      <?php include_once("../Layout/navBar.php");  ?>
      <?php include_once("../Layout/sideBar.php");  ?>
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title">List of Categories</h3>
                  <div class="card-tools">
                    <buttton type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#exampleModal" data-backdrop="static"><span class="fas fa-plus"></span> Create New</buttton>
                  </div>
                </div>
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-4 col-sm-6">
                        <label>Select One</label>
                        <select class="js-select2">
                          <option></option>
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>Arizona</option>
                          <option>Arkansas</option>
                          <option>California</option>
                          <option>Colorado</option>
                          <option>Connecticut</option>
                          <option>Delaware</option>
                          <option>Florida</option>
                          <option>Georgia</option>
                          <option>Hawaii</option>
                          <option>Idaho</option>
                          <option>Illinois</option>
                          <option>Indiana</option>
                          <option>Iowa</option>
                          <option>Kansas</option>
                          <option>Kentucky</option>
                          <option>Louisiana</option>
                          <option>Maine</option>
                          <option>Maryland</option>
                          <option>Massachusetts</option>
                          <option>Michigan</option>
                          <option>Minnesota</option>
                          <option>Mississippi</option>
                          <option>Missouri</option>
                          <option>Montana</option>
                          <option>Nebraska</option>
                          <option>Nevada</option>
                          <option>New Hampshire</option>
                          <option>New Jersey</option>
                          <option>New Mexico</option>
                          <option>New York</option>
                          <option>North Carolina</option>
                          <option>North Dakota</option>
                          <option>Ohio</option>
                          <option>Oklahoma</option>
                          <option>Oregon</option>
                          <option>Pennsylvania</option>
                          <option>Rhode Island</option>
                          <option>South Carolina</option>
                          <option>South Dakota</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Utah</option>
                          <option>Vermont</option>
                          <option>Virginia</option>
                          <option>Washington</option>
                          <option>West Virginia</option>
                          <option>Wisconsin</option>
                          <option>Wyoming</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once("../Component/categoryInsertModal.php");  ?>
      </div>
    </div>
  </div>
</body>
<script src="../Asset/js/Dashboard.js"></script>

</html>