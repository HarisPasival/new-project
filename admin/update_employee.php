<?php
session_start();
if (!isset($_SESSION['Admin_login'])) {
    header('location: ../Login-emp.php');
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
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/form.css" />
    <title>แก้ไขข้อมูลพนักงาน</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <?php include '../navbarsideter/navbar.php' ?>
    <!-- navbar -->
    <!-- sidebar -->
    <?php include '../navbarsideter/sidebar.php' ?>
    <!-- sidebar -->
    <!-- content -->
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">ข้อมูลพื้นฐาน</li>
                        <li class="breadcrumb-item">ข้อมูลพนักงาน</li>
                        <li class="breadcrumb-item active text-primary">แก้ไขข้อมูลพนักงาน</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light">แก้ไขข้อมูลพนักงาน</span>
                        </div>
                        <div class="card-body">
                            <?php
                            require '../config/connect.php';
                            if (isset($_GET['employee_id'])) {
                                $employee_id = $_GET['employee_id'];
                                $query = "SELECT * FROM employee WHERE employee_id =:employee_id";
                                $stmt = $conn->prepare($query);
                                $data = [':employee_id' => $employee_id];
                                $stmt->execute($data);
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            }
                            ?>
                            <form action="crud.php" method="POST" class="row g-3">
                                <input type="hidden" name="employee_id" value="<?= $result['employee_id'] ?>">
                                <div class="form-floating  col-md-2 mb-3">
                                    <select class="form-select" name="title_emp" id="floatingSelect" aria-label="Floating label select example">
                                        <option selected>เลือก</option>
                                        <option value="1" <?php if ($result['title_emp'] == '1') { ?> selected="selected" <?php } ?>>นาย</option>
                                        <option value="2" <?php if ($result['title_emp'] == '2') { ?> selected="selected" <?php } ?>>นาง</option>
                                        <option value="3" <?php if ($result['title_emp'] == '3') { ?> selected="selected" <?php } ?>>นางสาว</option>
                                    </select>
                                    <label for="floatingSelect">คำนำหน้า</label>
                                </div>
                                <div class="form-floating col-md-5 mb-3">
                                    <input type="text" name="name_emp" class="form-control" value="<?= $result['name_emp'] ?>" id="floatingInput" placeholder="name_emp">
                                    <label for="floatingInput">ชื่อ</label>
                                </div>
                                <div class="form-floating col-md-5 mb-3">
                                    <input type="text" name="surname_emp" class="form-control" value="<?= $result['surname_emp'] ?>" id="floatingInput" placeholder="surname_emp">
                                    <label for="floatingInput">นามสกุล</label>
                                </div>
                                <div class="form-floating col-md-5 mb-3">
                                    <input type="text" name="username_emp" class="form-control" value="<?= $result['username_emp'] ?>" id="floatingInput" placeholder="username_emp" readonly>
                                    <label for="floatingInput">ชื่อผู้ใช้</label>
                                </div>
                                <div class="form-floating col-md-5 mb-3">
                                    <input type="password" name="password_emp" id="myPassword" value="<?= $result['password_emp'] ?>" class="form-control" id="floatingInput" placeholder="password_emp">
                                    <label for="floatingInput">รหัสผ่าน</label>
                                </div>
                                <div class="form-floating  col-md-2 mb-3">
                                    <select class="form-select" name="u_role" id="floatingSelect" aria-label="Floating label select example">
                                        <option selected>เลือกสิทธิ์</option>
                                        <option value="1" <?php if ($result['u_role'] == '1') { ?> selected="selected" <?php } ?>>แอดมิน</option>
                                        <option value="2" <?php if ($result['u_role'] == '2') { ?> selected="selected" <?php } ?>>ช่างซ่อม</option>
                                    </select>
                                    <label for="floatingSelect">สิทธิ์การใช้งาน</label>
                                </div>
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="text" name="phone_emp" maxlength="10" value="<?= $result['phone_emp'] ?>" class="form-control" id="floatingInput" placeholder="phone_emp">
                                    <label for="floatingInput">เบอร์โทรศัพท์</label>
                                </div>
                                <div class="form-floating col-md-8 mb-3">
                                    <input type="email" name="email_emp" class="form-control" value="<?= $result['email_emp'] ?>" id="floatingInput" placeholder="email_emp">
                                    <label for="floatingInput">อีเมล</label>
                                </div>
                                <div class="form-floating col-12 mb-3">
                                    <input type="text" name="address_emp" class="form-control" value="<?= $result['address_emp'] ?>" id="floatingInput" placeholder="address_emp">
                                    <label for="floatingInput">ที่อยู่</label>
                                </div>
                                <div class="form-floating col-12 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" onclick="passShow()">
                                        <label>แสดงรหัสผ่าน</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_emp" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i> แก้ไขข้อมูล</button>
                                    <a href="employee.php" class="btn btn-outline-danger"><i class="fa-solid fa-caret-left"></i> ยกเลิก</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../navbarsideter/footer.php' ?>
    </main>
    <!-- end content -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/sheet.js"></script>
</body>

</html>