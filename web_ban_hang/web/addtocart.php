<?php
session_start();
ob_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
$sl = 1;
$i = 0;
$a = 0;
////thao tác cộng số lượng trong view giỏ hàng
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    foreach ($_SESSION['cart'] as $sp) {
        if ($sp[0] == $id) {
            //cập nhập số lượng
            $sl += $sp[4];
            $a = 1;
            //cập nhập số lượng vào giỏ hàng
            $_SESSION['cart'][$i][4] = $sl;
            break;
        }
        $i++;
    }
    header('location:viewcart.php');
}

//thao tác trừ số lượng trong view giỏ hàng
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach ($_SESSION['cart'] as $sp) {
        if ($sp[0] == $id) {
            if ($sp[4] > 1) {
                //cập nhập số lượng
                $sp[4] -= $sl;
                $a = 1;
                //cập nhập số lượng vào giỏ hàng
                $_SESSION['cart'][$i][4] = $sp[4];
                break;
            } 
            else {
                array_splice($_SESSION['cart'], $i,1);
                header('location: viewcart.php');
            }
        }
        $i++;
    }
    header('location: viewcart.php');
}


if (isset($_POST['idsp']) && ($_POST['idsp'])) {
    //lấy giá trị 
    $ID = $_POST['idsp'];
    $img = $_POST['anhsp'];
    $name = $_POST['tensp'];
    $price = $_POST['giasp'];

    //so sánh sp nếu trùng id thì tăng số lượng sp
    if (isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
        foreach ($_SESSION['cart'] as $sp) {
            if ($sp[0] == $ID) {
                //cập nhập số lượng
                $sl += $sp[4];
                $a = 1;
                //cập nhập số lượng vào giỏ hàng
                $_SESSION['cart'][$i][4] = $sl;
                break;
            }
            $i++;
        }
    }
    if ($a == 0) {
        //tạo mảng con
        $spdachon = array($ID, $img, $name, $price, $sl);
        //add vào giỏ hàng
        array_push($_SESSION['cart'], $spdachon);
    }
    header('location: view.php');
}
