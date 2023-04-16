<!DOCTYPE html>
<?php
session_start();
include("./connectdb.php");
include("./function.php");
$sql = "Select * from san_pham where best = 1 ";
$all_sp = $conn->query($sql);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Trang chủ</title>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img class="logo" src="./Anh_sp/logo2.png">
            <div class="search-bar">
                <form method="post" action="search.php">
                    <input id="search" type="text" placeholder="Tìm kiếm" name="search">
                    <button type="submit" id="search-box"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="login-cartshopping">
                <ul class="login">
                    <li><a href="./form_login.php"><button id="login"><i class="fa-solid fa-user"></i></button></a></li>
                    <?php
                    if (isset($_SESSION['username']) && $_SESSION['username']) {
                        echo "<li>Tài khoản: " . $_SESSION['username'] . "</li>";
                        echo '<li><a href="./logout.php">Đăng xuất</a>';
                        echo '/ ';
                        echo '<a href="form_change_pass.php">Đổi mật khẩu</a></li>';
                        $username = $_SESSION['username'];
                        $check_role = mysqli_query($conn, "select * from users where username = '$username' and role = 1");
                        $check_role = mysqli_num_rows($check_role);
                        if ($check_role) {
                            echo '<li><a href="admin.php">Giao diện admin</a>';
                        } 
                    } else {
                        echo '<a href="./form_login.php">Đăng nhập/</a>
                                  <a href="./form_signup.php">Đăng ký</a>';
                    }
                    ?>
                </ul>
                <ul class="gio-hang">
                    <a href="./viewcart.php">
                        <li><button id="gio-hang"><i class="fa-solid fa-cart-shopping"></i></button></li>
                        <li>Giỏ hàng
                            <?php
                            sl_don();
                            ?>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="menu">
            <li><a href="index.php"><button id="home"><i class="fa-solid fa-house"></i></button></a></li>
            <li><a href="view.php">SẢN PHẨM</a></li>
            <li><a href="">THƯƠNG HIỆU</a></li>
            <li><a href="">KHUYẾN MÃI</a></li>
            <li><a href="">XU HƯỚNG LÀM ĐẸP</a></li>
            <li><a href="tracuu_dh.php">TRA CỨU ĐƠN HÀNG</a></li>
            <li><a href="">LIÊN HỆ</a></li>
        </div>
        <div class="noidung">
            <?php
            if ($_SESSION['keyword'] != "") {
                $keyword = $_SESSION['keyword'];
                $sql = "SELECT * FROM san_pham WHERE Ten_Sp LIKE '%" . $keyword . "%'";
                $query = mysqli_query($conn, $sql);
                echo '<p class="kq-text">Kết quả tìm kiếm: ' . $keyword . '<p>'; ?>
                <div class="kq">
                    <?php
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <div class="kq-tk">
                            <form method="POST" action="addtocart.php">
                                <div class="img-kq">
                                    <input type="hidden" name="idsp" value="<?php echo $row['ID']; ?>">
                                    <img src="./Anh_sp/<?php echo $row['Anh']; ?>" alt="">
                                    <input type="hidden" name="anhsp" value="./Anh_sp/<?php echo $row['Anh']; ?>">
                                </div>
                                <div class="info-best-sp">
                                    <p class="name"><?php echo $row['Ten_Sp']; ?></p>
                                    <input type="hidden" name="tensp" value="<?php echo $row['Ten_Sp']; ?>">
                                    <p class="price"><?php echo number_format($row['Gia'], 0, ',', '.') . ' VNĐ' ?></p>
                                    <input type="hidden" name="giasp" value="<?php echo $row['Gia']; ?>">
                                </div>
                                <div class="add-cart">
                                    <button type="submit" name="addto-cart"><i class="fa-solid fa-bag-shopping"></i></button>
                                </div>
                            </form>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="slideshow-container">

                        <div class="mySlides fade">

                            <img src="./Anh_sp/img3.jpg" style="width:100%">
                        </div>

                        <div class="mySlides fade">

                            <img src="./Anh_sp/img1.jpg" style="width:100%">
                        </div>

                        <div class="mySlides fade">

                            <img src="./Anh_sp/img2.jpg" style="width:100%">
                        </div>
                        <div style="text-align:center">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                    <br>
                    <div class="content">
                        <p>BEST SELLER</p>
                        <div class="sp-ban-chay">
                            <?php
                            while ($row = mysqli_fetch_assoc($all_sp)) {
                            ?>

                                <div class="best-sp">
                                    <form method="POST" action="addtocart.php">
                                        <div class="img-best-sp">
                                            <input type="hidden" name="idsp" value="<?php echo $row['ID']; ?>">
                                            <img src="./Anh_sp/<?php echo $row['Anh']; ?>" alt="">
                                            <input type="hidden" name="anhsp" value="./Anh_sp/<?php echo $row['Anh']; ?>">
                                        </div>
                                        <div class="info-best-sp">
                                            <p class="name"><?php echo $row['Ten_Sp']; ?></p>
                                            <input type="hidden" name="tensp" value="<?php echo $row['Ten_Sp']; ?>">
                                            <p class="price"><?php echo number_format($row['Gia'], 0, ',', '.') . ' VNĐ' ?></p>
                                            <input type="hidden" name="giasp" value="<?php echo $row['Gia']; ?>">
                                        </div>
                                        <div class="add-cart">
                                            <button type="submit" name="addto-cart"><i class="fa-solid fa-bag-shopping"></i></button>
                                        </div>
                                    </form>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            ?>
                </div>
            
            <div class="footer">
                <ul class="info">
                    <div class="cot-1">
                        <li>
                            <h2>VỀ CHÚNG TÔI</h2>
                        </li>
                        <li><a href="">Giấy phép kinh doanh</a></li>
                        <li><a href="">Chính sách bảo hành</a></li>
                        <li><a href="">Chính sách giao hàng</a></li>
                        <li><a href="">Chính sách bảo mật</a></li>
                    </div>
                    <div class="cot-2">
                        <li>
                            <h2>HỆ THỐNG CỬA HÀNG</h2>
                        </li>
                        <li>Địa chỉ 1: 378 Trần Thủ Độ</li>
                        <li>Địa chỉ 2: 378 Trần Thủ Độ</li>
                        <li>Địa chỉ 3: 378 Trần Thủ Độ</li>
                    </div>
                    <div class="cot3">
                        <li>
                            <h2>HỖ TRỢ TƯ VẤN KHÁCH HÀNG</h2>
                        </li>
                        <div class="link">
                            <li><a href="https://www.facebook.com/"><button id="facebook"><i class="fa-brands fa-facebook"></i></button>Facebook</a></li>
                            <li><i id="hotline" class="fa-solid fa-phone-volume"></i>0334383068</li>
                        </div>
                    </div>
                </ul>
            </div>
            <script>
                let slideIndex = 0;
                showSlides();

                function showSlides() {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                    setTimeout(showSlides, 2000); // Change image every 2 seconds
                }
            </script>

</body>

</html>