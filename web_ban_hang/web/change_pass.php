<?php
require_once("./connectdb.php");
if (isset($_POST["btn_submit"])) {
	// lấy thông tin người dùng
	$username = $_POST["username"];
	$password = $_POST["password"];
	$newpass = $_POST["new_password"];
	if ($password == "" || $newpass == "") {
		echo '<script>alert("Vui lòng điền đủ thông tin!")</script>';
		echo '<script>window.location = "form_change_pass.php"</script>';
	} else {
		$sql = "select * from users where username = '$username' and password = '$password' ";
		$query = mysqli_query($conn, $sql);
		$num_rows = mysqli_num_rows($query);
		echo $username;
		if ($num_rows == 0) {

			echo '<script>alert("Mật khẩu không đúng!")</script>';
			echo '<script>window.location = "form_change_pass.php"</script>';
		} else {
			$sql_update = mysqli_query($conn, "UPDATE users SET password ='" . $newpass . "' WHERE username= '$username'");
			$_SESSION['username'] = $username;
			echo '<script>alert("Đã thay đổi mật khẩu!")</script>';
			//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
			//kiểm tra quyền của người dùng
			$check_role = mysqli_query($conn, "select * from users where username = '$username' and role = 1");
			$check_role = mysqli_num_rows($check_role);
			if ($check_role) {
				echo '<script>window.location = "admin.php"</script>';
			} else {
				echo '<script>window.location = "index.php"</script>';
			}
		}
	}
}
if (isset($_POST["btn_sign_up"])) {
	header('Location: index.php');
}
?>