<?php
session_start();
include("./connectdb.php");
include("./function.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style_khohang.css">
    <title>Thêm sản phẩm</title>
</head>
<?php
if (isset($_POST["ok"])) {
    $masp = $_POST["ma_sp"];
    $tensp = $_POST["ten_sp"];
    $gia = $_POST["gia"];
    $anh = $_POST["anh"];
    $sl = $_POST["sl"];
    $mota = $_POST["mota"];
    $best = $_POST["best"];
    if($masp==""||$tensp==""||$gia==""||$anh==""||$sl==""||$mota==""||$best=""){
        echo '<script>alert("Nhập thiếu thông tin")</script>';
        echo '<script>window.location = "them.php"</script>';
    }
    $sql = "INSERT INTO san_pham(ID,Ten_Sp,Gia,Anh,sl_trongkho,Mo_ta_Sp,best) VALUES('$masp','$tensp','$gia','$anh','$sl','$mota','$best')";
    mysqli_query($conn, $sql);
                echo '<script>alert("Thêm sản phẩm thành công")</script>';
                echo '<script>window.location = "kho_hang.php"</script>';
}
    ?>
<table class="them" style="border-collapse:collapse; ">
            <form method="POST">
                <h1>Thêm sản phẩm</h1>
                <tr>
                    <td>Mã sản phẩm</td>
                    <td>:</td>
                    <td><input type="text" name="ma_sp"></td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td>:</td>
                    <td><input type="text" name="ten_sp"></td>
                </tr>
                <tr>
                    <td>Giá sản phẩm</td>
                    <td>:</td>
                    <td><input type="text" name="gia"></td>
                </tr>
                <tr>
                    <td>Ảnh</td>
                    <td>:</td>
                    <td><input type="text" name="anh"></td>
                </tr>
                <tr>
                    <td>Số lượng hàng còn trong kho</td>
                    <td>:</td>
                    <td><input type="text" name="sl"></td>
                </tr>
                <tr>
                    <td>Mô tả sản phẩm</td>
                    <td>:</td>
                    <td><input id="mota" type="text" name="mota">
                </tr>
                <tr>
                    <td>Bán chạy</td>
                    <td>:</td>
                    <td><select name="best">
                                        <option >------------Chọn------------</option>
                                        <option value="1">Bán chạy</option>
                                        <option value="0">Không bán chạy</option>
                                    </select>
                </tr>
                <tr>
                    
                    <td class="bt"colspan="3"><button name="ok">Xác nhận</button></td>
                </tr>
               
        </table>