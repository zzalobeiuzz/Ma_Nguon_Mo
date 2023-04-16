<?php
function sl_don()
{

    $dh = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $sp)
            $dh += $sp[4];
        if ($dh > 0)
            echo ': '.$dh;
    }
}
?>