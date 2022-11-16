<?php
session_start();
if (!isset($_SESSION['Admin_login'])) {
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
    <title>ข้อมูลการชำระเงิน</title>
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
    <!-- content -->
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <h4>ตรวจสอบการชำระเงิน</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3 mt-2">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light"><i class="fa-solid fa-user"></i> ตารางการชำระเงิน</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover dt-responsive nowrap data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>วันที่แจ้งซ่อม</th>
                                            <th>ชื่อลูกค้าที่มาซ่อม</th>
                                            <th>ผู้รับซ่อม</th>
                                            <th>สถานะ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        require '../config/connect.php';
                                        $sql = "SELECT re.repair_id, re.repair_date, re.repair_name, re.repair_surname, re.details, re.payment_status, re.slip_payment, em.employee_id, em.name_emp, em.surname_emp
                                        FROM repair re
                                        left JOIN employee em ON re.employee_id = em.employee_id";
                                        $stmt = $conn->query($sql);
                                        while ($row = $stmt->fetch()) {
                                            $payment_status = $row['payment_status'];
                                        ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= ThaiDate($row['repair_date']); ?></td>
                                                <td><?= $row['repair_name'] . ' ' . $row['repair_surname']; ?></td>
                                                <td><?= $row['name_emp'] . ' ' . $row['surname_emp']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($payment_status == 1) {
                                                        echo "<b style = 'background-color: yellow;border-radius: 5px;padding: 5px;color:black; font-size: 15px' >ค้างชำระเงิน</b>";
                                                    } else if ($payment_status == 2) {
                                                        echo "<b style = 'background-color: lime;border-radius: 5px;padding: 5px;color:black; font-size: 15px' >ชำระเงินเรียบร้อยแล้ว</b>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <form action="crud.php" method="POST">
                                                        <a href="status_payment.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-outline-info btn-sm">บันทึกการชำระเงิน</a>
                                                        <a href="bill_payment.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-outline-primary btn-sm">ใบเสร็จการชำระเงิน</a>
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
        <?php include '../navbarsideter/footer.php' ?>
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