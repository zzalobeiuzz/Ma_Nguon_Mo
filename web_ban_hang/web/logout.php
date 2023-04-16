<?php 
session_start(); 
 
if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session login
    echo '<script>alert("Bạn đã đăng xuất thành công") </script>';
    echo '<script>window.location = "index.php"</script>';
}
?>