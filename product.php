<?php
session_start();
include_once("./Connection/connection.php");
?>


<!DOCTYPE html>
<html lang="Eng">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Eshop Ecommerce</title>

    <?php include_once "./Asset/Component/css.php"; ?>
    <style>
        ._p-qty .value-button {
            display: inline-flex;
            border: 0px solid #ddd;
            margin: 0px;
            width: 30px;
            height: 35px;
            justify-content: center;
            align-items: center;
            background-color: #F7941D;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            color: #fff;
            cursor: pointer;
        }

        ._p-qty .value-button {
            border: 0px solid #fe0000;
            height: 35px;
            font-size: 20px;
            font-weight: bold;
        }

        ._p-qty input#number {
            text-align: center;
            border: none !important;
            margin: 0px;
            width: 50px;
            height: 35px;
            font-size: 14px;
            box-sizing: border-box;
        }

        ._p-features>span {
            display: block;
            font-size: 16px;
            color: #000;
            font-weight: 500;
        }

        ._p-add-cart .buy-btn {
            background-color: #fd7f34;
            color: #fff;
        }

        ._p-add-cart .btn {
            text-transform: capitalize;
            padding: 6px 20px;
            /* width: 200px; */
            border-radius: 52px;
        }

        ._p-add-cart .btn {
            margin: 0px 8px;
        }

        ._p-qty .decrease_ {
            position: relative;
            right: -5px;
            top: 3px;
        }

        ._p-qty .decrease_.not-allowed,
        ._p-qty .increase_.not-allowed {
            cursor: not-allowed ! important;
        }

        ._p-qty .increase_ {
            position: relative;
            top: 3px;
            left: -5px;
        }
    </style>
</head>

<body class="js">
    <?php include_once "./Asset/Component/topbar.php"; ?>
    <?php include_once "./Asset/Component/productDetails.php"; ?>
    <?php include_once "./Asset/Component/footer.php"; ?>

</body>
<?php include_once "./Asset/Component/js.php"; ?>
<script src="./Asset/JS/productQuickView.js"></script>
<script>
    $(document).ready(function() {
        var value = 0;
        $(".decrease_").click(function() {
            decreaseValue(this);
        });
        $(".increase_").click(function() {
            increaseValue(this);
        });

        function increaseValue(_this) {
            value = parseInt($(_this).siblings("input#number").val());
            //   value = isNaN(value) ? 0 : value;
            value++;
            if (value > 3) {
                $('.increase_').addClass('not-allowed');
                $('.decrease_').removeClass('not-allowed');
            } else {
                $('.increase_').removeClass('not-allowed');
                $('.decrease_').removeClass('not-allowed');
                $(_this).siblings("input#number").val(value);
            }
            //   $(_this).siblings("input#number").val(value);
        }

        function decreaseValue(_this) {
            value = parseInt($(_this).siblings("input#number").val());
            //   value = isNaN(value) ? 0 : value;
            value--;

            if (value < 1) {
                $('.decrease_').addClass('not-allowed');
                $('.increase_').removeClass('not-allowed');
            } else {
                $('.decrease_').removeClass('not-allowed');
                $('.increase_').removeClass('not-allowed');
                $(_this).siblings("input#number").val(value);
            }

            //   value < 1 ? (value = 1) : "";
        }
    });
</script>
<script>
    $(function() {
        $('.selectColor').on("click", function() {
            var color = $(this).text().toLowerCase();
            $('.colorToggleButton').css({
                'background-color': color,
                'color': 'white'
            });
        });
        $('.selectSize').on("click", function() {
            var size = $(this).text();
            $('.sizeToggleButton').text(size);
        });
    });
</script>

</html>