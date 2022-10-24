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
    <!-- <link rel="stylesheet" href="../css/form.css" /> -->
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
    <?php include '../navemp/navbar.php' ?>
    <!-- navbar -->
    <!-- sidebar -->
    <?php include '../navemp/sidebar.php' ?>
    <!-- sidebar -->
    <!-- content -->
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <h4>รายการซ่อมทั้งหมด</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addrepairModal">
                        <i class="fa-solid fa-folder-plus"></i> แบบฟอร์มการแจ้งซ่อม
                        <a href="wait_repair.php" class="btn btn-warning"> รายการซ่อมที่รอยืนยัน</a>
                        <a href="confirm_repair.php" class="btn btn-primary"> รายการซ่อมที่ยืนยันแล้ว</a>
                        <a href="ecxecute_repair.php" class="btn btn-info"> รายการซ่อมที่กำลังซ่อม</a>
                        <a href="cancel_repair.php" class="btn btn-danger"> รายการซ่อมที่ยกเลิก</a>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="addrepairModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ฟอร์มการแจ้งซ่อม</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="repairdb.php" method="POST" class="row g-3">
                                        <?php
                                        require '../config/connect.php';
                                        if (isset($_SESSION['Emp_login'])) {
                                            $emp_id = $_SESSION['Emp_login'];
                                            $stmt = $conn->query("SELECT employee_id,name_emp,surname_emp FROM employee WHERE employee_id = $emp_id");
                                            $stmt->execute();
                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                        }
                                        ?>
                                        <input type="hidden" name="employee_id" value="<?= $row['employee_id'] ?>">
                                        <div class="col-6">
                                            <label class="form-label">ชื่อลูกค้า :</label>
                                            <input type="text" name="repair_name" class="form-control" />
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">นามสกุล :</label>
                                            <input type="text" name="repair_surname" class="form-control" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">สาเหตุที่เสีย :</label>
                                            <input type="text" name="details" class="form-control"></input>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">ราคาค่าซ่อม:</label>
                                            <input type="number" min="1" name="repair_price" class="form-control" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">สถานะการซ่อม :</label>
                                            <select name="repair_status" class="form-select text-danger">
                                                <option value="1">รอยืนยันการซ่อม</option>
                                                <option value="2">ยืนยันแล้ว</option>
                                                <option value="3">กำลังซ่อม</option>
                                                <option value="4">ซ่อมเสร็จแล้ว</option>
                                                <option value="5">ส่งมอบเรียบร้อย</option>
                                                <option value="6">ยกเลิก</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <button type="submit" name="add_repair" class="btn btn-outline-success"><i class="fa-solid fa-circle-check"></i> ยืนยันการแจ้งซ่อม</button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal add spare -->
                    <div class="modal fade" id="addspareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ระบุอะไหล่ที่ใช้ในการซ่อม</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="sparedb.php" method="POST" class="row g-3">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-borderless dt-responsive nowrap" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>ชื่ออะไหล่</th>
                                                            <th>รุ่น</th>
                                                            <th>ราคา</th>
                                                            <th>จำนวนสั่งซื้อ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        require '../config/connect.php';
                                                        $sql = "SELECT * FROM spare
                                                                LEFT JOIN brand ON spare.brand_id = brand.brand_id";
                                                        $stmt = $conn->query($sql);
                                                        while ($row = $stmt->fetch()) {
                                                        ?>
                                                            <tr>
                                                                <td><input class="form-check-input" type="checkbox" value=""></td>
                                                                <td><input name="spare_name" class="form-control" value="<?= $row['spare_name']; ?>" readonly /></td>
                                                                <td><input name="brand_name" class="form-control" value="<?= $row['brand_name']; ?>" readonly /></td>
                                                                <td><input name="model" class="form-control" value="<?= $row['model']; ?>" readonly /></td>
                                                                <td><input name="spare_price" class="form-control" value="<?= $row['spare_price']; ?>" readonly /></td>
                                                                <td><input type="number" name="order_quanlity" min="1" class="form-control text-center"></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <div class="text-center">
                                                    <span>ราคารวม : </span><span>บาท</span>
                                                </div>
                                                <div class="mb-3 text-center mt-2">
                                                    <button type="submit" name="addsparedetail" class="btn btn-outline-success"><i class="fa-solid fa-circle-check"></i> บันทึก</button>
                                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
                                                </div>
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
                            <span class="text-light"><i class="fa-solid fa-toolbox"></i> ตารางรายการซ่อมทั้งหมด</span>
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
                                        if (isset($_SESSION['Emp_login'])) {
                                            $emp_id = $_SESSION['Emp_login'];
                                            $sql = "SELECT re.repair_id, re.repair_date, re.repair_name, re.repair_surname, re.details, re.repair_status, em.employee_id, em.name_emp, em.surname_emp
                                        FROM repair re
                                        LEFT JOIN employee em ON re.employee_id = em.employee_id
                                        WHERE em.employee_id = $emp_id";
                                            $stmt = $conn->query($sql);
                                        }
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
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <form action="repairdb.php.php" method="POST">
                                                        <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#addspareModal"><i class="fa-solid fa-folder-plus"></i></button>
                                                        <a href="view_repair.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-magnifying-glass"></i></a>
                                                        <a href="update_repair.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-square-pen"> ปรับสถานะการซ่อม</i></a>
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
        <?php include '../navemp/footer.php' ?>
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