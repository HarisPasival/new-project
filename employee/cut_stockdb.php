<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<?php
include '../config/connect.php';

$spare_id = $_POST['spare_id'];
$cut_stock = $_POST['cut_stock'];

$query = "UPDATE spare SET spare_quanlity = spare_quanlity - $cut_stock WHERE spare_id = $spare_id";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt) {
    echo "<script>
    $(document).ready(function(){
        Swal.fire({
            title: 'success',
            text: 'ตัดสต็อกสำเร็จ',
            icon: 'success',
            timer : 1000,
            showConfirmButton: false
        });
    });
</script>";
    header('refresh:1; url = spares.php');
    exit(0);
} else {
    echo "<script>
    $(document).ready(function(){
        Swal.fire({
            title: 'warning',
            text: 'ตัดสต็อกไม่สำเร็จ',
            icon: 'warning',
            timer : 1500,
            showConfirmButton: false
        });
    });
    </script>";
    header('refresh:1; url = spares.php');
    exit(0);
}
