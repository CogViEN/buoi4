<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span{
            color: red;
        }
    </style>
</head>
<body>
        <!-- get data from db with 'ma' -->
        <?php
            require 'connect.php';
            $ma = $_GET['ma'];
            $sql = "select * from tin_tuc where ma=$ma";
            $ket_qua = mysqli_query($ket_noi,$sql);
            $bai_viet = mysqli_fetch_array($ket_qua);
        ?>

    <form action="process_update.php" method="post">
        <input type="hidden" name="ma" 
        value="<?php echo $ma ?>">
        Tiêu đề
        <input type="text" name="tieu_de" id="tieu_de" 
        value="<?php echo $bai_viet['tieu_de'] ?>">
        <span id="error_tieu_de"></span>
        <br>
        Nội dung
        <textarea name="noi_dung" id="noi_dung" >
        <?php echo $bai_viet['noi_dung'] ?>
        </textarea>
        <span id="error_noi_dung"></span>
        <br>
        Ảnh
        <input type="text" name="anh" id="anh"
        value="<?php echo $bai_viet['anh'] ?>">
        <span id="error_anh"></span>
        <br>
        <button type="submit" onclick="return kt()">Sửa bài viết</button>
    </form>

    <script src="inser_form.js"></script>
</body>
</html>