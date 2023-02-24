<?php
    require 'connect.php';
    $ma = $_GET['ma'];
    $sql = "delete from tin_tuc where ma=$ma";
    mysqli_query($ket_noi,$sql);

    mysqli_close($ket_noi);
    echo '<a href="index.php">Về trang chủ</a>';