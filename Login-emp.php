<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/page.css" />
    <title>เข้าสู่ระบบพนักงาน</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row content">
            <div class="col-md-4 mb-3">
                <img src="img/intermediary.png" class="img-fluid" alt="image">
            </div>
            <div class="col-md-8 mb-3">
                <h3 class="signin-text mb-3">เจ้าของร้าน&พนักงาน</h3>
                <form action="logindb_emp.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="username_emp">ชื่อผู้ใช้</label>
                        <input type="text" name="username_emp" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_emp">รหัสผ่าน</label>
                        <input type="password" name="password_emp" class="form-control">
                    </div>
                    <button class="btn btn-info" name="login_emp">เข้าสู่ระบบ</button>
                </form>
            </div>
        </div>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>