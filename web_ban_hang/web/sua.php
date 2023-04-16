<?php
session_start();
include("./connectdb.php");
include("./function.php");

if (isset($_POST["ok"])) {
    $masp = $_POST["ma_sp"];
    $tensp = $_POST["ten_sp"];
    $gia = $_POST["gia"];
    $anh = $_POST["anh"];
    $sl = $_POST["sl"];
    $mota = $_POST["mota"];
    $best = $_POST["best"];
    if ($tensp == "") {
        $tensp = $_POST["ten_sp_cu"];
    }
    if ($gia == "") {
        $gia = $_POST["gia_cu"];
    }
    if ($anh == "") {
        $anh = $_POST["anh_cu"];
    }
    if ($sl == "") {
        $sl = $_POST["sl_cu"];
    }
    if ($mota == "") {
        $mota = $_POST["mota_cu"];
    }
    if ($best == "") {
        $best = $_POST["best_cu"];
    }
    $sql = mysqli_query($conn,"UPDATE san_pham SET Ten_Sp = '$tensp', Gia = '$gia' ,Anh ='$anh', sl_trongkho = '$sl' ,Mo_ta_Sp = '$mota' ,best = '$best'  WHERE ID = '$masp'");
    echo '<script>alert("Thay đổi thành công")</script>';
    echo '<script>window.location = "kho_hang.php"</script>';
}
?>