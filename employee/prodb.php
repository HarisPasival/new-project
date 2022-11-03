<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<?php
require '../config/connect.php';
if (isset($_POST['updatepro_emp'])) {
    $employee_id = $_POST['employee_id'];
    $title_emp = $_POST['title_emp'];
    $name_emp = $_POST['name_emp'];
    $surname_emp = $_POST['surname_emp'];
    $username_emp = $_POST['username_emp'];
    $password_emp = $_POST['password_emp'];
    $phone_emp = $_POST['phone_emp'];
    $email_emp = $_POST['email_emp'];
    $address_emp = $_POST['address_emp'];
    try {
        $query = "UPDATE employee SET title_emp = :title_emp, name_emp = :name_emp,surname_emp = :surname_emp,username_emp = :username_emp,password_emp = :password_emp,phone_emp = :phone_emp,email_emp = :email_emp,address_emp = :address_emp WHERE employee_id = :employee_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':title_emp' => $title_emp,
            ':name_emp' => $name_emp,
            ':surname_emp' => $surname_emp,
            ':username_emp' => $username_emp,
            ':password_emp' => $password_emp,
            ':phone_emp' => $phone_emp,
            ':email_emp' => $email_emp,
            ':address_emp' => $address_emp,
            ':employee_id' => $employee_id
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
            header('refresh:1; url = profile_emp.php');
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
            header('refresh:1; url = profile_emp.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>