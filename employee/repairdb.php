<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<?php
require '../config/connect.php';
if (isset($_POST['add_repair'])) {
    $repair_cname = $_POST['repair_cname'];
    $repair_date = $_POST['repair_date'];
    $details = $_POST['details'];
    $employee_id = $_POST['employee_id'];
    $repair_price = $_POST['repair_price'];
    $repair_status = $_POST['repair_status'];
    $query = "INSERT INTO repair(repair_cname,repair_date,details,employee_id,repair_price,repair_status) VALUES (:repair_cname,:repair_date,:details,:employee_id,:repair_price,:repair_status)";
    $query_run = $conn->prepare($query);
    $data = [
        ':repair_cname' => $repair_cname,
        ':repair_date' => $repair_date,
        ':details' => $details,
        ':employee_id' => $employee_id,
        ':repair_price' => $repair_price,
        ':repair_status' => $repair_status
    ];
    $query_execute = $query_run->execute($data);
    if ($query_execute) {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'success',
                text: 'เพิ่มรายการสำเร็จ',
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
                text: 'เพิ่มรายการไม่สำเร็จ',
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
    $repair_cname = $_POST['repair_cname'];
    $repair_date = $_POST['repair_date'];
    $details = $_POST['details'];
    $employee_id = $_POST['employee_id'];
    $repair_price = $_POST['repair_price'];
    $repair_status = $_POST['repair_status'];
    $repair_date_send = $_POST['repair_date_send'];
    try {
        $query = "UPDATE repair SET repair_cname = :repair_cname,repair_date = :repair_date,details = :details,employee_id = :employee_id,repair_price = :repair_price,repair_status = :repair_status,repair_date_send = :repair_date_send WHERE repair_id = :repair_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':repair_cname' => $repair_cname,
            ':repair_date' => $repair_date,
            ':details' => $details,
            ':employee_id' => $employee_id,
            ':repair_price' => $repair_price,
            ':repair_status' => $repair_status,
            ':repair_date_send' => $repair_date_send,
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