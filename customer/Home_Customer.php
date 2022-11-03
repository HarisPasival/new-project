<?php
session_start();
if (!isset($_SESSION['login_cus'])) {
    header('location: ../Login-cus.php');
}
require '../config/connect.php';
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
            <?php
            if (isset($_SESSION['login_cus'])) {
                $cus_id = $_SESSION['login_cus'];
                $stmt = $conn->query("SELECT * FROM customer WHERE customer_id = $cus_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <h4 class="text-white"><i class="fa-solid fa-circle-user"></i> <?php echo $row['name_ct'] . ' ' . $row['surname_ct'] ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 mt-3">
                                <h4>ติดตามสถานะการซ่อม</h4>
                            </div>
                            <div class="row">
                                <div>
                                    <form action="" method="GET">
                                        <div class="form-floating mb-3">
                                            <input type="search" name="search" class="form-control" id="floatingInput" placeholder="กรอกรหัสใบแจ้งซ่อมที่ทางร้านให้มาเพื่อติดตามสถานะการซ่อม" required>
                                            <label for="floatingInput">ติดตามสถานะ</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> ติดตามสถานะการซ่อม</button>
                                        <a href="Home_Customer.php" class="btn btn-warning text-white">เคลียร์ข้อมูล</a>
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
                                            <div class="card">
                                                <div class="card-body">
                                                    <table id="example" class="table table-borderless dt-responsive nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th width="20%">วันที่แจ้งซ่อม</th>
                                                                <th width="25%">ชื่อลูกค้า</th>
                                                                <th width="20%">สถานะการซ่อม</th>
                                                                <th width="15%">สถานะการชำระเงิน</th>
                                                                <th whidth="15%"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($result as $row) {
                                                                $repair_status = $row['repair_status'];
                                                                $payment_status = $row['payment_status'];
                                                            ?>
                                                                <tr>
                                                                    <td><?= $row['repair_date']; ?></td>
                                                                    <td><?= $row['repair_name'] . ' ' . $row['repair_surname']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        if ($repair_status == 1) {
                                                                            echo "<b style = 'background-color: yellow;border-radius: 5px;padding: 5px;color:black' >รอยืนยันการซ่อม</b>";
                                                                        } else if ($repair_status == 2) {
                                                                            echo "<b style = 'background-color: lime;border-radius: 5px;padding: 5px;color:black' >ยืนยันแล้ว</b>";
                                                                        } else if ($repair_status == 3) {
                                                                            echo "<b style = 'background-color: Orange;border-radius: 5px;padding: 5px;color:black' >กำลังซ่อม</b>";
                                                                        } else if ($repair_status == 4) {
                                                                            echo "<b style = 'background-color: green;border-radius: 5px;padding: 5px;color:white' >ซ่อมเสร็จแล้ว</b>";
                                                                        } else if ($repair_status == 5) {
                                                                            echo "<b style = 'background-color: DodgerBlue;border-radius: 5px;padding: 5px;color:black' >ส่งมอบเรียบร้อย</b>";
                                                                        } else if ($repair_status == 6) {
                                                                            echo "<b style = 'background-color: red;border-radius: 5px;padding: 5px;color:black' >ยกเลิก</b>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($payment_status == 1) {
                                                                            echo "<b style = 'background-color: yellow;border-radius: 5px;padding: 5px;color:black; font-size: 15px' >ค้างชำระเงิน</b>";
                                                                        } else if ($payment_status == 2) {
                                                                            echo "<b style = 'background-color: lime;border-radius: 5px;padding: 5px;color:black; font-size: 15px' >ชำระเงินเรียบร้อยแล้ว</b>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <form action="crud.php" method="POST">
                                                                            <a href="view_repair.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-info btn-sm text-white"><i class="fa-solid fa-square-pen"></i> ดูรายละเอียด</a>
                                                                            <a href="payment_repair.php?repair_id=<?= $row['repair_id'] ?>" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-square-pen"></i> ใบเสร็จ</a>
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