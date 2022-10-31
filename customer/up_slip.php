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
}
// echo "<pre>";
// print_r($img_new);
// echo "<pre>";
