<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<?php
require '../config/connect.php';
if (isset($_POST['payment'])) {
    $repair_id = $_POST['repair_id'];
    $Time = time();
    $Date = date("Ymd");
    $ran = (mt_rand());
    $img = $_FILES['slip_payment']['name'];
    $type = strrchr($_FILES['slip_payment']['name'], ".");
    $size = $_FILES['slip_payment']['size'];
    $temp = $_FILES['slip_payment']['tmp_name'];
    $img_new = $Time . '-' . $Date . '-' . $ran . $type;
    $path = "../slip/" . $img_new;
    // echo "<pre>";
    // print_r($img_new);
    // echo "<pre>";
    // exit();
    move_uploaded_file($temp, '../slip/' . $img_new);
    $query = "UPDATE repair SET slip_payment = '$img_new' WHERE repair_id = '$repair_id'";
    $query_run = $conn->prepare($query);
    $query_run->execute();

    if ($query_run) {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'success',
                text: 'อัปโหลดสลิปเรียบร้อย',
                icon: 'success',
                timer : 1500,
                showConfirmButton: false
            });
        });
    </script>";
        header('refresh:1; url = Home_Customer.php');
        exit(0);
    }
}
// echo "<pre>";
// print_r($img_new);
// echo "<pre>";
