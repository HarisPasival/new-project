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
    <title>เพิ่มข้อมูลลูกค้า</title>
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
                        <li class="breadcrumb-item active text-primary">เพิ่มข้อมูลลูกค้า</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light">เพิ่มข้อมูลลูกค้า</span>
                        </div>
                        <div class="card-body">
                            <form action="crud.php" method="POST" class="row g-3">
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="name_ct" class="form-control" id="floatingInput" placeholder="name_ct">
                                    <label for="floatingInput">ชื่อ</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="surname_ct" class="form-control" id="floatingInput" placeholder="surname_ct">
                                    <label for="floatingInput">นามสกุล</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="username_ct" class="form-control" id="floatingInput" placeholder="username_ct">
                                    <label for="floatingInput">ชื่อผู้ใช้</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="password" name="password_ct" id="myPassword" class="form-control" id="floatingInput" placeholder="password_ct">
                                    <label for="floatingInput">รหัสผ่าน</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="phone_ct" maxlength="10" class="form-control" id="floatingInput" placeholder="phone_ct">
                                    <label for="floatingInput">เบอร์โทรศัพท์</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="email" name="email_ct" class="form-control" id="floatingInput" placeholder="email_ct">
                                    <label for="floatingInput">อีเมล</label>
                                </div>
                                <div class="form-floating col-12 mb-3">
                                    <input type="text" name="address_ct" class="form-control" id="floatingInput" placeholder="address_ct">
                                    <label for="floatingInput">ที่อยู่</label>
                                </div>
                                <div class="form-floating col-12 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" onclick="passShow()">
                                        <label>แสดงรหัสผ่าน</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="add_cus" class="btn btn-outline-success"><i class="fa-solid fa-circle-plus"></i> เพิ่มข้อมูล</button>
                                    <a href="customer.php" class="btn btn-outline-danger"><i class="fa-solid fa-caret-left"></i> ยกเลิก</a>
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