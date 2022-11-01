<?php
include '../config/connect.php';
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
    <title>ข้อมูลลูกค้า</title>
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
            <div class="row">
                <div class="col-md-12 mb-3 mt-2">
                    <h4>รับเข้าอะไหล่</h4>
                    <div class="card">
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
                            <form action="up_stock.php" method="POST" class="row g-3">
                                <input type="hidden" name="spare_id" value="<?= $result['spare_id']; ?>">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">ชื่ออะไหล่:</label>
                                    <input type="text" name="spare_name" value="<?= $result['spare_name']; ?>" class="form-control" readonly />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">ยี่ห้อฝาสูบ :</label>
                                    <select name="brand_id" class="form-select" disabled>
                                        <?php
                                        $stmt = $conn->query("SELECT * FROM brand");
                                        $stmt->execute();
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?= $row["brand_id"]; ?>" <?= ($row["brand_id"] == $result['brand_id']) ? 'selected="selected"' : ''; ?>>
                                                <?= $row['brand_name']; ?></option>
                                        <?php }  ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">จำนวนที่เพิ่ม:</label>
                                    <input type="number" name="stock_up" min="1" class="form-control text-center" />
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="submit" class="btn btn-outline-success"><i class="fa-solid fa-circle-plus"></i> บันทึกการรับเข้า</button>
                                    <a href="accept.php" class="btn btn-outline-danger"><i class="fa-solid fa-caret-left"></i> ยกเลิก</a>
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