<!DOCTYPE html>
<?php
session_start();
include("./connectdb.php");
include("./function.php");
$sql = "Select * from don_hang";
$all_dh = $conn->query($sql);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style_donhang.css">
    <title>Quản lý đơn hàng</title>
</head>

<body>
    <div class="boxcenter">
        <table style="border-collapse:collapse; ">

            <h1>QUẢN LÝ ĐƠN HÀNG</h1>
            <?php
            if (isset($_POST["submit"])) {
                $ma_dh = $_POST['ma_dh'];
                $sql_1 = "UPDATE don_hang SET trangthai_don ='0' WHERE ma_dh = '$ma_dh'";
                mysqli_query($conn, $sql_1);

                $sql_2 = "SELECT * FROM chitiet_donhang WHERE ma_dh = '$ma_dh'";
                $query_2 = $conn->query($sql_2);
                while ($row_2 = mysqli_fetch_assoc($query_2)) {
                    $ma_sp_2 = $row_2['ma_sp'];
                    $sl_2 = $row_2['sl'];
                    $sql_3 = "SELECT * FROM san_pham WHERE ID = '$ma_sp_2'";
                    $query_3 = $conn->query($sql_3);
                    while ($row_3 = mysqli_fetch_assoc($query_3)) {
                        $sl_3 = $row_3['sl_trongkho'];
                        $sl_update = $sl_3 - $sl_2;
                        $update = mysqli_query($conn, "UPDATE san_pham SET sl_trongkho = '$sl_update'WHERE ID='$ma_sp_2'");
                    }
                }
                header("location: view_order.php");
            }
            if (isset($_POST["xoa"])) {
                $ma_dh = $_POST['ma_dh'];
                $sql = "DELETE FROM don_hang WHERE ma_dh='$ma_dh'";
                mysqli_query($conn, $sql);
                echo '<script>alert("Xóa thành công")</script>';
                echo '<script>window.location = "view_order.php"</script>';
            }

            ?>
            <tr class="tt">
                <th>Mã đơn hàng</th>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Sđt</th>
                <th>Địa chỉ</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái</th>
                <th>Xác nhận đơn hàng</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($all_dh)) {
            ?>
                <form method="POST" action="view_order.php">
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
                        <td><button name="submit">Xác nhận</button></td>
                    <?php
                            } else if ($row['trangthai_don'] == 0) {
                                echo 'Đã xác nhận';
                                echo '<td><button class="xoa" name="xoa">Xóa</button></td>';
                            }
                    ?>


                </form>

            <?php
            }
            ?>

        </table>

        <a href="admin.php"><button>Quay lại</button></a>
    </div>
</body>

</html>