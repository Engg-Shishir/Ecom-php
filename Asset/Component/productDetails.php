<?php

$sno = $_GET['sno'];
$resultset = mysqli_query($conn, "SELECT * from `product` where sno = '{$_GET['sno']}' ");
if (mysqli_num_rows($resultset) > 0) {
    $data = mysqli_fetch_assoc($resultset);
}
$person = json_decode($data['image']);
?>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="">
                <ol class="breadcrumb" style="background-color: transparent;">
                    <li class="breadcrumb-item"><a class="text-info" href="./product.php?category=<?php echo $data['category']; ?>"><?php echo $data['category']; ?></a></li>
                    <li class="breadcrumb-item"><a><?php echo $data['name']; ?></a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="xzoom-container pt-2">
                <img width="400px" height="400px" class="xzoom4" id="xzoom-fancy" src="./admin/Asset/image/product/<?php echo $sno; ?>/<?php echo $person[0]; ?>" xoriginal="./admin/Asset/image/product/<?php echo $sno; ?>/<?php echo $person[0]; ?>" />

                <div class="xzoom-thumbs mt-2">
                    <?php
                    foreach ($person as $key => $value) { ?>
                        <a href="./admin/Asset/image/product/<?php echo $sno; ?>/<?php echo $value; ?>">
                            <img class="xzoom-gallery4" width="80" height="80px" src="./admin/Asset/image/product/<?php echo $sno; ?>/<?php echo $value; ?>" />
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="product-title mr-1"><?php echo  $data['name']; ?></h3>
            <h4 class="price">৳&nbsp;<span><?php echo  $data['price']; ?></span></h4>



            <div class="row  py-3">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle colorToggleButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Color
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item selectColor" href="#">Red</a>
                                <a class="dropdown-item selectColor" href="#">Green</a>
                                <a class="dropdown-item selectColor" href="#">Orange</a>
                                <a class="dropdown-item selectColor" href="#">Black</a>
                            </div>
                        </div>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop2" type="button" class="btn btn-secondary dropdown-toggle sizeToggleButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Size
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                                <a class="dropdown-item selectSize" href="#">S</a>
                                <a class="dropdown-item selectSize" href="#">M</a>
                                <a class="dropdown-item selectSize" href="#">L</a>
                                <a class="dropdown-item selectSize" href="#">XL</a>
                                <a class="dropdown-item selectSize" href="#">XXL</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary"><i class="fas fa-solid fa-cart-plus"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    
    <div class="row">
                <div class="col-md-12">
                  <div><?php echo stripslashes(html_entity_decode($data["details"])) ?></div>
                </div>
            </div>
</div>

