<?php
    require 'connect.php';
    $tieu_de = $_POST['tieu_de'];
    $noi_dung = $_POST['noi_dung'];
    $anh = $_POST['anh'];

    $sql = "insert into tin_tuc(tieu_de,noi_dung,anh)
                         values ('$tieu_de','$noi_dung','$anh')";

    mysqli_query($ket_noi,$sql);
    mysqli_close($ket_noi);
    echo '<a href="index.php">Về trang chủ</a>';