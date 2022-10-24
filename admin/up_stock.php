<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<?php
include '../config/connect.php';

$spare_id = $_POST['spare_id'];
$stock_up = $_POST['stock_up'];

$query = "UPDATE spare SET spare_quanlity = spare_quanlity + $stock_up WHERE spare_id = $spare_id";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt) {
    echo "<script>
    $(document).ready(function(){
        Swal.fire({
            title: 'success',
            text: 'เพิ่มสต็อกสำเร็จ',
            icon: 'success',
            timer : 1000,
            showConfirmButton: false
        });
    });
</script>";
    header('refresh:1; url = accept.php');
    exit(0);
} else {
    echo "<script>
    $(document).ready(function(){
        Swal.fire({
            title: 'warning',
            text: 'เพิ่มสต็อกไม่สำเร็จ',
            icon: 'warning',
            timer : 1500,
            showConfirmButton: false
        });
    });
    </script>";
    header('refresh:1; url = accept.php');
    exit(0);
}
