<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<?php
require '../config/connect.php';
if (isset($_POST['confirm'])) {
    $repair_id = $_POST['repair_id'];
    $query = "UPDATE repair SET payment_status = 2 WHERE repair_id = '$repair_id'";
    $query_run = $conn->prepare($query);
    $query_run->execute();
}
if($query_run){
    echo "<script>
    $(document).ready(function(){
        Swal.fire({
            title: 'success',
            text: 'ยืนยันการชำระเงินเรียบร้อย',
            icon: 'success',
            timer : 1500,
            showConfirmButton: false
        });
    });
</script>";
    header('refresh:1; url = confirm_payment.php');
    exit(0);
}
?>