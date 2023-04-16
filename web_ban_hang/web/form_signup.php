<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Đăng kí</title>
</head>

<body>
    <form action="./signup.php" method="post">
        <div class="container" style="width: 370px">
            <legend class="text-center">Đăng kí tài khoản</legend>
            <div class="form-group">
                <label class="fw-semibold fs-5">Tài khoản</label>
                <input type="text" class="form-control text-center" name="username" size="30"><br>
                <label class="fw-semibold fs-5">Họ tên</label>
                <input type="text" class="form-control text-center" name="name" size="30"><br>
                <label class="fw-semibold fs-5">Mật khẩu</label>
                <input type="password" class="form-control text-center" name="password" size="30"><br>

                <label class="fw-semibold fs-5">Email</label>
                <input type="text" class="form-control text-center" name="email" size="30"><br>
                <label class="fw-semibold fs-5">Địa chỉ</label>
                <input type="text" class="form-control text-center" name="address" size="30"><br>

                <div class="d-flex justify-content-center dang-ki">
                    <input type="submit" class="btn btn-primary xac-nhan" name="btn_submit" value="Xác nhận">
                    <input type="submit" class="btn btn-primary dang-ki-nhap" name="btn_sign_in" value="Đã có tài khoản">
                </div>
            </div>

    </form>
</body>

</html>