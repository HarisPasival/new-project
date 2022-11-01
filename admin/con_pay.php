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
?>