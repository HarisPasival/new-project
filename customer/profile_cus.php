<?php
session_start();
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 fw-bold" href="#">Khawna Phasoob</a>
        </div>
    </nav>
    <!-- navbar -->
    <!-- sidebar -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li class="mt-3">
                        <div class="text-muted small fw-bold px-3">
                            แดชบอร์ด
                        </div>
                    </li>
                    <li>
                        <a href="Home_Customer.php" class="nav-link px-3 mt-3 my-3">
                            <span class="me-2"><i class="fa-solid fa-table-columns"></i></span>
                            <span>หน้าหลัก</span>
                        </a>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold px-3 mb-3">
                            การซ่อม
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-signal"></i></span>
                            <span>ติดตามสถานะการซ่อม</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-calendar-week"></i></span>
                            <span>ดูรายละเอียดการซ่อม</span>
                        </a>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold px-3 mb-3 my-3">
                            ชำระเงิน
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="fa-regular fa-credit-card"></i></span>
                            <span>รายการชำระเงิน</span>
                        </a>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold px-3 mb-3 my-3">
                            โปรไฟล์
                        </div>
                    </li>
                    <li>
                        <a href="profile_cus.php" class="nav-link active px-3">
                            <span class="me-2"><i class="fa-solid fa-user-pen"></i></span>
                            <span>แก้ไขข้อมูลส่วนตัว</span>
                        </a>
                    </li>
                    <li>
                        <a href="../Logout.php" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-right-from-bracket" style="color: red;"></i></span>
                            <span>ออกจากระบบ</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
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
                                <div class="col-md-6">
                                    <label class="form-label">ชื่อ :</label>
                                    <input type="text" name="name_ct" value="<?= $row['name_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">นามสกุล :</label>
                                    <input type="text" name="surname_ct" value="<?= $row['surname_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ชื่อผู้ใช้ :</label>
                                    <input type="text" name="username_ct" value="<?= $row['username_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">รหัสผ่าน :</label>
                                    <input type="password" name="password_ct" id="myPassword" value="<?= $row['password_ct'] ?>" class="form-control" />
                                    <input type="checkbox" onclick="passShow()">
                                    <label>แสดงรหัสผ่าน</label>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">เบอร์โทรศัพท์:</label>
                                    <input type="text" name="phone_ct" value="<?= $row['phone_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">อีเมล:</label>
                                    <input type="email" name="email_ct" value="<?= $row['email_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">ที่อยู่:</label>
                                    <input type="text" name="address_ct" value="<?= $row['address_ct'] ?>" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="updatepro_cus" class="btn btn-warning">แก้ไขข้อมูล</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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