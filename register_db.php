<script src="js/jquery-3.5.1.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<?php
require 'config/connect.php';
if (isset($_POST['Regis'])) {
    $name_ct = $_POST['name_ct'];
    $surname_ct = $_POST['surname_ct'];
    $username_ct = $_POST['username_ct'];
    $password_ct = $_POST['password_ct'];
    $phone_ct = $_POST['phone_ct'];
    $email_ct = $_POST['email_ct'];
    $address_ct = $_POST['address_ct'];

    if (empty($name_ct) || empty($surname_ct) || empty($username_ct) || empty($password_ct) || empty($phone_ct) || empty($email_ct) || empty($address_ct)) {
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
        header('refresh:1; url = Register.php');
        exit(0);
    } else {
        $select_stmt = $conn->prepare("SELECT COUNT(username_ct) AS count_user FROM customer WHERE username_ct = :username_ct");
        $select_stmt->bindParam(':username_ct', $username_ct);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        if ($row['count_user'] != 0) {
            echo "<script>
                $(document).ready(function(){
                    Swal.fire({
                        title: 'warning',
                        text: 'ชื่อผู้ใช้นี้มีผู้ใช้แล้ว',
                        icon: 'warning',
                        timer : 1500,
                        showConfirmButton: false
                    });
                });
                </script>";
            header('refresh:1; url = Register.php');
            exit(0);
        } else {
            $add_stmt = $conn->prepare("INSERT INTO customer (name_ct, surname_ct, username_ct, password_ct, phone_ct, email_ct, address_ct) VALUES (:name_ct, :surname_ct, :username_ct, :password_ct, :phone_ct, :email_ct, :address_ct)");
            $add_stmt->bindParam(':name_ct', $name_ct);
            $add_stmt->bindParam(':surname_ct', $surname_ct);
            $add_stmt->bindParam(':username_ct', $username_ct);
            $add_stmt->bindParam(':password_ct', $password_ct);
            $add_stmt->bindParam(':phone_ct', $phone_ct);
            $add_stmt->bindParam(':email_ct', $email_ct);
            $add_stmt->bindParam(':address_ct', $address_ct);
            $add_stmt->execute();

            if ($add_stmt) {
                echo "<script>
                $(document).ready(function(){
                    Swal.fire({
                        title: 'success',
                        text: 'สมัครสมาชิกสำเร็จ',
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
                        text: 'มีบางอย่างผิดพลาด',
                        icon: 'warning',
                        timer : 1500,
                        showConfirmButton: false
                    });
                });
                </script>";
                header('refresh:1; url = Register.php');
                exit(0);
            }
        }
    }
}
