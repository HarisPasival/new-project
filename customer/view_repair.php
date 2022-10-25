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
                    <div class="alert alert-info" role="alert">
                        <h4>รายละเอียดการซ่อม</h4>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light">แก้ไขรายการซ่อม</span>
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
                                <div class="col-md-4">
                                    <label class="form-label">วันที่แจ้งซ่อม :</label>
                                    <input type="datetime-local" name="repair_date" value="<?= $result['repair_date'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-4">
                                    <label class="form-label">ชื่อลูกค้า :</label>
                                    <input type="text" name="repair_name" value="<?= $result['repair_name'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-4">
                                    <label class="form-label">นามสกุล :</label>
                                    <input type="text" name="repair_surname" value="<?= $result['repair_surname'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">สาเหตุที่เสีย :</label>
                                    <input type="text" name="details" value="<?= $result['details'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-12">
                                    <?php
                                    require '../config/connect.php';
                                    if (isset($_SESSION['Emp_login'])) {
                                        $emp_id = $_SESSION['Emp_login'];
                                        $stmt = $conn->query("SELECT employee_id,name_emp,surname_emp FROM employee WHERE employee_id = $emp_id");
                                        $stmt->execute();
                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                    }
                                    ?>
                                    <label class="form-label">ผู้รับซ่อม :</label>
                                    <input type="text" name="employee_id" value="<?= $row['employee_id'] . ' : ' . $row['name_emp'] . ' ' . $row['surname_emp']; ?>" class="form-control" readonly>
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
                                <div class="mb-3 text-center">
                                    <button type="submit" name="upload_slip" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-check"></i> ชำระเงิน</button>
                                </div>
                            </form>
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