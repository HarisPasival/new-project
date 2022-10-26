<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<?php
require '../config/connect.php';
if (isset($_POST['add_details'])) {
    $spare_id = $_POST['spare_id'];
    $brand_id = $_POST['brand_id'];
    $repair_id = $_POST['repair_id'];
    $details_quanlity = $_POST['details_quanlity'];

    $query = "INSERT INTO repair_details (spare_id,brand_id,repair_id,details_quanlity) VALUES (:spare_id,:brand_id,:repair_id,:details_quanlity)";
    $query_run = $conn->prepare($query);

    $data = [
        ':spare_id' => $spare_id,
        ':brand_id' => $brand_id,
        ':repair_id' => $repair_id,
        ':details_quanlity' => $details_quanlity
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'success',
                text: 'เพิ่มอะไหล่เรียบร้อยแล้ว',
                icon: 'success',
                timer : 1500,
                showConfirmButton: false
            });
        });
        </script>";
        header('refresh:1; url = view_details.php');
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
        header('refresh:1; url = view_details.php');
        exit(0);
    }
}
