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
    <title>เพิ่มรายการซ่อม</title>
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
                        <a href="add_repair.php" class="nav-link px-3">
                            <span class="me-2"><i class="fa-solid fa-screwdriver-wrench"></i></span>
                            <span>เพิ่มรายการซ่อม</span>
                        </a>
                    </li>
                    <li>
                        <a href="repair.php" class="nav-link active px-3">
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
            <div class="row">
                <div class="col-md-12 mt-2">
                    <h4>รายการซ่อมทั้งหมด</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3 mt-2">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light"><i class="fa-solid fa-toolbox"></i> ตารางรายการซ่อมทั้งหมด</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>วันที่แจ้งซ่อม</th>
                                            <th>ชื่อลูกค้าที่มาซ่อม</th>
                                            <th>สาเหตุที่เสีย</th>
                                            <th>สถานะ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        require '../config/connect.php';
                                        $sql = "SELECT * FROM repair";
                                        $stmt = $conn->query($sql);
                                        while ($row = $stmt->fetch()) {
                                            $repair_status = $row['repair_status'];
                                        ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row['repair_date']; ?></td>
                                                <td><?= $row['repair_cname']; ?></td>
                                                <td><?= $row['details']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($repair_status == 1) {
                                                        echo "<b style = 'color:yellow' >รอยืนยันการซ่อม</b>";
                                                    } else if ($repair_status == 2) {
                                                        echo "<b style = 'color:lime' >ยืนยันแล้ว</b>";
                                                    } else if ($repair_status == 3) {
                                                        echo "<b style = 'color:Orange' >กำลังซ่อม</b>";
                                                    } else if ($repair_status == 4) {
                                                        echo "<b style = 'color:green' >ซ่อมเสร็จแล้ว</b>";
                                                    } else if ($repair_status == 5) {
                                                        echo "<b style = 'color:DodgerBlue' >ส่งมอบเรียบร้อย</b>";
                                                    } else if ($repair_status == 6) {
                                                        echo "<b style = 'color:red' >ยกเลิก</b>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <form action="repairdb.php.php" method="POST">
                                                        <a href="view_repair.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-magnifying-glass"></i></a>
                                                        <a href="update_repair.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-square-pen"></i></a>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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