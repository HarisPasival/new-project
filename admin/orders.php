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
    <!-- <link rel="stylesheet" href="../css/form.css" /> -->
    <title>ข้อมูลลูกค้า</title>
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
                                    <a href="orders.php" class="nav-link active px-3">
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
            <div class="row">
                <div class="col-md-12 mt-2">
                    <h4>ข้อมูลการสั่งซื้อ</h4>
                    <!-- <a href="#" class="btn btn-success"><i class="fa-solid fa-folder-plus"></i> เพิ่มรายการสั่งซื้อ</a> -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addordersModal">
                        <i class="fa-solid fa-folder-plus"></i> เพิ่มรายการสั่งซื้อ</a>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="addordersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ฟอร์มสั่งซื้ออะไหล่</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="ordersDB.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>ชื่ออะไหล่:</label>
                                                <select name="spare_id" class="form-select">
                                                    <?php
                                                    require '../config/connect.php';
                                                    $stmt = $conn->query("SELECT * FROM spare");
                                                    $stmt->execute();
                                                    while ($row = $stmt->fetch()) {
                                                    ?>
                                                        <option value="<?= $row['spare_id']; ?>"><?= $row['spare_name']; ?></option>
                                                    <?php }  ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>จำนวนที่สั่งซื้อ</label>
                                                <input type="number" name="order_quanlity" min="1" class="form-control">
                                            </div>
                                            <input type="hidden" name="orders_status" value="1">
                                            <div class="mb-3 mt-2">
                                                <button class="btn btn-outline-success" name="add_orders"><i class="fa-solid fa-location-arrow"></i> เพิ่มรายการสั่งซื้อ</button>
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="fa-solid fa-caret-left"></i> ย้อนกลับ</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3 mt-2">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light"><i class="fa-solid fa-cart-arrow-down"></i> ตารางข้อมูลการสั่งซื้อทั้งหมด</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover dt-responsive nowrap data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ลำดับ</th>
                                            <th class="text-center">ชื่ออะไหล่</th>
                                            <th class="text-center">ราคา</th>
                                            <th class="text-center">จำนวนที่สั่งซื้อ</th>
                                            <th class="text-center">วันที่สั่งซื้อ</th>
                                            <th class="text-center">สถานะ</th>
                                            <th class="text-center">อัพเดตสถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        require '../config/connect.php';
                                        $sql = "SELECT od.order_id, od.order_quanlity, od.order_date, od.orders_status, sp.spare_id, sp.spare_name, sp.spare_price
                                                FROM orders od
                                                LEFT JOIN spare sp ON od.spare_id = sp.spare_id";
                                        $stmt = $conn->query($sql);
                                        while ($row = $stmt->fetch()) {
                                            $orders_status = $row['orders_status'];
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $i++ ?></td>
                                                <td class="text-center"><?= $row['spare_name'] ?></td>
                                                <td class="text-center"><?= $row['spare_price'] ?></td>
                                                <td class="text-center"><?= $row['order_quanlity'] ?></td>
                                                <td class="text-center"><?= $row['order_date'] ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($orders_status == 1) {
                                                        echo "<b style = 'color:gold' >สั่งซื้อแล้ว</b>";
                                                    } else if ($orders_status == 2) {
                                                        echo "<b style = 'color:green' >รับเข้าแล้ว</b>";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <div>
                                                        <button data-bs-toggle="modal" data-bs-target="#edit_orderModal<?= $row['order_id']; ?>" type="button" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-square-pen"></i> ปรับสถานะ</button>
                                                    </div>
                                                </td>
                                                <!-- include crud modal -->
                                                <?php require 'popup/edit_orders.php' ?>
                                                <!-- include crud modal -->
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