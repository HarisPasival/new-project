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
    <title>หน้าหลัก</title>
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
                        <a href="Dashboard.php" class="nav-link active px-3 mt-3 my-3">
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
                                    <a href="orders.php" class="nav-link px-3">
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
            <div class="row">
                <div class="col-md-12">
                    <h4>Dashboard</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body py-5">Primary Card</div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-warning text-dark h-100">
                        <div class="card-body py-5">Warning Card</div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body py-5">Success Card</div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-danger text-white h-100">
                        <div class="card-body py-5">Danger Card</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-white"><i class="fa-solid fa-toolbox"></i> รายการซ่อมทั้งหมด</span> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover dt-responsive nowrap data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>วันที่แจ้งซ่อม</th>
                                            <th>ชื่อลูกค้าที่มาซ่อม</th>
                                            <th>สาเหตุที่เสีย</th>
                                            <th>ผู้รับซ่อม</th>
                                            <th>สถานะ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        require '../config/connect.php';
                                        $sql = "SELECT re.repair_id, re.repair_date, re.repair_name, re.repair_surname, re.details, re.repair_status, em.employee_id, em.name_emp, em.surname_emp
                                        FROM repair re
                                        left JOIN employee em ON re.employee_id = em.employee_id";
                                        $stmt = $conn->query($sql);
                                        while ($row = $stmt->fetch()) {
                                        $repair_status = $row['repair_status'];
                                        ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row['repair_date']; ?></td>
                                                <td><?= $row['repair_name'] . ' ' . $row['repair_surname']; ?></td>
                                                <td><?= $row['details']; ?></td>
                                                <td><?= $row['name_emp'] . ' ' . $row['surname_emp']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($repair_status == 1) {
                                                        echo "<b style = 'background-color: yellow;border-radius: 5px;padding: 5px;color:black' >รอยืนยันการซ่อม</b>";
                                                    } else if ($repair_status == 2) {
                                                        echo "<b style = 'background-color: lime;border-radius: 5px;padding: 5px;color:black' >ยืนยันแล้ว</b>";
                                                    } else if ($repair_status == 3) {
                                                        echo "<b style = 'background-color: Orange;border-radius: 5px;padding: 5px;color:black' >กำลังซ่อม</b>";
                                                    } else if ($repair_status == 4) {
                                                        echo "<b style = 'background-color: green;border-radius: 5px;padding: 5px;color:black' >ซ่อมเสร็จแล้ว</b>";
                                                    } else if ($repair_status == 5) {
                                                        echo "<b style = 'background-color: DodgerBlue;border-radius: 5px;padding: 5px;color:black' >ส่งมอบเรียบร้อย</b>";
                                                    } else if ($repair_status == 6) {
                                                        echo "<b style = 'background-color: red;border-radius: 5px;padding: 5px;color:black' >ยกเลิก</b>";
                                                        // echo "<b style = 'color:red' >ยกเลิก</b>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <form action="repairdb.php.php" method="POST">
                                                        <a href="../employee/view_repair.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-magnifying-glass"></i></a>
                                                        <a href="../employee/update_repair.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-square-pen"></i></a>
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
    <!-- end content -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>