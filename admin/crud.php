<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<?php
require '../config/connect.php';

// ---เพิ่ม ลบ แก้ไข ลูกค้า---//
if (isset($_POST['add_cus'])) {
    $name_ct = $_POST['name_ct'];
    $surname_ct = $_POST['surname_ct'];
    $username_ct = $_POST['username_ct'];
    $password_ct = $_POST['password_ct'];
    $phone_ct = $_POST['phone_ct'];
    $email_ct = $_POST['email_ct'];
    $address_ct = $_POST['address_ct'];
    $query = "INSERT INTO customer(name_ct,surname_ct,username_ct,password_ct,phone_ct,email_ct,address_ct) VALUES (:name_ct,:surname_ct,:username_ct,:password_ct,:phone_ct,:email_ct,:address_ct)";
    $query_run = $conn->prepare($query);
    $data = [
        ':name_ct' => $name_ct,
        ':surname_ct' => $surname_ct,
        ':username_ct' => $username_ct,
        ':password_ct' => $password_ct,
        ':phone_ct' => $phone_ct,
        ':email_ct' => $email_ct,
        ':address_ct' => $address_ct
    ];
    $query_execute = $query_run->execute($data);
    if ($query_execute) {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'success',
                text: 'เพิ่มข้อมูลสำเร็จ',
                icon: 'success',
                timer : 1500,
                showConfirmButton: false
            });
        });
    </script>";
        header('refresh:1; url = customer.php');
        exit(0);
    } else {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'warning',
                text: 'เพิ่มข้อมูลไม่สำเร็จ',
                icon: 'warning',
                timer : 1500,
                showConfirmButton: false
            });
        });
        </script>";
        header('refresh:1; url = customer.php');
        exit(0);
    }
}
if (isset($_POST['update_cus'])) {
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
            header('refresh:1; url = customer.php');
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
            header('refresh:1; url = customer.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
if (isset($_POST['delete_cus'])) {
    $customer_id = $_POST['delete_cus'];
    try {
        $query = "DELETE FROM customer WHERE customer_id = :customer_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':customer_id' => $customer_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            echo "<script>
            $(document).ready(function(){
                Swal.fire({
                    title: 'success',
                    text: 'ลบข้อมูลสำเร็จ',
                    icon: 'success',
                    timer : 1500,
                    showConfirmButton: false
                });
            });
        </script>";
            header('refresh:1; url = customer.php');
            exit(0);
        } else {
            echo "<script>
            $(document).ready(function(){
                Swal.fire({
                    title: 'warning',
                    text: 'ลบข้อมูลไม่สำเร็จ',
                    icon: 'warning',
                    timer : 1500,
                    showConfirmButton: false
                });
            });
            </script>";
            header('refresh:1; url = customer.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// ---เพิ่ม ลบ แก้ไข ลูกค้า---//

// ---เพิ่ม ลบ แก้ไข รุ่นฝาสูบ---//
if (isset($_POST['add_model'])) {
    $model_name = $_POST['model_name'];
    $query = "INSERT INTO model(model_name) VALUES (:model_name)";
    $query_run = $conn->prepare($query);
    $data = [
        ':model_name' => $model_name
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        echo "<script>
            $(document).ready(function(){
                Swal.fire({
                    title: 'success',
                    text: 'เพิ่มข้อมูลสำเร็จ',
                    icon: 'success',
                    timer : 1500,
                    showConfirmButton: false
                });
            });
        </script>";
        header('refresh:1; url = model.php');
        exit(0);
    } else {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'warning',
                text: 'เพิ่มข้อมูลไม่สำเร็จ',
                icon: 'warning',
                timer : 1500,
                showConfirmButton: false
            });
        });
        </script>";
        header('refresh:1; url = model.php');
        exit(0);
    }
}

if (isset($_POST['update_model'])) {
    $model_id = $_POST['model_id'];
    $model_name = $_POST['model_name'];
    try {
        $query = "UPDATE model SET model_name = :model_name WHERE model_id = :model_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':model_name' => $model_name,
            ':model_id' => $model_id

        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            echo "<script>
            $(document).ready(function(){
                Swal.fire({
                    title: 'success',
                    text: 'แก้ไขข้อมูลสำเร็จ',
                    icon: 'success',
                    timer : 1500,
                    showConfirmButton: false
                });
            });
        </script>";
            header('refresh:1; url = model.php');
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
            header('refresh:1; url = model.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_model'])) {
    $model_id = $_POST['delete_model'];
    try {
        $query = "DELETE FROM model WHERE model_id = :model_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':model_id' => $model_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            echo "<script>
            $(document).ready(function(){
                Swal.fire({
                    title: 'success',
                    text: 'ลบข้อมูลสำเร็จ',
                    icon: 'success',
                    timer : 1500,
                    showConfirmButton: false
                });
            });
        </script>";
            header('refresh:1; url = model.php');
            exit(0);
        } else {
            echo "<script>
            $(document).ready(function(){
                Swal.fire({
                    title: 'warning',
                    text: 'ลบข้อมูลไม่สำเร็จ',
                    icon: 'warning',
                    timer : 1500,
                    showConfirmButton: false
                });
            });
            </script>";
            header('refresh:1; url = model.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// ---เพิ่ม ลบ แก้ไข รุ่นฝาสูบ---//

// ---เพิ่ม ลบ แก้ไข อะไหล่---//
if (isset($_POST['add_spare'])) {
    $spare_name = $_POST['spare_name'];
    $model_id = $_POST['model_id'];
    $spare_quanlity = $_POST['spare_quanlity'];
    $spare_price = $_POST['spare_price'];

    $query = "INSERT INTO spare (spare_name,model_id,spare_quanlity,spare_price) VALUES(:spare_name,:model_id,:spare_quanlity,:spare_price)";
    $query_run = $conn->prepare($query);

    $data = [
        ':spare_name' => $spare_name,
        ':model_id' => $model_id,
        ':spare_quanlity' => $spare_quanlity,
        ':spare_price' => $spare_price
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'success',
                text: 'เพิ่มข้อมูลสำเร็จ',
                icon: 'success',
                timer : 1500,
                showConfirmButton: false
            });
        });
        </script>";
        header('refresh:1; url = spares.php');
        exit(0);
    } else {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'warning',
                text: 'เพิ่มข้อมูลไม่สำเร็จ',
                icon: 'warning',
                timer : 1500,
                showConfirmButton: false
            });
        });
        </script>";
        header('refresh:1; url = spares.php');
        exit(0);
    }
}

if (isset($_POST['update_spare'])) {
    $spare_id = $_POST['spare_id'];
    $spare_name = $_POST['spare_name'];
    $model_id = $_POST['model_id'];
    $spare_quanlity = $_POST['spare_quanlity'];
    $spare_price = $_POST['spare_price'];

    $query = "UPDATE spare SET spare_name = :spare_name, model_id = :model_id, spare_quanlity = :spare_quanlity, spare_price = :spare_price WHERE spare_id = :spare_id";
    $query_run = $conn->prepare($query);

    $data = [
        ':spare_name' => $spare_name,
        ':model_id' => $model_id,
        ':spare_quanlity' => $spare_quanlity,
        ':spare_price' => $spare_price,
        ':spare_id' => $spare_id
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        echo "<script>
        $(document).ready(function(){
            Swal.fire({
                title: 'success',
                text: 'แก้ไขข้อมูลสำเร็จ',
                icon: 'success',
                timer : 1500,
                showConfirmButton: false
            });
        });
        </script>";
        header('refresh:1; url = spares.php');
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
        header('refresh:1; url = spares.php');
        exit(0);
    }
}

if (isset($_POST['delete_spare'])) {
    $spare_id = $_POST['delete_spare'];
    try {
        $query = "DELETE FROM spare WHERE spare_id = :spare_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':spare_id' => $spare_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            echo "<script>
            $(document).ready(function(){
                Swal.fire({
                    title: 'success',
                    text: 'ลบข้อมูลสำเร็จ',
                    icon: 'success',
                    timer : 1500,
                    showConfirmButton: false
                });
            });
        </script>";
            header('refresh:1; url = spares.php');
            exit(0);
        } else {
            echo "<script>
            $(document).ready(function(){
                Swal.fire({
                    title: 'warning',
                    text: 'ลบข้อมูลไม่สำเร็จ',
                    icon: 'warning',
                    timer : 1500,
                    showConfirmButton: false
                });
            });
            </script>";
            header('refresh:1; url = spare.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// ---เพิ่ม ลบ แก้ไข อะไหล่---//
