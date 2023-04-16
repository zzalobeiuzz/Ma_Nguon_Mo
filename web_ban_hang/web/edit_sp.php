<?php
session_start();
include("./connectdb.php");
include("./function.php");
if (isset($_POST["xoa"])) {
    $masp = $_POST["id"];
    $sql ="DELETE FROM san_pham WHERE ID='$masp'";
    mysqli_query($conn, $sql);
    echo '<script>alert("Xóa thành công")</script>';
    echo '<script>window.location = "kho_hang.php"</script>';
}
if (isset($_POST["edit"])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM san_pham WHERE ID='$id'";
    $query = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($query)) {
?>
        <table>
            <form method="POST" action="sua.php">
                <h1>Thay đổi sản phẩm</h1>
                <tr>
                    <td>Mã sản phẩm</td>
                    <td>:</td>
                    <td><?php echo $row['ID'] ?>
                        <input type="hidden" name="ma_sp" value="<?php echo $row['ID'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td>:</td>
                    <td><input type="text" name="ten_sp" placeholder="<?php echo $row['Ten_Sp'] ?>">
                        <input type="hidden" name="ten_sp_cu" value="<?php echo $row['Ten_Sp'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Giá sản phẩm</td>
                    <td>:</td>
                    <td><input type="text" name="gia" placeholder="<?php echo number_format($row['Gia'], 0, ',', '.') . ' VNĐ' ?>">
                        <input type="hidden" name="gia_cu" value="<?php echo $row['Gia'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Ảnh</td>
                    <td>:</td>
                    <td><input type="text" name="anh" placeholder="<?php echo $row['Anh'] ?>">
                        <input type="hidden" name="anh_cu" value="<?php echo $row['Anh'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Số lượng hàng còn trong kho</td>
                    <td>:</td>
                    <td><input type="text" name="sl" placeholder="<?php echo $row['sl_trongkho'] ?>">
                        <input type="hidden" name="sl_cu" value="<?php echo $row['sl_trongkho'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Mô tả sản phẩm</td>
                    <td>:</td>
                    <td><input type="text" name="mota" placeholder="<?php echo $row['Mo_ta_Sp'] ?>"></td>
                    <input type="hidden" name="mota_cu" value="<?php echo $row['Mo_ta_Sp'] ?>"></td>
                </tr>
                <tr>
                    <td>Bán chạy</td>
                    <td>:</td>
                    <td><select name="best">
                                        <option >------------Chọn------------</option>
                                        <option value="1">Bán chạy</option>
                                        <option value="0">Không bán chạy</option>
                                    </select>
                        <input type="hidden" name="best_cu" value="<?php echo $row['best'] ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><button name="ok">Xác nhận chỉnh sửa</button></td>
                </tr>
               
        </table>
           
<?php
    }
} ?>