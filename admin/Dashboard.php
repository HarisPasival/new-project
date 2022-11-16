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
                <div class="col-md-12">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <h3 class="text-white">หน้าหลัก</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 mb-3">
                    <div class="card bg-warning text-white h-100">
                        <?php
                        require '../config/connect.php';
                        $stmt = $conn->query("SELECT COUNT(repair_status) AS wait
                        FROM repair
                        WHERE repair_status = '1'");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="card-body"><i class="fa-solid fa-calendar-week"></i> รายการซ่อมที่รอยืนยันการซ่อม<h4><?= $row['wait'] ?> รายการ</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-success text-white h-100">
                        <?php
                        require '../config/connect.php';
                        $stmt = $conn->query("SELECT COUNT(repair_status) AS confirm
                        FROM repair
                        WHERE repair_status = '2'");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="card-body"><i class="fa-solid fa-calendar-week"></i> รายการซ่อมที่ยืนยันแล้ว<h4><?= $row['confirm'] ?> รายการ</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-primary text-white h-100">
                        <?php
                        require '../config/connect.php';
                        $stmt = $conn->query("SELECT COUNT(repair_status) AS canpair
                        FROM repair
                        WHERE repair_status = '3'");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="card-body"><i class="fa-solid fa-calendar-week"></i> รายการซ่อมที่กำลังซ่อม<h4><?= $row['canpair'] ?> รายการ</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-info text-white h-100">
                        <?php
                        require '../config/connect.php';
                        $stmt = $conn->query("SELECT COUNT(repair_status) AS complete
                        FROM repair
                        WHERE repair_status = '4'");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="card-body"><i class="fa-solid fa-calendar-week"></i> รายการซ่อมที่ซ่อมเสร็จแล้ว<h4><?= $row['complete'] ?> รายการ</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-secondary text-white h-100">
                        <?php
                        require '../config/connect.php';
                        $stmt = $conn->query("SELECT COUNT(repair_status) AS turn
                        FROM repair
                        WHERE repair_status = '5'");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="card-body"><i class="fa-solid fa-calendar-week"></i> รายการที่ส่งมอบแล้ว<h4><?= $row['turn'] ?> รายการ</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-danger text-white h-100">
                        <?php
                        require '../config/connect.php';
                        $stmt = $conn->query("SELECT COUNT(repair_status) AS cancel
                        FROM repair
                        WHERE repair_status = '6'");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="card-body"><i class="fa-solid fa-calendar-week"></i> รายการซ่อมที่ยกเลิก<h4><?= $row['cancel'] ?> รายการ</h4>
                        </div>
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
                                                        // echo "<b style = 'color:red' >ยกเลิก</b>";
                                                    }
                                                    ?>
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
</body>

</html>