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
    <title>เพิ่มข้อมูลประเภทฝาสูบ</title>
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
                        <li class="breadcrumb-item">ข้อมูลยี่ห้อ/รุ่นฝาสูบ</li>
                        <li class="breadcrumb-item active text-primary">เพิ่มข้อมูลยี่ห้อ/รุ่นฝาสูบ</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light">เพิ่มข้อมูลยี่ห้อ/รุ่นฝาสูบ</span>
                        </div>
                        <div class="card-body">
                            <form action="crud.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="text" name="brand_name" class="form-control" id="floatingInput" placeholder="brand_name">
                                    <label for="floatingInput">ชื่อยี่ห้อ/รุ่นฝาสูบ</label>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="add_brand" class="btn btn-outline-success"><i class="fa-solid fa-circle-plus"></i> เพิ่มข้อมูล</button>
                                    <a href="brand.php" class="btn btn-outline-danger"><i class="fa-solid fa-caret-left"></i> ย้อนกลับ</a>
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
</body>

</html>