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
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/form.css" />
    <title>เพิ่มข้อมูลอะไหล่</title>
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
                        <li class="breadcrumb-item">ข้อมูลอะไหล่</li>
                        <li class="breadcrumb-item active text-primary">แก้ไขข้อมูลอะไหล่</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light">แก้ไขข้อมูลอะไหล่</span>
                        </div>
                        <div class="card-body">
                            <?php
                            require '../config/connect.php';
                            if (isset($_GET['spare_id'])) {
                                $spare_id = $_GET['spare_id'];
                                $query = "SELECT * FROM spare WHERE spare_id =:spare_id";
                                $stmt = $conn->prepare($query);
                                $data = [':spare_id' => $spare_id];
                                $stmt->execute($data);
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            }
                            ?>
                            <form action="crud.php" method="POST" class="row g-3">
                                <input type="hidden" name="spare_id" value="<?= $result['spare_id'] ?>">
                                <div class="form-floating mb-3 col-md-4">
                                    <input type="text" name="spare_name" value="<?= $result['spare_name'] ?>" class="form-control" id="floatingInput" placeholder="spare_name">
                                    <label for="floatingInput">ชื่ออะไหล่</label>
                                </div>
                                <div class="form-floating col-md-4 mb-3">
                                    <select name="brand_id" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <?php
                                        $stmt = $conn->query("SELECT * FROM brand");
                                        $stmt->execute();
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?= $row["brand_id"]; ?>" <?= ($row["brand_id"] == $result['brand_id']) ? 'selected="selected"' : ''; ?>>
                                                <?= $row['brand_name']; ?></option>
                                        <?php }  ?>
                                    </select>
                                    <label for="floatingSelect">ยี่ห้อฝาสูบ/รุ่น</label>
                                </div>
                                <div class="form-floating mb-3 col-md-4">
                                    <input type="text" name="spare_price" value="<?= $result['spare_price'] ?>" class="form-control" id="floatingInput" placeholder="spare_price">
                                    <label for="floatingInput">ราคา</label>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_spare" class="btn btn-outline-warning"><i class="fa-solid fa-circle-plus"></i> แก้ไขข้อมูล</button>
                                    <a href="spares.php" class="btn btn-outline-danger"><i class="fa-solid fa-caret-left"></i> ยกเลิก</a>
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