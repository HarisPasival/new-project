<?php
session_start();
if (!isset($_SESSION['Emp_login'])) {
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
    <title>รายงานการรับซ่อม</title>
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
                <div class="col-md-12 mt-3">
                    <h2>รายงานการรับซ่อมฝาสูบตามช่วงเวลา</h2>
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
                        $stmt = $conn->prepare("SELECT re.repair_id, re.repair_date, re.repair_name, re.repair_surname, re.details, re.repair_status, em.employee_id, em.name_emp, em.surname_emp
                        FROM repair re
                        left JOIN employee em ON re.employee_id = em.employee_id
                        WHERE repair_date BETWEEN ? AND ?");
                        $stmt->execute(array($_GET['start_date'], $_GET['final_date']));
                        $result = $stmt->fetchAll();

                        if ($stmt->rowCount() > 0) {
                    ?>
                            <br>
                            <h4>รายงานการรับซ่อมวันที่ : <?= date('d/m/Y', strtotime($_GET['start_date'])); ?> ถึง <?= date('d/m/Y', strtotime($_GET['final_date'])); ?></h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table table-borderless dt-responsive nowrap data-table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>วันที่แจ้งซ่อม</th>
                                                    <th>ชื่อลูกค้าที่มาซ่อม</th>
                                                    <th>สาเหตุที่เสีย</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $total = 0;
                                                foreach ($result as $row) {
                                                ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $row['repair_date']; ?></td>
                                                        <td><?= $row['repair_name'] . ' ' . $row['repair_surname']; ?></td>
                                                        <td><?= $row['details']; ?></td>
                                                    </tr>
                                                <?php } ?>
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
        <?php include '../navemp/footer.php' ?>
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