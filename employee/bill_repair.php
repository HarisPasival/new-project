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
    <title>ใบเสนอราคา</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body>
    <?php
    function ThaiDate($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];

        return "$strDay $strMonthThai $strYear";
    }
    ?>
    <main class="mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 mt-2">
                    <h2 class="text-center">ใบเสนอราคา</h2>
                </div>
                <div class="col-md-9 mb-3">
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
                    <h4 class="text-center">ร้านก้าวหน้าฝาสูบ</h4>
                    <h5 class="text-center">ที่อยู่ : หมู่ 9 ตำบลสะเตงนอก อ.เมือง จ.ยะลา</h5>
                    <h6 class="text-center">เบอร์โทร : 0805426306</h6>
                    <h6> เลขที่ใบเสนอราคา : <?= $result['repair_id'] ?></h6>
                    <h6> วันที่ : <?= ThaiDate($result['repair_date']) ?> </h6>
                    <h6>ยี่ห้อ/รุ่นฝาสูบ : <?= $result['repair_brand'] ?></h6>
                    หมายเหตุ : <?= $result['details'] ?><br>
                    ชื่อ - นามสกุล : <?= $result['repair_name'] ?> <?= $result['repair_surname'] ?><br>
                    ที่อยู่ : <?= $result['repair_address'] ?> <br>
                    เบอร์โทร : <?= $result['repair_phone'] ?> <br>
                    <?php
                    require '../config/connect.php';
                    if (isset($_SESSION['Emp_login'])) {
                        $emp_id = $_SESSION['Emp_login'];
                        $stmt = $conn->query("SELECT employee_id,name_emp,surname_emp FROM employee WHERE employee_id = $emp_id");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 mb-3 mt-2">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered border-dark dt-responsive nowrap data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <!-- <th>ลำดับ</th> -->
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
                                        <!-- <td><?= $i++ ?></td> -->
                                        <td><?= $row['spare_name']; ?></td>
                                        <td><?= $row['brand_name']; ?></td>
                                        <td><?= number_format($row['spare_price'], 2); ?></td>
                                        <td class="text-center"><?= $row['details_quanlity']; ?></td>
                                        <td><?= number_format($sum_price, 2) ?></td>
                                        <td>บาท</td>
                                    <tr>
                                        <td colspan="4" class="text-center">ราคาค่าซ่อม</td>
                                        <td><?= number_format($row['repair_price'], 2); ?></td>
                                        <td>บาท</td>
                                    </tr>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="4" class="text-center">ราคาค่าอะไหล่ที่ใช้</td>
                                    <td><?= number_format($total, 2); ?></td>
                                    <td>บาท</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-center">รวมราคาทั้งหมดสุทธิ</td>
                                    <td><?= number_format($resultAll, 2); ?></td>
                                    <td>บาท</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <span>ลงชื่อ........................................................................ผู้เสนอราคา</span>//
            <span>ลงชื่อ........................................................................ผู้อนุมัติ</span>//
        </div>
        </div>
    </main>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/sheet.js"></script>
</body>

</html>