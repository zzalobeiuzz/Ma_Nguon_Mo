<?php
include("./connectdb.php");
session_start();
if (isset($_POST["pay"])) {
    if ($_POST["tenkh"] == "" || $_POST["sdt"] == "" || $_POST["diachi"] == "" || $_POST["tt"]== "") {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin!!")</script>';
        echo '<script>window.location = "confirm_order.php"</script>';
    } else {
        $tenkh = $_POST["tenkh"];
        $sdt = $_POST["sdt"];
        $diachi = $_POST["diachi"];
        $tt = $_POST["tt"];
        $username = $_SESSION['username'];
        $sql = "select * from users where username = '$username'";
        $query = mysqli_query($conn, $sql);
        $ID_dh = rand(0, 9999);
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $id_kh = $row['ID_KH'];
            $name = $row['username'];
        }
        $insert_cart = "INSERT INTO don_hang(ma_dh,ma_kh,username_kh,ten_kh,sdt,diachi,pt_thanhtoan,trangthai_don) VALUES('" . $ID_dh . "','" . $id_kh . "','" . $name . "','" . $tenkh . "','" . $sdt . "','" . $diachi . "','" . $tt . "',1)";
        $cart_query = mysqli_query($conn, $insert_cart);
        if ($cart_query) {
            foreach ($_SESSION['cart'] as $sp) {
                $id_sp = $sp[0];
                $sl = $sp[4];
                $tensp = $sp[3];
                $insert_chitiet_giohang =  "INSERT INTO chitiet_donhang(ma_dh,ma_sp,ten_sp,sl) VALUES('" . $ID_dh . "','" . $id_sp . "','" . $tensp . "','" . $sl . "')";
                $cart_query = mysqli_query($conn, $insert_chitiet_giohang);
            }
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Đã đặt hàng thành công!!")</script>';
        echo '<script>window.location = "index.php"</script>';
    }
}
