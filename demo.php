<?php session_start();

if (isset($_SESSION['user'])){
    unset($_SESSION['user']);
    unset($_SESSION['usertype_id']); // xóa session login
    header("location: dangnhap.php");
}
?>