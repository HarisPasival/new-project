<script src="js/jquery-3.5.1.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<?php
session_start();
require 'config/connect.php';
if (isset($_POST['login_emp'])) {
    $username_emp = $_POST['username_emp'];
    $password_emp = $_POST['password_emp'];
}
if (empty('username_emp') || empty('password_emp')) {
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
        $check_user = $conn->prepare("SELECT * FROM employee WHERE username_emp = :username_emp");
        $check_user->bindParam("username_emp", $username_emp);
        $check_user->execute();
        $row = $check_user->fetch(PDO::FETCH_ASSOC);
        if ($check_user->rowCount() > 0) {
            if ($username_emp == $row['username_emp']) {
                if ($password_emp == $row['password_emp']) {
                    if ($row['u_role'] == 1) {
                        $_SESSION['Admin_login'] = $row['employee_id'];
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
                        header('refresh:1; url = admin/Dashboard.php');
                        exit(0);
                    } else if ($row['u_role'] == 2) {
                        $_SESSION['Emp_login'] = $row['employee_id'];                       
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
                        header('refresh:1; url = employee/Home_Employee.php');
                        exit(0);
                    }
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
                    header('refresh:1; url = Login-emp.php');
                    exit(0);
                }
            } else if ($username_emp != $row['username_emp']) {
                echo "<script>
                $(document).ready(function(){
                    Swal.fire({
                        title: 'warning',
                        text: 'ชื่อผู้ใช้ไม่ถูกต้อง',
                        icon: 'warning',
                        timer : 1500,
                        showConfirmButton: false
                    });
                });
                </script>";
                header('refresh:1; url = Login-emp.php');
                exit(0);
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
            header('refresh:1; url = Login-emp.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>