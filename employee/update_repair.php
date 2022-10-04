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
    <title>แก้ไขรายการซ่อม</title>
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
                        <a href="Home_Employee.php" class="nav-link px-3 mt-3 my-3">
                            <span class="me-2"><i class="fa-solid fa-table-columns"></i></span>
                            <span>หน้าหลัก</span>
                        </a>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold px-3 mb-3">
                            จัดการรับซ่อม
                        </div>
                    </li>
                    <li>
                        <a href="add_repair.php" class="nav-link active px-3">
                            <span class="me-2"><i class="fa-solid fa-screwdriver-wrench"></i></span>
                            <span>เพิ่มรายการซ่อม</span>
                        </a>
                    </li>
                    <li>
                        <a href="repair.php" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-toolbox"></i></span>
                            <span>รายการซ่อมทั้งหมด</span>
                        </a>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold px-3 mb-3 my-3">
                            ข้อมูลรายการส่งมอบ
                        </div>
                    </li>
                    <li>
                        <a href="return_repair.php" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-rotate-left"></i></span>
                            <span>รายการที่ส่งมอบแล้ว</span>
                        </a>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold px-3 mb-3 my-3">
                            โปรไฟล์
                        </div>
                    </li>
                    <li>
                        <a href="profile_emp.php" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-user-pen"></i></span>
                            <span>แก้ไขข้อมูลส่วนตัว</span>
                        </a>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold px-3 mb-3 my-3">
                            รายงาน
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-flag"></i></span>
                            <span>รายงานการรับซ่อม</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-flag"></i></span>
                            <span>รายงานการส่งมอบฝาสูบ</span>
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
                        <li class="breadcrumb-item">จัดการรับซ่อม</li>
                        <li class="breadcrumb-item active text-primary">แก้ไขรายการซ่อม</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light">แก้ไขรายการซ่อม</span>
                        </div>
                        <div class="card-body">
                            <?php
                            require '../config/connect.php';
                            if (isset($_GET['repair_id'])) {
                                $repair_id = $_GET['repair_id'];
                                $query = "SELECT * FROM repair WHERE repair_id =:repair_id";
                                $stmt = $conn->prepare($query);
                                $data = [':repair_id' => $repair_id];
                                $stmt->execute($data);
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            }
                            ?>
                            <form action="repairdb.php" method="POST" class="row g-3">
                                <input type="hidden" name="repair_id" value="<?= $result['repair_id'] ?>">
                                <div class="col-md-4">
                                    <label class="form-label">วันที่แจ้งซ่อม :</label>
                                    <input type="datetime-local" name="repair_date" value="<?= $result['repair_date'] ?>" class="form-control" readonly/>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">ชื่อลูกค้าที่มาซ่อม :</label>
                                    <input type="text" name="repair_cname" value="<?= $result['repair_cname'] ?>" class="form-control" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">สาเหตุที่เสีย :</label>
                                    <input type="text" name="details" value="<?= $result['details'] ?>" class="form-control"></input>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">ราคาค่าซ่อม:</label>
                                    <input type="number" min="1" name="repair_price" value="<?= $result['repair_price'] ?>" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">สถานะการซ่อม :</label>
                                    <select name="repair_status" class="form-control">
                                        <option value="1" <?php if ($result['repair_status'] == 1) { ?> selected="selected" <?php } ?>>รอยืนยันการซ่อม</option>
                                        <option value="2" <?php if ($result['repair_status'] == 2) { ?> selected="selected" <?php } ?>>ยืนยันแล้ว</option>
                                        <option value="3" <?php if ($result['repair_status'] == 3) { ?> selected="selected" <?php } ?>>กำลังซ่อม</option>
                                        <option value="4" <?php if ($result['repair_status'] == 4) { ?> selected="selected" <?php } ?>>ซ่อมเสร็จแล้ว</option>
                                        <option value="5" <?php if ($result['repair_status'] == 5) { ?> selected="selected" <?php } ?>>ส่งมอบเรียบร้อย</option>
                                        <option value="6" <?php if ($result['repair_status'] == 6) { ?> selected="selected" <?php } ?>>ยกเลิก</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">วันที่ส่งมอบ :</label>
                                    <input type="datetime-local" name="repair_date_send" value="<?= $result['repair_date_send'] ?>" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_repair" class="btn btn-success">แก้ไขรายการซ่อม</button>
                                    <a href="repair.php" class="btn btn-danger">ย้อนกลับ</a>
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
</body>

</html>