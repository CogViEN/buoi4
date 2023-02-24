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
    <form action="process_insert.php" method="post">
        Tiêu đề
        <input type="text" name="tieu_de" id="tieu_de">
        <span id="error_tieu_de"></span>
        <br>
        Nội dung
        <textarea name="noi_dung" id="noi_dung"></textarea>
        <span id="error_noi_dung"></span>
        <br>
        Ảnh
        <input type="text" name="anh" id="anh">
        <span id="error_anh"></span>
        <br>
        <button type="submit" onclick="return kt()">Thêm bài viết</button>
    </form>

    <script src="inser_form.js"></script>
</body>
</html>