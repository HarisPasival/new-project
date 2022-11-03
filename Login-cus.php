<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/page.css" />
    <title>เข้าสู่ระบบลูกค้า</title>
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
                <img src="img/client.png" class="img-fluid" alt="image">
            </div>
            <div class="col-md-8 mb-3">
                <h3 class="signin-text mb-3">ลูกค้า</h3>
                <form action="logindb_ct.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="username_ct">ชื่อผู้ใช้</label>
                        <input type="text" name="username_ct" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_ct">รหัสผ่าน</label>
                        <input type="password" name="password_ct" id="myPassword" class="form-control">
                    </div>
                    <div class="form-floating col-12 mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="passShow()">
                            <label>แสดงรหัสผ่าน</label>
                        </div>
                    </div>
                    <button class="btn btn-info" name="login_ct">เข้าสู่ระบบ</button>
                    <a href="Register.php" class="btn btn-primary">สมัครสมาชิก</a>
                </form>
            </div>
        </div>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/sheet.js"></script>
</body>

</html>