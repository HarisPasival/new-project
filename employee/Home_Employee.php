<?php
session_start();
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
  <title>หน้าหลัก</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

    * {
      font-family: 'Kanit', sans-serif;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <a class="navbar-brand me-auto ms-lg-0 ms-3 fw-bold" href="#">Khawna Phasoob</a>
    </div>
  </nav>
  <!-- navbar -->
  <!-- sidebar -->
  <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <li class="mt-3">
            <div class="text-muted small fw-bold px-3">
              แดชบอร์ด
            </div>
          </li>
          <li>
            <a href="Home_Employee.php" class="nav-link active px-3 mt-3 my-3">
              <span class="me-2"><i class="fa-solid fa-table-columns"></i></span>
              <span>หน้าหลัก</span>
            </a>
          </li>
          <li>
            <div class="text-muted small fw-bold px-3 mb-3">
              จัดการรับซ่อม
            </div>
          </li>
          <li>
            <a href="add_repair.php" class="nav-link px-3">
              <span class="me-2"><i class="fa-solid fa-screwdriver-wrench"></i></span>
              <span>เพิ่มรายการซ่อม</span>
            </a>
          </li>
          <li>
            <a href="repair.php" class="nav-link px-3">
              <span class="me-2"><i class="fa-solid fa-toolbox"></i></span>
              <span>รายการซ่อมทั้งหมด</span>
            </a>
          </li>
          <li>
            <div class="text-muted small fw-bold px-3 mb-3 my-3">
              ข้อมูลรายการส่งมอบ
            </div>
          </li>
          <li>
            <a href="return_repair.php" class="nav-link px-3">
              <span class="me-2"><i class="fa-solid fa-rotate-left"></i></span>
              <span>รายการที่ส่งมอบแล้ว</span>
            </a>
          </li>
          <li>
            <div class="text-muted small fw-bold px-3 mb-3 my-3">
              โปรไฟล์
            </div>
          </li>
          <li>
            <a href="profile_emp.php" class="nav-link px-3">
              <span class="me-2"><i class="fa-solid fa-user-pen"></i></span>
              <span>แก้ไขข้อมูลส่วนตัว</span>
            </a>
          </li>
          <li>
            <div class="text-muted small fw-bold px-3 mb-3 my-3">
              รายงาน
            </div>
          </li>
          <li>
            <a href="#" class="nav-link px-3">
              <span class="me-2"><i class="fa-solid fa-flag"></i></span>
              <span>รายงานการรับซ่อม</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link px-3">
              <span class="me-2"><i class="fa-solid fa-flag"></i></span>
              <span>รายงานการส่งมอบฝาสูบ</span>
            </a>
          </li>
          <li>
            <a href="../Logout.php" class="nav-link px-3">
              <span class="me-2"><i class="fa-solid fa-right-from-bracket" style="color: red;"></i></span>
              <span>ออกจากระบบ</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- sidebar -->
  <!-- content -->
  <main class="mt-5 pt-3">
    <div class="container-fluid">
      <?php
      if (isset($_SESSION['Emp_login'])) {
        $emp_id = $_SESSION['Emp_login'];
        $stmt = $conn->query("SELECT * FROM employee WHERE employee_id = $emp_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
      }
      ?>
      <div class="row">
        <div class="col-md-12">
          <h4>Dashboard : <?php echo $row['name_emp'] . ' ' . $row['surname_emp'] ?></h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-white h-100">
            <div class="card-body py-5">Primary Card</div>
            <div class="card-footer d-flex">
              View Details
              <span class="ms-auto">
                <i class="fa-solid fa-circle-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-warning text-dark h-100">
            <div class="card-body py-5">Warning Card</div>
            <div class="card-footer d-flex">
              View Details
              <span class="ms-auto">
                <i class="fa-solid fa-circle-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-success text-white h-100">
            <div class="card-body py-5">Success Card</div>
            <div class="card-footer d-flex">
              View Details
              <span class="ms-auto">
                <i class="fa-solid fa-circle-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-danger text-white h-100">
            <div class="card-body py-5">Danger Card</div>
            <div class="card-footer d-flex">
              View Details
              <span class="ms-auto">
                <i class="fa-solid fa-circle-right"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
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