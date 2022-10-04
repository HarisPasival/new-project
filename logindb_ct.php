<script src="js/jquery-3.5.1.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<?php
session_start();
require 'config/connect.php';
if (isset($_POST['login_ct'])) {
    $username_ct = $_POST['username_ct'];
    $password_ct = $_POST['password_ct'];
}
if (empty($username_ct) || empty($password_ct)) {
    echo "<script>
            $(document).ready(function(){
                Swal.fire({
                    title: 'warning',
                    text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    icon: 'warning',
                    timer : 1500,
                    showConfirmButton: false
                });
            });
            </script>";
    header('refresh:1; url = Login-cus.php');
    exit(0);
} else {
    try {
        $check_cut = $conn->prepare("SELECT * FROM customer WHERE username_ct = :username_ct");
        $check_cut->bindParam(":username_ct", $username_ct);
        $check_cut->execute();
        $row = $check_cut->fetch(PDO::FETCH_ASSOC);
        if ($check_cut->rowCount() > 0) {
            $_SESSION['login_cus'] = $row['customer_id'];
            if ($username_ct == $row['username_ct']) {
                if ($password_ct == $row['password_ct']) {
                    echo "<script>
                    $(document).ready(function(){
                        Swal.fire({
                            title: 'success',
                            text: 'เข้าสู่ระบบสำเร็จ',
                            icon: 'success',
                            timer : 1500,
                            showConfirmButton: false
                        });
                    });
                    </script>";
                    header('refresh:1; url = customer/Home_Customer.php');
                    exit(0);
                } else {
                    echo "<script>
                    $(document).ready(function(){
                        Swal.fire({
                            title: 'warning',
                            text: 'รหัสผ่านไม่ถูกต้อง',
                            icon: 'warning',
                            timer : 1500,
                            showConfirmButton: false
                        });
                    });
                    </script>";
                    header('refresh:1; url = Login-cus.php');
                    exit(0);
                }
            }
        } else {
            echo "<script>
            $(document).ready(function(){
                Swal.fire({
                    title: 'warning',
                    text: 'ไม่มีชื่อผู้ใช้นี้ในระบบ',
                    icon: 'warning',
                    timer : 1500,
                    showConfirmButton: false
                });
            });
            </script>";
            header('refresh:1; url = Login-cus.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>