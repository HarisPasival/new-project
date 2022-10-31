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
  <?php include '../navemp/navbar.php' ?>
  <!-- navbar -->
  <!-- sidebar -->
  <?php include '../navemp/sidebar.php' ?>
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
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-warning text-dark h-100">
            <div class="card-body py-5">Warning Card</div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-success text-white h-100">
            <div class="card-body py-5">Success Card</div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-danger text-white h-100">
            <div class="card-body py-5">Danger Card</div>
          </div>
        </div>
      </div>
    </div>

    <?php include '../navemp/footer.php' ?>
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