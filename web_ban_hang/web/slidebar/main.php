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