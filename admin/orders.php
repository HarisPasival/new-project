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
    <title>ข้อมูลการสั่งซื้อ</title>
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
                <div class="col-md-12 mt-2">
                    <h4>ข้อมูลการสั่งซื้อ</h4>
                    <!-- <a href="bill_orders.php" class="btn btn-outline-primary"><i class="fa-regular fa-folder-open"></i> สั่งซื้ออะไหล่</a> -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addordersModal">
                        <i class="fa-solid fa-folder-plus"></i> เพิ่มรายการสั่งซื้อ</a>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addordersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ฟอร์มสั่งซื้ออะไหล่</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="ordersDB.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-6 mt-2">
                                                <label class="form-label">ชื่ออะไหล่ :</label>
                                                <select name="spare_id" class="form-select">
                                                    <?php
                                                    require '../config/connect.php';
                                                    $stmt = $conn->query("SELECT * FROM spare");
                                                    $stmt->execute();
                                                    while ($row = $stmt->fetch()) {
                                                    ?>
                                                        <option value="<?= $row['spare_id']; ?>"><?= $row['spare_name']; ?></option>
                                                    <?php }  ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <label class="form-label">ยี่ห้อ/รุ่นฝาสูบ :</label>
                                                <select name="brand_id" class="form-select">
                                                    <?php
                                                    require '../config/connect.php';
                                                    $stmt = $conn->query("SELECT * FROM brand");
                                                    $stmt->execute();
                                                    while ($row = $stmt->fetch()) {
                                                    ?>
                                                        <option value="<?= $row['brand_id']; ?>"><?= $row['brand_name']; ?></option>
                                                    <?php }  ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <label class="form-label">จำนวนที่สั่งซื้อ</label>
                                                <input type="number" name="order_quanlity" min="1" class="form-control">
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <label class="form-label">วันที่สั่งซื้อ</label>
                                                <input type="date" name="order_date" class="form-control">
                                            </div>
                                            <div class="mb-3 mt-3 text-center">
                                                <button class="btn btn-outline-success" name="add_orders"><i class="fa-solid fa-location-arrow"></i> เพิ่มรายการสั่งซื้อ</button>
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ย้อนกลับ</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3 mt-2">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light"><i class="fa-solid fa-cart-arrow-down"></i> ตารางข้อมูลการสั่งซื้อทั้งหมด</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover dt-responsive nowrap data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่ออะไหล่</th>
                                            <th>ยี่ห้อ/รุ่นฝาสูบ</th>
                                            <th>ราคา</th>
                                            <th>จำนวนที่สั่งซื้อ</th>
                                            <th>ราคารวม</th>
                                            <th>วันที่สั่งซื้อ</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $total = 0;
                                        require '../config/connect.php';
                                        $sql = "SELECT * FROM orders
                                                LEFT JOIN spare ON orders.spare_id  =  spare.spare_id
                                                LEFT JOIN brand ON orders.brand_id = brand.brand_id
                                                ORDER BY order_id DESC";
                                        $stmt = $conn->query($sql);
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            $sum_price = ($row['spare_price'] * $row['order_quanlity']);
                                            $total += $sum_price;
                                        ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row['spare_name'] ?></td>
                                                <td><?= $row['brand_name'] ?></td>
                                                <td><?= number_format($row['spare_price'], 2) ?></td>
                                                <td><?= $row['order_quanlity'] ?></td>
                                                <td><?= number_format($sum_price, 2) ?></td>
                                                <td><?= $row['order_date'] ?></td>
                                                <td>
                                                    <form action="ordersDB.php" method="POST">
                                                        <button type="submit" name="delorders" value="<?= $row['order_id'] ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-delete-left"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr class="table-info">
                                            <td colspan="5" class="text-center">ราคารวม</td>
                                            <td><?= number_format($total, 2); ?></td>
                                            <td>บาท</td>
                                            <td></td>
                                        </tr>
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