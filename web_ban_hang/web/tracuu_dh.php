<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style_donhang.css">
    <title>Quản lý đơn hàng</title>
</head>
<?php
session_start();
include("./connectdb.php");
include("./function.php");
if (isset($_SESSION['username']) && $_SESSION['username']) {
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM don_hang WHERE username_kh = '$username'";
    $all_dh = $conn->query($sql);
} ?>
<body>
    <div class="boxcenter">
        <table style="border-collapse:collapse; ">

            <h1>TRA CỨU ĐƠN HÀNG</h1>
<tr class="tt">
    <th>Mã đơn hàng</th>
    <th>Mã khách hàng</th>
    <th>Tên khách hàng</th>
    <th>Sđt</th>
    <th>Địa chỉ</th>
    <th>Phương thức thanh toán</th>
    <th>Trạng thái</th>
</tr>
<?php
while ($row = mysqli_fetch_assoc($all_dh)) {
?>

    <form method="POST" action="">
        <tr>
            <td><?php echo $row['ma_dh'] ?><input type="hidden" name="ma_dh" value="<?php echo $row['ma_dh'] ?>"></td>
            <td><?php echo $row['ma_kh'] ?></td>
            <td><?php echo $row['ten_kh'] ?></td>
            <td><?php echo $row['sdt'] ?></td>
            <td><?php echo $row['diachi'] ?></td>
            <td><?php echo $row['pt_thanhtoan'] ?></td>
            <td><?php
                if ($row['trangthai_don'] == 1) {
                    echo 'Chưa xác nhận'; ?>
        <?php
                } else if ($row['trangthai_don'] == 0) {
                    echo 'Đã xác nhận';
                }
        ?>


    </form>
   
<?php
}
?>
 </table>


</div>
<a href="index.php"><button>Quay lại</button></a>