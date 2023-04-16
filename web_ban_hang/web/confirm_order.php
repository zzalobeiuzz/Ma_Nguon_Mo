<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("./connectdb.php");
if (isset($_SESSION['username']) && $_SESSION['username']) {
    if (isset($_SESSION['cart'])) {
?>

        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="./style_pay.css">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title></title>
        </head>

        <body>
            <h1>ĐẶT HÀNG</h1>
            <div class="boxcenter">
                <table class="don" style=" border-collapse:collapse; ">
                    <tr>
                        <th>ID</th>
                        <th>Mã sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                    $tong = 0;
                    $i = 0;
                    foreach ($_SESSION['cart'] as $sp) {
                        $ttien = $sp[3] * $sp[4];
                        $tong += $ttien;
                        echo '<tr>
                            <td class="id">' . ($i + 1) . '</td>
                            <td class ="ma-sp">' . $sp[0] . '</td>
                            <td><img src="' . $sp[1] . '" width="100"></td>
                            <td>' . $sp[2] . '</td>
                            <td class ="gia">
                                <a href="addtocart.php?cong=' . $sp[0] . '"><i class="fa-solid fa-circle-plus"></i></a>
                                ' . number_format($sp[3], 0, ',', '.') . ' đ' . '
                                <a href="addtocart.php?tru=' . $sp[0] . '"><i class="fa-solid fa-circle-minus"></i></a></td>
                            <td class="sl">' . $sp[4] . '</td>
                            <td>' . number_format($ttien, 0, ',', '.') . ' đ' . '</td>
                        </tr>';
                        $i++;
                    }
                    ?>
                </table>
                <div class="thongtin">
                    <form method="post" action="pay.php">
                        <table class="thongtin_gh">
                            <tr>
                                <td class="tt" colspan="3" style="text-align: center;">Thông tin đặt hàng</td>
                            </tr>
                            <tr>
                                <td>Tên khách hàng</td>
                                <td>:</td>
                                <td><input type="text" name="tenkh"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại liên hệ</td>
                                <td>:</td>
                                <td><input type="text" name="sdt"></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ giao hàng</td>
                                <td>:</td>
                                <td><input type="text" name="diachi"></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="tong">
                                        <a class="tong-don">Tổng đơn hàng</a>
                                        <a class="tong-thanh-tien"><?= number_format($tong, 0, ',', '.') . ' đ'; ?></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Chọn phương thức thanh toán</label></td>
                                <td>:</td>
                                <td>
                                    <select name="tt">
                                        <option >------------Chọn------------</option>
                                        <option value="Tiền mặt">Tiền mặt</option>
                                        <option value="Chuyển khoản">Chuyển tiền bằng tài khoản</option>
                                        <option value="Momo">Ví điện tử Momo</option>
                                    </select>
                                </td>
                            </tr>
                            <td></td>
                            <td></td>
                            <td>
                                <input type="submit" name="pay" value="Thanh toán">
                            </td>
                        </table>
                    </form>
                    <a href="./viewcart.php"><button>Quay lại</button></a>
                </div>
            </div>
        </body>

</html>
<?php
    } else {
        echo '<br><br><a href ="view.php">Bạn chưa đặt hàng!<a>';
    }
} else {
    echo '<script>alert("Vui lòng đăng nhập tài khoản trước khi ") </script>';
    echo '<script>window.location = "form_login.php"</script>';
}
?>