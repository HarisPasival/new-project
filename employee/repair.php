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
                    <h4>รายการซ่อมทั้งหมด</h4>
                    <a href="add_repair.php" class="btn btn-success"><i class="fa-solid fa-folder-plus"></i> เพิ่มรายการซ่อม</a>
                    <a href="wait_repair.php" class="btn btn-warning"> รายการซ่อมที่รอยืนยัน</a>
                    <a href="confirm_repair.php" class="btn btn-primary"> รายการซ่อมที่ยืนยันแล้ว</a>
                    <a href="ecxecute_repair.php" class="btn btn-info"> รายการซ่อมที่กำลังซ่อม</a>
                    <a href="cancel_repair.php" class="btn btn-danger"> รายการซ่อมที่ยกเลิก</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
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
                                        WHERE em.employee_id = $emp_id
                                        ORDER BY re.repair_id DESC";
                                            $stmt = $conn->query($sql);
                                        }
                                        while ($row = $stmt->fetch()) {
                                            $repair_status = $row['repair_status'];
                                        ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= ThaiDate($row['repair_date']); ?></td>
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
                                                        <a href="update_repair.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-warning btn-sm text-white">ดูรายละเอียดการซ่อม</a>
                                                        <a href="bill_repair.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-info btn-sm text-white">ใบเสนอราคา</a>
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