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
    <title>แก้ไขข้อมูลลูกค้า</title>
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
                        <a href="Dashboard.php" class="nav-link px-3 mt-3 my-3">
                            <span class="me-2"><i class="fa-solid fa-table-columns"></i></span>
                            <span>หน้าหลัก</span>
                        </a>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold px-3 mb-3">
                            ข้อมูลผู้ใช้ระบบ
                        </div>
                    </li>
                    <li>
                        <a href="employee.php" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-user-tie"></i></span>
                            <span>ข้อมูลพนักงาน</span>
                        </a>
                    </li>
                    <li>
                        <a href="customer.php" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-user"></i></span>
                            <span>ข้อมูลลูกค้า</span>
                        </a>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold px-3 mb-3 my-3">
                            ข้อมูลพื้นฐาน
                        </div>
                    </li>
                    <li>
                        <a href="spares.php" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-car-rear"></i></span>
                            <span>ข้อมูลอะไหล่</span>
                        </a>
                    </li>
                    <li>
                        <a href="model.php" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-car-side"></i></span>
                            <span>ข้อมูลประเภทฝาสูบ</span>
                        </a>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold px-3 mb-3 my-3">
                            ข้อมูลการสั่งซื้อ
                        </div>
                    </li>
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
                            <span class="me-2"><i class="fa-solid fa-cart-shopping"></i></span>
                            <span>สั่งซื้ออะไหล่</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="fa-solid fa-sort-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="layouts">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="fa-solid fa-cart-plus"></i></span>
                                        <span>รายการที่ทำการสั่งซื้อ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="fa-solid fa-cart-arrow-down"></i></span>
                                        <span>รายการที่ทำการรับเข้าแล้ว</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold px-3 mb-3 my-3">
                            รายงาน
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-flag"></i></span>
                            <span>รายงานการสั่งซื้ออะไหล่</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-flag"></i></span>
                            <span>รายงานการรับเข้าอะไหล่</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
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
                        <li class="breadcrumb-item">ข้อมูลพื้นฐาน</li>
                        <li class="breadcrumb-item">ข้อมูลลูกค้า</li>
                        <li class="breadcrumb-item active text-primary">แสดงข้อมูลลูกค้า</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light">แสดงข้อมูลลูกค้า</span>
                        </div>
                        <div class="card-body">
                            <?php
                            require '../config/connect.php';
                            if (isset($_GET['customer_id'])) {
                                $customer_id = $_GET['customer_id'];
                                $query = "SELECT * FROM customer WHERE customer_id =:customer_id";
                                $stmt = $conn->prepare($query);
                                $data = [':customer_id' => $customer_id];
                                $stmt->execute($data);
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            }
                            ?>
                            <span style="font-weight: 700; font-size:large">รหัสลูกค้า</span> : <span style="font-size:large;"><?php echo $result['customer_id']; ?></span><br>
                            <span style="font-weight: 700; font-size:large">ชื่อ</span> : <span style="font-size:large;"><?php echo $result['name_ct']; ?></span><br>
                            <span style="font-weight: 700; font-size:large">นามสกุล</span> : <span style="font-size:large;"><?php echo $result['surname_ct']; ?></span><br>
                            <span style="font-weight: 700; font-size:large">ชื่อผู้ใช้</span> : <span style="font-size:large;"><?php echo $result['username_ct']; ?></span><br>
                            <span style="font-weight: 700; font-size:large">รหัสผ่าน</span> : <span style="font-size:large;"><?php echo $result['password_ct']; ?></span><br>
                            <span style="font-weight: 700; font-size:large">เบอร์โทรศัพท์</span> : <span style="font-size:large;"><?php echo $result['phone_ct']; ?></span><br>
                            <span style="font-weight: 700; font-size:large">อีเมล</span> : <span style="font-size:large;"><?php echo $result['email_ct']; ?></span><br>
                            <span style="font-weight: 700; font-size:large">ที่อยู่</span> : <span style="font-size:large;"><?php echo $result['address_ct']; ?></span><br>
                            <div class="mb-3 mt-2">
                                <a href="customer.php" class="btn btn-danger btn-sm"><i class="fa-solid fa-caret-left"></i> ย้อนกลับ</a>
                            </div>
                            <!-- <form action="crud.php" method="POST" class="row g-3">
                                <input type="hidden" name="customer_id" value="<?= $result['customer_id'] ?>">
                                <div class="col-md-6">
                                    <label class="form-label">ชื่อ :</label>
                                    <input type="text" name="name_ct" value="<?= $result['name_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">นามสกุล :</label>
                                    <input type="text" name="surname_ct" value="<?= $result['surname_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ชื่อผู้ใช้ :</label>
                                    <input type="text" name="username_ct" value="<?= $result['username_ct'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">รหัสผ่าน :</label>
                                    <input type="password" name="password_ct" id="myPassword" value="<?= $result['password_ct'] ?>" class="form-control" />
                                    <input type="checkbox" onclick="passShow()">
                                    <label>แสดงรหัสผ่าน</label>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">เบอร์โทรศัพท์:</label>
                                    <input type="text" name="phone_ct" value="<?= $result['phone_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">อีเมล:</label>
                                    <input type="email" name="email_ct" value="<?= $result['email_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">ที่อยู่:</label>
                                    <input type="text" name="address_ct" value="<?= $result['address_ct'] ?>" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <a href="customer.php" class="btn btn-danger">ย้อนกลับ</a>
                                </div>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
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