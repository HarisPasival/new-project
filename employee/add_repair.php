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
                        <li class="breadcrumb-item active text-primary">เพิ่มรายการซ่อม</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light">เพิ่มรายการซ่อม</span>
                        </div>
                        <div class="card-body">
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
                                <div class="col-md-4">
                                    <label class="form-label">วันที่แจ้งซ่อม :</label>
                                    <input type="date" name="repair_date" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">ชื่อลูกค้า :</label>
                                    <input type="text" name="repair_name" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">นามสกุล :</label>
                                    <input type="text" name="repair_surname" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ยี่ห้อ :</label>
                                    <input type="text" name="repair_brand" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">เบอร์โทรศัพท์ :</label>
                                    <input type="text" name="repair_phone" class="form-control" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">ที่อยู่ :</label>
                                    <input type="text" name="repair_address" class="form-control" />
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">สาเหตุที่เสีย :</label>
                                    <input type="text" name="details" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">ราคาค่าซ่อม :</label>
                                    <input type="number" name="repair_price" class="form-control" />
                                </div>
                                <input type="hidden" name="repair_status" value="1">
                                <input type="hidden" name="payment_status" value="1">
                                <div class="mb-3">
                                    <button type="submit" name="add_repair" class="btn btn-outline-success"><i class="fa-solid fa-circle-check"></i> เพิ่มรายการซ่อม</button>
                                    <a href="repair.php" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</a>
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