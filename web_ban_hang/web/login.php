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
	<title>Trang đăng nhập</title>
</head>

<body>
	<?php
	//Gọi file connection.php ở bài trước
	require_once("./connectdb.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
		$username = $_POST["username"];
		$password = $_POST["password"];
		if ($username == "" || $password == "") {
			echo '<script>alert("username hoặc password bạn không được để trống!")</script>';
			echo '<script>window.location = "./form_login.php"</script>';
		} else {
			$sql = "select * from users where username = '$username' and password = '$password' ";
			$query = mysqli_query($conn, $sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows == 0) {
				echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng! Vui lòng đăng nhập lại!")</script>';
				echo '<script>window.location = "./form_login.php"</script>';
			} else {
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$_SESSION['username'] = $username;
				//kiểm tra quyền của người dùng
				$check_role = mysqli_query($conn, "select * from users where username = '$username' and role = 1");
				$check_role = mysqli_num_rows($check_role);
				if ($check_role) { 
					echo '<script>alert("Xin chào admin!!!")</script>';
					echo '<script>window.location = "admin.php"</script>';
				} else {
					echo '<script>window.location = "index.php"</script>';
				}
			}
		}
	}
	if (isset($_POST["btn_sign_up"])) {
		header('Location: ./form_signup.php');
	}
	?>
</body>

</html>