<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<?php
require '../config/connect.php';
// echo "<pre>";
// print_r($_POST);
// echo "<pre>";
if (isset($_POST['add_repair'])) {
    $repair_date = $_POST['repair_date'];
    $repair_name = $_POST['repair_name'];
    $repair_surname = $_POST['repair_surname'];
    $repair_brand = $_POST['repair_brand'];
    $repair_phone = $_POST['repair_phone'];
    $repair_address = $_POST['repair_address'];
    $details = $_POST['details'];
    $repair_price = $_POST['repair_price'];
    $emp_id = $_POST['employee_id'];
    $repair_status = $_POST['repair_status'];
    $payment_status = $_POST['payment_status'];
    $query = "INSERT INTO repair(repair_date,repair_name,repair_surname,repair_brand,repair_phone,repair_address,details,repair_price,employee_id,repair_status,payment_status) VALUES (:repair_date,:repair_name,:repair_surname,:repair_brand,:repair_phone,:repair_address,:details,:repair_price,:employee_id,:repair_status,:payment_status)";
    $query_run = $conn->prepare($query);
    $data = [
        ':repair_date' => $repair_date,
        ':repair_name' => $repair_name,
        ':repair_surname' => $repair_surname,
        ':repair_brand' => $repair_brand,
        ':repair_phone' => $repair_phone,
        ':repair_address' => $repair_address,
        ':details' => $details,
        ':repair_price' => $repair_price,
        ':employee_id' => $emp_id,
        ':repair_status' => $repair_status,
        ':payment_status' => $payment_status
    ];
    $query_execute = $query_run->execute($data);
    if ($query_execute) {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'success',
                text: 'เพิ่มรายการแจ้งซ่อมสำเร็จ',
                icon: 'success',
                timer : 1500,
                showConfirmButton: false
            });
        });
    </script>";
        header('refresh:1; url = repair.php');
        exit(0);
    } else {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'warning',
                text: 'เพิ่มรายการแจ้งซ่อมไม่สำเร็จ',
                icon: 'warning',
                timer : 1500,
                showConfirmButton: false
            });
        });
        </script>";
        header('refresh:1; url = repair.php');
        exit(0);
    }
}
if (isset($_POST['update_repair'])) {
    $repair_id = $_POST['repair_id'];
    $repair_name = $_POST['repair_name'];
    $repair_surname = $_POST['repair_surname'];
    $details = $_POST['details'];
    $emp_id = $_POST['employee_id'];
    $repair_price = $_POST['repair_price'];
    $repair_status = $_POST['repair_status'];
    try {
        $query = "UPDATE repair SET repair_name = :repair_name,repair_surname = :repair_surname,details = :details,employee_id = :employee_id,repair_price = :repair_price,repair_status = :repair_status WHERE repair_id = :repair_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':repair_name' => $repair_name,
            ':repair_surname' => $repair_surname,
            ':details' => $details,
            ':employee_id' => $emp_id,
            ':repair_price' => $repair_price,
            ':repair_status' => $repair_status,
            ':repair_id' => $repair_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            echo "<script>
            $(document).ready(function(){
                Swal.fire({
                    title: 'success',
                    text: 'แก้ไขข้อมูลสำเร็จ',
                    icon: 'success',
                    timer : 1000,
                    showConfirmButton: false
                });
            });
        </script>";
            header('refresh:1; url = repair.php');
            exit(0);
        } else {
            echo "<script>
            $(document).ready(function(){
                Swal.fire({
                    title: 'warning',
                    text: 'แก้ไขข้อมูลไม่สำเร็จ',
                    icon: 'warning',
                    timer : 1500,
                    showConfirmButton: false
                });
            });
            </script>";
            header('refresh:1; url = repair.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>