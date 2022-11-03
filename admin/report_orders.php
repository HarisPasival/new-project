<?php
session_start();
if (!isset($_SESSION['Admin_login'])) {
    header('location: ../Login-emp.php');
}
?>
<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
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
    <title>รายงานการสั่งซื้อ</title>
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
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h2>รายงานการสั่งซื้ออะไหล่ตามช่วงเวลา</h2>
                    <form action="" method="GET">
                        <div class="row g-3 mt-3">
                            <div class="form-floating col-md-4 mb-3">
                                <input type="date" name="start_date" data-date-format="dd-mm-Y" class="form-control" id="floatingInput" placeholder="start_date" required>
                                <label for="floatingInput">วันที่เริ่มต้น</label>
                            </div>
                            <div class="col-auto">
                                <label class="form-label">ถึง</label>
                            </div>
                            <div class="form-floating col-md-4 mb-3">
                                <input type="date" name="final_date" data-date-format="dd-mm-Y" class="form-control" id="floatingInput" placeholder="final_date" required>
                                <label for="floatingInput">วันที่สิ้นสุด</label>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-info">ค้นหา</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_GET['start_date']) && isset($_GET['final_date'])) {
                        require_once '../config/connect.php';
                        $stmt = $conn->prepare("SELECT * FROM orders
                        LEFT JOIN spare ON orders.spare_id  =  spare.spare_id
                        LEFT JOIN brand ON orders.brand_id = brand.brand_id
                        WHERE order_date BETWEEN ? AND ?");
                        $stmt->execute(array($_GET['start_date'], $_GET['final_date']));
                        $result = $stmt->fetchAll();

                        if ($stmt->rowCount() > 0) {
                    ?>
                            <br>
                            <h4>รายงานการสั่งซื้อวันที่ : <?= date('d/m/Y', strtotime($_GET['start_date'])); ?> ถึง <?= date('d/m/Y', strtotime($_GET['final_date'])); ?></h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table table-borderless dt-responsive nowrap data-table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ชื่ออะไหล่</th>
                                                    <th>ยี่ห้อ/รุ่นฝาสูบ</th>
                                                    <th>ราคา</th>
                                                    <th>จำนวนที่สั่งซื้อ</th>
                                                    <th>ราคารวม</th>
                                                    <th class="text-center">วันที่สั่งซื้อ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $total = 0;
                                                foreach ($result as $row) {
                                                    $sum_price = ($row['spare_price'] * $row['order_quanlity']);
                                                    $total += $sum_price;
                                                ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $row['spare_name']; ?></td>
                                                        <td><?= $row['brand_name']; ?></td>
                                                        <td><?= number_format($row['spare_price'], 2); ?></td>
                                                        <td><?= $row['order_quanlity']; ?></td>
                                                        <td align="right"><?= number_format($sum_price, 2); ?></td>
                                                        <td class="text-center"><?= date('d/m/Y', strtotime($row['order_date'])); ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr class="table-info">
                                                    <td colspan="5" class="text-center">ราคารวม</td>
                                                    <td align="right"><?= number_format($total, 2); ?></td>
                                                    <td class="text-center">บาท</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    <?php } else {
                            echo "<script>
                            $(document).ready(function(){
                                Swal.fire({
                                    title: 'warning',
                                    text: 'ไม่พบข้อมูลตามวันที่ที่ค้นหา',
                                    icon: 'warning',
                                    timer : 1500,
                                    showConfirmButton: false
                                });
                            });
                            </script>";
                        }
                    } ?>
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
</body>

</html>