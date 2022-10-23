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
    <title>ข้อมูลอะไหล่</title>
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
                    <h4>ข้อมูลอะไหล่</h4>
                    <!-- <a href="add_spares.php" class="btn btn-outline-success"><i class="fa-solid fa-folder-plus"></i> เพิ่มข้อมูลอะไหล่</a> -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addspareModal">
                        <i class="fa-solid fa-folder-plus"></i> เพิ่มข้อมูลอะไหล่
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addspareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลอะไหล่</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="crud.php" method="POST" class="row g-3">
                                        <div class="col-md-6 mb-3">
                                            <label>ชื่ออะไหล่:</label>
                                            <input type="text" name="spare_name" class="form-control" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>รุ่นฝาสูบ</label>
                                            <input type="text" name="model_name" class="form-control" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>จำนวน:</label>
                                            <input type="number" name="spare_quanlity" min="1" class="form-control" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>ราคา:</label>
                                            <input type="text" name="spare_price" class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="add_spare" class="btn btn-outline-success"><i class="fa-solid fa-circle-plus"></i> เพิ่มข้อมูล</button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="fa-solid fa-caret-left"></i> ย้อนกลับ</button>
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
                            <span class="text-light"><i class="fa-solid fa-car-rear"></i> ตารางข้อมูลอะไหล่</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover dt-responsive nowrap data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่ออะไหล่</th>
                                            <th>รุ่นฝาสูบ</th>
                                            <th>จำนวน</th>
                                            <th>ราคา</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        require '../config/connect.php';
                                        $sql = "SELECT * FROM spare";
                                        $stmt = $conn->query($sql);
                                        while ($row = $stmt->fetch()) {
                                        ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row['spare_name']; ?></td>
                                                <td><?= $row['model_name']?></td>
                                                <td><?= $row['spare_quanlity']; ?></td>
                                                <td><?= $row['spare_price']; ?></td>
                                                <td>
                                                    <form action="crud.php" method="POST">
                                                        <a href="update_spare.php?spare_id=<?= $row['spare_id'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-square-pen"></i></a>
                                                        <button type="submit" name="delete_spare" value="<?= $row['spare_id'] ?>" onclick="return confirm('คุณต้องการลบหรือไม่');" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
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
</body>

</html>