<link rel="stylesheet" type="text/css" href="./style.css">
<div class="logo">
    <img class="logo" src="Anh_sp\logo2.png">
    <div class="search-bar">
        <form method="post" action="search.php">
            <input id="search" type="text" placeholder="Tìm kiếm" name="search">
            <button type="submit" id="search-box"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="login-cartshopping">
        <ul class="login">
            <li><a href="./form_login"><button id="login"><i class="fa-solid fa-user"></i></button></a></li>
            <?php
            if (isset($_SESSION['username']) && $_SESSION['username']) {
                echo "<li>Tài khoản: " . $_SESSION['username'] . "</li>";
                echo '<li><a href="./logout.php">Đăng xuất</a>';
                echo '/ ';
                echo '<a href="./form_change_pass.php">Đổi mật khẩu</a></li>';
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