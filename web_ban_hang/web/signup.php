<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng ký thành viên</title>
</head>

<body>
    <?php
    //Gọi file connection.php ở bài trước
    require_once("./connectdb.php");
    if (isset($_POST["btn_submit"])) {
        //lấy thông tin từ các form bằng phương thức POST
        $username = trim($_POST["username"]);
        $name = trim($_POST["name"]);
        $password = trim($_POST["password"]);
        $email = trim($_POST["email"]);
        $address = trim($_POST["address"]);

        //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
        if ($username == "" || $name == "" || $password == "" || $email == "") {
            echo "bạn vui lòng nhập đầy đủ thông tin";
        } else {
            $sql = "select * from users where username = '$username'";
            $query = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows > 0) {
                echo '<script>alert("Tài khoản đã tồn tại")</script>';
                echo '<script>window.location = "form_signup.php"</script>';
            } else {
                // // Kiểm tra username hoặc email có bị trùng hay không
                // $sql = "SELECT * FROM user WHERE username = '$username';
                //thực hiện việc lưu trữ dữ liệu vào db
                $sql = " INSERT INTO users(username,name,password,email,address) VALUES ('$username','$name','$password','$email','$address')";
                // thực thi câu $sql với biến conn lấy từ file connection.php
                mysqli_query($conn, $sql);
                echo '<script>alert("Chúc mừng bạn đã đăng ký thành công")</script>';
                echo "<a href = 'form_login.php'>Đăng nhập tài khoản.</a><br>";
                echo "<a href = 'index.php'>Về trang chủ</a>";
            }
        }
    }

    if (isset($_POST["btn_sign_in"])) {
        header('Location: form_login.php');
    }

    ?>
</body>

</html>