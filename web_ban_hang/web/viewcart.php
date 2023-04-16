<?php
session_start();
if (isset($_SESSION['cart'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./style-viewcart.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>

    <body>
        <h1>ĐƠN HÀNG CỦA BẠN</h1>
        <div class="boxcenter">
            <table style="border-collapse:collapse; ">
                <tr>
                    <th>ID</th>
                    <th>Mã sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
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
                            <td style="text-align:center"><a class="del" href="delcart.php?id=' . $i . '">Xóa</a></td>
                        </tr>';
                    $i++;
                }
                ?>
            </table>
        </div>
        <div class="tong">
            <a class="tong-don">Tổng đơn hàng</a>
            <a class="tong-thanh-tien"><?= number_format($tong, 0, ',', '.') . ' đ'; ?></a>
        </div>
        <div class="thao-tac">
            <li><a href="view.php"><button>Chọn thêm</button></a></li>
            <li><a href="delcart.php"><button>Xóa giỏ hàng</button></a></li>
            <li><a href="./confirm_order.php"><button>Đặt hàng</button></a></li>
        </div>
    </body>

    </html>
<?php
} else {
    echo '<br><br><a href ="view.php">Bạn chưa đặt hàng!<a>';
}
?>