<!DOCTYPE html>
<?php
session_start();
include("./connectdb.php");
include("./function.php");
$sql = "Select * from san_pham";
$all_sp = $conn->query($sql);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style_khohang.css">
    <title>Kho hàng</title>
</head>

<body>
    <h1>Quản lý kho hàng</h1>
    <table style="border-collapse:collapse; ">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Ảnh</th>
            <th>Số lượng hàng còn trong kho</th>
            <th>Mô tả sản phẩm</th>
            <th>Sản phẩm bán chạy</th>
            <th>Chỉnh sửa đơn hàng</th>
            <th>Xóa</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($all_sp)) {
        ?>

            <form method="POST" action="edit_sp.php">
                <tr>
                    <td class="id">
                        <?php echo $row['ID'] ?>
                        <input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
                    </td>
                    <td><?php echo $row['Ten_Sp'] ?></td>
                    <td><?php echo number_format($row['Gia'], 0, ',', '.') . ' VNĐ' ?></td>
                    <td style="width: 200px"><img style="width: 80%;" src="./Anh_sp/<?php echo $row['Anh']; ?>"></td>
                    <td><?php echo $row['sl_trongkho'] ?></td>
                    <td ><?php echo $row['Mo_ta_Sp'] ?></td>
                    <td><?php
                        if ($row['best'] == 1) {
                            echo 'Bán chạy'; ?>
                        <?php
                        }
                        ?></td>
                    <td class="chinhsua">
                        <button name="edit">Chỉnh sửa</button>
                    </td>
                    <td> <button name="xoa">Xóa</button></td>
                </tr>
            </form>
            </div>

        <?php
        }
        ?>
    </table>
    <a href="them.php"><button>Thêm sản phẩm</button></a>
    <a href="admin.php"><button>Quay lại</button></a>
</html>