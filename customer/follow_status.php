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
    <title>หน้าหลักลูกค้า</title>
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
            <div class="row">
                <div class="col-12 mt-3">
                    <h4>ติดตามสถานะการซ่อม</h4>
                </div>
                <div class="row">
                    <div>
                        <form action="" method="GET">
                            <input type="search" name="search" required class="form-control" placeholder="กรอกรหัสใบแจ้งซ่อมที่ทางร้านให้มาเพื่อติดตามสถานะการซ่อม"> <br>
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> ติดตามสถานะการซ่อม</button>
                            <a href="follow_status.php" class="btn btn-warning text-white">เคลียร์ข้อมูล</a>
                        </form>
                        <?php
                        //ถ้ามีการส่ง $_GET['search'] 
                        if (isset($_GET['search'])) {
                            //คิวรี่ข้อมูลมาแสดงในตาราง
                            require_once '../config/connect.php';
                            //ประกาศตัวแปรรับค่าจากฟอร์ม
                            $search = "{$_GET['search']}";
                            $stmt = $conn->prepare("SELECT * FROM repair WHERE repair_id LIKE ?");
                            $stmt->execute([$search]);
                            $result = $stmt->fetchAll(); //แสดงข้อมูลทั้งหมด
                            //ถ้าเจอข้อมูลมากกว่า 0
                            if ($stmt->rowCount() > 0) {
                        ?>
                                <br>
                                <h3>รายการที่แสดง </h3>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example" class="table table-borderless dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th width="50%">ชื่อลูกค้า</th>
                                                    <th width="30%">สถานะ</th>
                                                    <th whidth="20"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result as $row) {
                                                ?>
                                                    <tr>
                                                        <td><?= $row['repair_name'] . ' ' . $row['repair_surname']; ?></td>
                                                        <td><?= $row['repair_status']; ?></td>
                                                        <td>
                                                            <form action="crud.php" method="POST">
                                                                <a href="view_repair.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-info text-white"><i class="fa-solid fa-square-pen"></i> ดูรายละเอียด</a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                        <?php } // if ($stmt->rowCount() > 0) {
                            else {
                                echo '<center> ไม่พบรายการการซ่อมที่ค้นหา !!! </center>';
                            }
                        } //isset 
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../navcus/footer.php' ?>
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