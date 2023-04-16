<?php
session_start();
ob_start();
include("./connectdb.php");
            if (isset($_POST['search'])) {
                $_SESSION['keyword'] = $_POST['search'];
                header('location:view.php');
            }