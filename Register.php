<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/page.css" />
    <title>สมัครสมาชิก</title>
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
            <div class="col mb-3">
                <h3 class="signin-text mb-3">สมัครสมาชิก</h3>
                <form action="register_db.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="name_ct">ชื่อ</label>
                        <input type="text" name="name_ct" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="surname_ct">นามสกุล</label>
                        <input type="text" name="surname_ct" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email_ct">อีเมล</label>
                        <input type="email" name="email_ct" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone_ct">เบอร์โทรศัพท์</label>
                        <input type="text" name="phone_ct" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="address_ct">ที่อยู่</label>
                        <input type="text" name="address_ct" class="form-control" />
                    </div>
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
                    <div class="mb-3">
                        <button type="submit" name="Regis" class="btn btn-primary">สมัครสมาชิก</button>
                        <a href="Login-cus.php" class="btn btn-danger">ย้อนกลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/sheet.js"></script>
</body>

</html>