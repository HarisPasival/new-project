<?php
session_start();
if (!isset($_SESSION['login_cus'])) {
    header('location: ../Login-cus.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/79a0376aeb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/form.css">
    <title>หน้าหลักลูกค้า</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <?php include '../navcus/navbar.php' ?>
    <!-- navbar -->
    <!-- sidebar -->
    <?php include '../navcus/sidebar.php' ?>
    <!-- sidebar -->
    <!-- content -->
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">ข้อมูลลูกค้า</li>
                        <li class="breadcrumb-item active text-primary">แก้ไขข้อมูลส่วนตัว</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light">แก้ไขข้อมูลส่วนตัว</span>
                        </div>
                        <div class="card-body">
                            <?php
                            require '../config/connect.php';
                            if (isset($_SESSION['login_cus'])) {
                                $customer_id = $_SESSION['login_cus'];
                                $query = "SELECT * FROM customer WHERE customer_id =:customer_id";
                                $stmt = $conn->prepare($query);
                                $data = [':customer_id' => $customer_id];
                                $stmt->execute($data);
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            }
                            ?>
                            <form action="procusdb.php" method="POST" class="row g-3">
                                <input type="hidden" name="customer_id" value="<?= $row['customer_id'] ?>">
                                <div class="form-floating  col-md-2 mb-3">
                                    <select class="form-select" name="title_ct" id="floatingSelect" aria-label="Floating label select example">
                                        <option selected>เลือก</option>
                                        <option value="1" <?php if ($row['title_ct'] == '1') { ?> selected="selected" <?php } ?>>นาย</option>
                                        <option value="2" <?php if ($row['title_ct'] == '2') { ?> selected="selected" <?php } ?>>นาง</option>
                                        <option value="3" <?php if ($row['title_ct'] == '3') { ?> selected="selected" <?php } ?>>นางสาว</option>
                                    </select>
                                    <label for="floatingSelect">คำนำหน้า</label>
                                </div>
                                <div class="form-floating col-md-5 mb-3">
                                    <input type="text" name="name_ct" value="<?= $row['name_ct'] ?>" class="form-control" id="floatingInput" placeholder="name_ct">
                                    <label for="floatingInput">ชื่อ</label>
                                </div>
                                <div class="form-floating col-md-5 mb-3">
                                    <input type="text" name="surname_ct" value="<?= $row['surname_ct'] ?>" class="form-control" id="floatingInput" placeholder="surname_ct">
                                    <label for="floatingInput">นามสกุล</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="username_ct" value="<?= $row['username_ct'] ?>" class="form-control" id="floatingInput" placeholder="username_ct" readonly>
                                    <label for="floatingInput">ชื่อผู้ใช้</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="password" name="password_ct" value="<?= $row['password_ct'] ?>" id="myPassword" class="form-control" id="floatingInput" placeholder="password_ct">
                                    <label for="floatingInput">รหัสผ่าน</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="phone_ct" value="<?= $row['phone_ct'] ?>" maxlength="10" class="form-control" id="floatingInput" placeholder="phone_ct">
                                    <label for="floatingInput">เบอร์โทรศัพท์</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="email" name="email_ct" value="<?= $row['email_ct'] ?>" class="form-control" id="floatingInput" placeholder="email_ct">
                                    <label for="floatingInput">อีเมล</label>
                                </div>
                                <div class="form-floating col-12 mb-3">
                                    <input type="text" name="address_ct" value="<?= $row['address_ct'] ?>" class="form-control" id="floatingInput" placeholder="address_ct">
                                    <label for="floatingInput">ที่อยู่</label>
                                </div>
                                <div class="form-floating col-12 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" onclick="passShow()">
                                        <label>แสดงรหัสผ่าน</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="updatepro_cus" class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i>แก้ไขข้อมูล</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../navcus/footer.php' ?>
    </main>
    <!-- content -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/sheet.js"></script>
</body>

</html>