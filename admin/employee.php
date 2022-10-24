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
    <title>ข้อมูลพนักงาน</title>
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
                    <h4>ข้อมูลพนักงาน</h4>
                    <a href="add_employee.php" class="btn btn-outline-success"><i class="fa-solid fa-folder-plus"></i> เพิ่มข้อมูลพนักงาน</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3 mt-2">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-light"><i class="fa-solid fa-user-tie"></i> ตารางข้อมูลพนักงาน</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover dt-responsive nowrap data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>สถานะ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        require '../config/connect.php';
                                        $sql = "SELECT * FROM employee";
                                        $stmt = $conn->query($sql);
                                        while ($row = $stmt->fetch()) {
                                            $u_role = $row['u_role'];
                                        ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row['name_emp']; ?></td>
                                                <td><?= $row['surname_emp']; ?></td>
                                                <td><?= $row['phone_emp']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($u_role == 1) {
                                                        echo "<b style = 'background-color: green;border-radius: 5px;padding: 4px;color:white' >เจ้าของร้าน</b>";
                                                    } else if ($u_role == 2) {
                                                        echo "<b style = 'background-color: red;border-radius: 5px;padding: 4px;color:white' >พนักงาน</b>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <form action="crud.php" method="POST">
                                                        <a href="update_employee.php?employee_id=<?= $row['employee_id'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-square-pen"></i></a>
                                                        <button type="submit" name="delete_emp" value="<?= $row['employee_id'] ?>" onclick="return confirm('คุณต้องการลบหรือไม่');" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
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
    <script src="../js/sheet.js"></script>
</body>

</html>