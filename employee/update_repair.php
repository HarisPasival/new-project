<?php
session_start();
if (!isset($_SESSION['Emp_login'])) {
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
    <?php include '../navemp/navbar.php' ?>
    <!-- navbar -->
    <!-- sidebar -->
    <?php include '../navemp/sidebar.php' ?>
    <!-- sidebar -->
    <!-- content -->
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">จัดการรับซ่อม</li>
                        <li class="breadcrumb-item active text-primary">รายการซ่อม</li>
                    </ol>
                </div>
            </div>
            <!-- modal add spare -->
            <div class="modal fade" id="addspareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มอะไหล่ที่ใช้ในการซ่อม</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="detailsDB.php" method="POST">
                                <div class="row">
                                    <div class="form-floating col-md-4 mb-3">
                                        <select name="spare_id" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php
                                            require '../config/connect.php';
                                            $stmt = $conn->query("SELECT * FROM spare");
                                            $stmt->execute();
                                            while ($row = $stmt->fetch()) {
                                            ?>
                                                <option value="<?= $row['spare_id']; ?>"><?= $row['spare_name']; ?></option>
                                            <?php }  ?>
                                        </select>
                                        <label for="floatingSelect">ชื่ออะไหล่</label>
                                    </div>
                                    <div class="form-floating col-md-4 mb-3">
                                        <select name="brand_id" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php
                                            require '../config/connect.php';
                                            $stmt = $conn->query("SELECT * FROM brand");
                                            $stmt->execute();
                                            while ($row = $stmt->fetch()) {
                                            ?>
                                                <option value="<?= $row['brand_id']; ?>"><?= $row['brand_name']; ?></option>
                                            <?php }  ?>
                                        </select>
                                        <label for="floatingSelect">ยี่ห้อ/รุ่นฝาสูบ</label>
                                    </div>
                                    <div class="form-floating col-md-4 mb-3">
                                        <input type="number" name="details_quanlity" class="form-control text-center" id="floatingInput" placeholder="details_quanlity">
                                        <label for="floatingInput">จำนวนที่ใช้</label>
                                    </div>
                                    <?php
                                    $repair_id = $_GET['repair_id'];
                                    $stmt = $conn->query("SELECT * FROM repair WHERE repair_id = $repair_id");
                                    $stmt->execute();
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <input type="hidden" name="repair_id" value="<?= $row['repair_id'] ?>">
                                    <div class="mb-3 mt-3">
                                        <button class="btn btn-outline-success" name="add_details"><i class="fa-solid fa-location-arrow"></i> เพิ่มอะไหล่ที่ใช้</button>
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ย้อนกลับ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light">ตรวจสอบรายการซ่อม</span>
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
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="date" name="repair_date" value="<?= $result['repair_date'] ?>" class="form-control" id="floatingInput" placeholder="repair_date" readonly>
                                    <label for="floatingInput">วันที่แจ้งซ่อม</label>
                                </div>
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="text" name="repair_name" value="<?= $result['repair_name'] ?>" class="form-control" id="floatingInput" placeholder="repair_name" readonly>
                                    <label for="floatingInput">ชื่อลูกค้า</label>
                                </div>
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="text" name="repair_surname" value="<?= $result['repair_surname'] ?>" class="form-control" id="floatingInput" placeholder="repair_surname" readonly>
                                    <label for="floatingInput">นามสกุล</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="repair_brand" value="<?= $result['repair_brand'] ?>" class="form-control" id="floatingInput" placeholder="repair_brand" readonly>
                                    <label for="floatingInput">ยี่ห้อ/รุ่นฝาสูบ</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="repair_phone" value="<?= $result['repair_phone'] ?>" class="form-control" id="floatingInput" placeholder="repair_phone" readonly>
                                    <label for="floatingInput">เบอร์โทรศัพท์</label>
                                </div>
                                <div class="form-floating col-12 mb-3">
                                    <input type="text" name="repair_address" value="<?= $result['repair_address'] ?>" class="form-control" id="floatingInput" placeholder="repair_address" readonly>
                                    <label for="floatingInput">ที่อยู่</label>
                                </div>
                                <div class="form-floating col-12 mb-3">
                                    <input type="text" name="details" value="<?= $result['details'] ?>" class="form-control" id="floatingInput" placeholder="details" readonly>
                                    <label for="floatingInput">สาเหตุที่เสีย</label>
                                </div>
                                <div class="form-floating col-12 mb-3">
                                    <?php
                                    require '../config/connect.php';
                                    if (isset($_SESSION['Emp_login'])) {
                                        $emp_id = $_SESSION['Emp_login'];
                                        $stmt = $conn->query("SELECT employee_id,name_emp,surname_emp FROM employee WHERE employee_id = $emp_id");
                                        $stmt->execute();
                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                    }
                                    ?>
                                    <input type="text" name="employee_id" value="<?= $row['employee_id'] . ' : ' . $row['name_emp'] . ' ' . $row['surname_emp']; ?>" class="form-control" readonly>
                                    <label for="floatingInput">ผู้รับซ่อม</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="number" name="repair_price" value="<?= $result['repair_price'] ?>" class="form-control" id="floatingInput" placeholder="repair_price" readonly>
                                    <label for="floatingInput">ราคาค่าซ่อม</label>
                                </div>
                                <div class="form-floating  col-md-6 mb-3">
                                    <select class="form-select" name="repair_status" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="1" <?php if ($result['repair_status'] == 1) { ?> selected="selected" <?php } ?>>รอยืนยันการซ่อม</option>
                                        <option value="2" <?php if ($result['repair_status'] == 2) { ?> selected="selected" <?php } ?>>ยืนยันแล้ว</option>
                                        <option value="3" <?php if ($result['repair_status'] == 3) { ?> selected="selected" <?php } ?>>กำลังซ่อม</option>
                                        <option value="4" <?php if ($result['repair_status'] == 4) { ?> selected="selected" <?php } ?>>ซ่อมเสร็จแล้ว</option>
                                        <option value="5" <?php if ($result['repair_status'] == 5) { ?> selected="selected" <?php } ?>>ส่งมอบเรียบร้อย</option>
                                        <option value="6" <?php if ($result['repair_status'] == 6) { ?> selected="selected" <?php } ?>>ยกเลิก</option>
                                    </select>
                                    <label for="floatingSelect">สถานะการซ่อม</label>
                                </div>
                                <div class="mb-3">
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addspareModal">ระบุอะไหล่ที่ใช้</button>
                                    <button type="submit" name="update_repair" class="btn btn-outline-warning"><i class="fa-solid fa-circle-check"></i> ปรับสถานะการซ่อม</button>
                                    <a href="repair.php" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <h4>อะไหล่ที่ใช้ในการซ่อม</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3 mt-2">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light"><i class="fa-solid fa-toolbox"></i> อะไหล่ที่ใช้ในการซ่อม</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover dt-responsive nowrap data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่ออะไหล่</th>
                                            <th>ยี่ห้อ/รุ่นฝาสูบ</th>
                                            <th>ราคา</th>
                                            <th>จำนวนที่ใช้</th>
                                            <th>ราคารวม</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $total = 0;
                                        $resultAll = 0;
                                        $repair_id = $_GET['repair_id'];
                                        $sql = "SELECT * FROM repair_details 
                                        LEFT JOIN spare ON repair_details.spare_id = spare.spare_id
                                        LEFT JOIN brand ON repair_details.brand_id = brand.brand_id
                                        LEFT JOIN repair ON repair_details.repair_id = repair.repair_id
                                        WHERE repair_details.repair_id = $repair_id";
                                        $stmt = $conn->query($sql);
                                        while ($row = $stmt->fetch()) {
                                            $sum_price = ($row['spare_price'] * $row['details_quanlity']); //(ราคาค่าอะไหล่ * จำนวนอะไหล่ที่ใช้)
                                            $total += $sum_price; //(รวมราคาอะไหล่ทั้งหมดที่ใช้ในการซ่อม)
                                            $resultAll = $total + ($row['repair_price']); //(ราคาค่าอะไหล่ที่ใช้ + ราคาค่าซ่อม)
                                        ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row['spare_name']; ?></td>
                                                <td><?= $row['brand_name']; ?></td>
                                                <td><?= number_format($row['spare_price'], 2); ?></td>
                                                <td><?= $row['details_quanlity']; ?></td>
                                                <td><?= number_format($sum_price, 2) ?></td>
                                                <td>
                                                    <form action="detailsDB.php" method="POST">
                                                        <button type="submit" name="delspare" value="<?= $row['repair_details_id'] ?>" onclick="return confirm('คุณต้องการลบหรือไม่');" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="5" class="text-center">ราคาค่าอะไหล่ที่ใช้</td>
                                            <td><?= number_format($total, 2); ?></td>
                                            <td>บาท</td>
                                        </tr>
                                        <tr class="table-info">
                                            <td colspan="5" class="text-center">รวมราคาค่าซ่อมทั้งหมด</td>
                                            <td><?= number_format($resultAll, 2); ?></td>
                                            <td>บาท</td>
                                        </tr>
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