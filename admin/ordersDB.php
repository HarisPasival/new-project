<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<?php
require '../config/connect.php';
if (isset($_POST['add_orders'])) {
    $spare_id = $_POST['spare_id'];
    $brand_id = $_POST['brand_id'];
    $order_quanlity = $_POST['order_quanlity'];
    $orders_status = $_POST['orders_status'];

    $query = "INSERT INTO orders (spare_id,brand_id,order_quanlity,orders_status) VALUES (:spare_id,:brand_id,:order_quanlity,:orders_status)";
    $query_run = $conn->prepare($query);

    $data = [
        ':spare_id' => $spare_id,
        ':brand_id' => $brand_id,
        ':order_quanlity' => $order_quanlity,
        ':orders_status' => $orders_status
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'success',
                text: 'รายการถูกเพิ่มเรียบร้อยแล้ว',
                icon: 'success',
                timer : 1500,
                showConfirmButton: false
            });
        });
        </script>";
        header('refresh:1; url = orders.php');
        exit(0);
    } else {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'warning',
                text: 'เพิ่มรายการไม่สำเร็จ',
                icon: 'warning',
                timer : 1500,
                showConfirmButton: false
            });
        });
        </script>";
        header('refresh:1; url = orders.php');
        exit(0);
    }
}
?>