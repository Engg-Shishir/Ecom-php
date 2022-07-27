<?php
session_start();
session_unset();
session_destroy();
?>

<!-- <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
$(function(){

    toastr.success('You are loged out!');
})
</script>
 -->


<?php
header("location: ../../index.php");
?>