<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- code SQL -->
    <?php
        require 'connect.php';
        $trang = 1;
        if(isset($_GET['trang'])){
            $trang = $_GET['trang'];    
        }

        // tim kiem
        $tim_kiem = "";
        if(isset($_GET['tim_kiem'])){
            $tim_kiem = $_GET['tim_kiem'];
        }

        // xử lí phân trang
        $sql_lay_so_bai_viet = "select count(*) from tin_tuc
                                where tieu_de
                                like '%$tim_kiem%'";
        $mang_so_bai_vet = mysqli_query($ket_noi, $sql_lay_so_bai_viet);
        $ket_qua_so_bai_viet = mysqli_fetch_array($mang_so_bai_vet);
        $so_luong_bai_viet = $ket_qua_so_bai_viet['count(*)'];
        $so_luong_bai_viet_tren_1_trang = 1;
        $so_trang = ceil($so_luong_bai_viet/$so_luong_bai_viet_tren_1_trang);
        $bo_qua = $so_luong_bai_viet_tren_1_trang * ($trang - 1);

        $sql = "select * from tin_tuc 
        where tieu_de
        like '%$tim_kiem%'
        limit $so_luong_bai_viet_tren_1_trang offset $bo_qua";

        $mang_bai_viet = mysqli_query($ket_noi,$sql);
        
        
    ?>

    <h1>Đây là trang chủ</h1>
    <a href="inser_form.php">Viết bài</a>
    <table border="1" width="100%">
        <caption>
            <form action="">
                <input type="search" name="tim_kiem" value="<?php echo $tim_kiem ?>">
            </form>
        </caption>
        <tr>
            <th>Mã</th>
            <th>Tiêu đề</th>
            <th>Ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        
         <?php foreach($mang_bai_viet as $bai_viet) : ?>
            <tr>
                <td><?php echo $bai_viet['ma'] ?></td>
                <td>
                    <a href="show.php?ma=<?php echo $bai_viet['ma'] ?>">
                        <?php echo $bai_viet['tieu_de'] ?>
                    </a>
                </td>
                <td>
                    <img src="<?php echo $bai_viet['anh'] ?>" width="100">
                </td>
                <td>
                    <a href="form_update.php?ma=<?php echo $bai_viet['ma'] ?>">
                    Sửa
                </a>
                </td>
                <td>
                    <a href="process_delete.php?ma=<?php echo $bai_viet['ma'] ?>" onclick="return kt()">
                        Xóa
                    </a>
                </td>
             </tr>
        <?php endforeach ?>
        
    </table>
    <!-- in ra trang kế tiếp -->
    <?php for($i = 1; $i <= $so_trang; $i++){ ?>
        <a href="?trang=<?php echo $i ?> & tim_kiem=<?php echo $tim_kiem?>">
            <?php echo $i ?>
        </a>
    <?php }?>
    <?php mysqli_close($ket_noi); ?>

    <script type="text/javascript">
    function kt () {
        if(confirm("Bạn có chắc chắn xóa")) return true;
        return false;
    }
</script>
</body>
</html>