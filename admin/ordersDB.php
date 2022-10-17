<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<?php
    require '../config/connect.php';
    if(isset($_POST['confirm_orders'])){
        $shop_name = $_POST['shop_name'];
        $order_quanlity = $_POST['order_quanlity'];
    }
?>