<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<?php
require '../config/connect.php';
if (isset($_POST['updatepro_cus'])) {
    $customer_id = $_POST['customer_id'];
    $name_ct = $_POST['name_ct'];
    $surname_ct = $_POST['surname_ct'];
    $username_ct = $_POST['username_ct'];
    $password_ct = $_POST['password_ct'];
    $phone_ct = $_POST['phone_ct'];
    $email_ct = $_POST['email_ct'];
    $address_ct = $_POST['address_ct'];
    try {
        $query = "UPDATE customer SET name_ct = :name_ct, surname_ct = :surname_ct, username_ct = :username_ct, password_ct = :password_ct, phone_ct = :phone_ct, email_ct = :email_ct, address_ct = :address_ct WHERE customer_id = :customer_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':name_ct' => $name_ct,
            ':surname_ct' => $surname_ct,
            ':username_ct' => $username_ct,
            ':password_ct' => $password_ct,
            ':phone_ct' => $phone_ct,
            ':email_ct' => $email_ct,
            ':address_ct' => $address_ct,
            ':customer_id' => $customer_id
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
            header('refresh:1; url = profile_cus.php');
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
            header('refresh:1; url = profile_cus.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
