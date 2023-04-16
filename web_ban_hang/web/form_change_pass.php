<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("./connectdb.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Đổi mật khẩu</title>
</head>

<body>
    <form method="post" action="change_pass.php">
        <div class="container" style="width: 370px">
            <legend class="text-center">Đổi mật khẩu</legend>
            <div class="form-group">
                <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">

                <label class="fw-semibold fs-5">Mật khẩu hiện tại</label>
                <input type="password" class="form-control text-center" name="password" size="30" placeholder="Nhập mật khẩu"><br>

                <label class="fw-semibold fs-5">Mật khẩu mới</label>
                <input type="password" class="form-control text-center" name="new_password" size="30" placeholder="Nhập mật khẩu mới"><br>

                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary xac-nhan" name="btn_submit" value="Xác nhận">
                    <input type="submit" class="btn btn-primary dang-ki-nhap" name="btn_sign_up" value="Quay trở lại">
                </div>
            </div>
    </form>
</body>

</html>