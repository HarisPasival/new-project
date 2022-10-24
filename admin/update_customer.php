<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/79a0376aeb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/form.css" />
    <title>แก้ไขข้อมูลลูกค้า</title>
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
            <div class="row mt-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">ข้อมูลพื้นฐาน</li>
                        <li class="breadcrumb-item">ข้อมูลลูกค้า</li>
                        <li class="breadcrumb-item active text-primary">แก้ไขข้อมูลลูกค้า</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light">แก้ไขข้อมูลลูกค้า</span>
                        </div>
                        <div class="card-body">
                            <?php
                            require '../config/connect.php';
                            if (isset($_GET['customer_id'])) {
                                $customer_id = $_GET['customer_id'];
                                $query = "SELECT * FROM customer WHERE customer_id =:customer_id";
                                $stmt = $conn->prepare($query);
                                $data = [':customer_id' => $customer_id];
                                $stmt->execute($data);
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            }
                            ?>
                            <form action="crud.php" method="POST" class="row g-3">
                                <input type="hidden" name="customer_id" value="<?= $result['customer_id'] ?>">
                                <div class="col-md-6">
                                    <label class="form-label">ชื่อ :</label>
                                    <input type="text" name="name_ct" value="<?= $result['name_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">นามสกุล :</label>
                                    <input type="text" name="surname_ct" value="<?= $result['surname_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ชื่อผู้ใช้ :</label>
                                    <input type="text" name="username_ct" value="<?= $result['username_ct'] ?>" class="form-control" readonly />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">รหัสผ่าน :</label>
                                    <input type="password" name="password_ct" id="myPassword" value="<?= $result['password_ct'] ?>" class="form-control" />
                                    <input type="checkbox" onclick="passShow()">
                                    <label>แสดงรหัสผ่าน</label>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">เบอร์โทรศัพท์:</label>
                                    <input type="text" name="phone_ct" value="<?= $result['phone_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">อีเมล:</label>
                                    <input type="email" name="email_ct" value="<?= $result['email_ct'] ?>" class="form-control" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">ที่อยู่:</label>
                                    <input type="text" name="address_ct" value="<?= $result['address_ct'] ?>" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_cus" class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> แก้ไขข้อมูล</button>
                                    <a href="customer.php" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-caret-left"></i> ย้อนกลับ</a>
                                </div>
                            </form>
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