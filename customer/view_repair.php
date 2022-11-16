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
    <title>ดูรายละเอียดการซ่อม</title>
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
                    <div class="card bg-dark">
                        <div class="card-body">
                            <h3 class="text-white">รายละเอียดการซ่อม</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light">รายละเอียดการซ่อม</span>
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
                            <form class="row g-3">
                                <input type="hidden" name="repair_id" value="<?= $result['repair_id'] ?>">
                                <div class="col-md-4">
                                    <label class="form-label">วันที่แจ้งซ่อม :</label>
                                    <input type="date" name="repair_date" value="<?= $result['repair_date'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">ชื่อลูกค้า :</label>
                                    <input type="text" name="repair_name" value="<?= $result['repair_name'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">นามสกุล :</label>
                                    <input type="text" name="repair_surname" value="<?= $result['repair_surname'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ยี่ห้อ :</label>
                                    <input type="text" name="repair_brand" value="<?= $result['repair_brand'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">เบอร์โทรศัพท์ :</label>
                                    <input type="text" name="repair_phone" value="<?= $result['repair_phone'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">ที่อยู่ :</label>
                                    <input type="text" name="repair_address" value="<?= $result['repair_address'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">สาเหตุที่เสีย :</label>
                                    <input type="text" name="details" value="<?= $result['details'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ราคาค่าซ่อม:</label>
                                    <input type="number" min="1" name="repair_price" value="<?= $result['repair_price'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">สถานะการซ่อม :</label>
                                    <select name="repair_status" class="form-select" disabled>
                                        <option value="1" <?php if ($result['repair_status'] == 1) { ?> selected="selected" <?php } ?>>รอยืนยันการซ่อม</option>
                                        <option value="2" <?php if ($result['repair_status'] == 2) { ?> selected="selected" <?php } ?>>ยืนยันแล้ว</option>
                                        <option value="3" <?php if ($result['repair_status'] == 3) { ?> selected="selected" <?php } ?>>กำลังซ่อม</option>
                                        <option value="4" <?php if ($result['repair_status'] == 4) { ?> selected="selected" <?php } ?>>ซ่อมเสร็จแล้ว</option>
                                        <option value="5" <?php if ($result['repair_status'] == 5) { ?> selected="selected" <?php } ?>>ส่งมอบเรียบร้อย</option>
                                        <option value="6" <?php if ($result['repair_status'] == 6) { ?> selected="selected" <?php } ?>>ยกเลิก</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">สลิปชำระเงิน :</label>
                                    <?php
                                    if ($result['slip_payment'] == NULL) {
                                        echo 'ยังไม่มีการชำระเงิน';
                                    } else {
                                    ?>
                                        <img src="../slip/<?= $result['slip_payment']; ?>" width="250px" height="445px">
                                    <?php
                                    }
                                    ?>
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
                    <div class="card bg-dark">
                        <div class="card-body">
                            <h5 class="text-white">อะไหล่ที่ใช้ในการซ่อม</h5>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
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
                                                    <th>หน่วย</th>
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
                                                        <td>บาท</td>
                                                    <tr>
                                                        <td colspan="5" class="text-center">ราคาค่าซ่อม</td>
                                                        <td><?= number_format($row['repair_price'], 2); ?></td>
                                                        <td>บาท</td>
                                                    </tr>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td colspan="5" class="text-center">ราคาค่าอะไหล่ที่ใช้</td>
                                                    <td><?= number_format($total, 2); ?></td>
                                                    <td>บาท</td>
                                                </tr>
                                                <tr class="table-info">
                                                    <td colspan="5" class="text-center">รวมราคาทั้งหมดสุทธิ</td>
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
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="card bg-dark">
                            <div class="card-body">
                                <h5 class="text-white">อัปโหลดหลักฐานการชำระเงิน</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="up_slip.php" method="POST" enctype="multipart/form-data">
                                    <div class="mt-2">
                                        <label class="form-label">อัปโหลดหลักฐานการชำระเงิน :</label>
                                        <input type="file" name="slip_payment" class="form-control" required />
                                    </div>
                                    <input type="hidden" name="repair_id" value="<?= $result['repair_id'] ?>">
                                    <div class="mt-2">
                                        <button type="submit" name="payment" class="btn btn-outline-success"><i class="fa-solid fa-circle-check"></i> อัปโหลดหลักฐานชำระเงิน</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6 mt-2">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <img src="../payment/NEXT.jpg" class="card-img-top">
                                    </div>
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