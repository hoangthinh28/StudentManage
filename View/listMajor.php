<?php
require_once("../Model/database.php");
$connect =  new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

//Search
$sql = "SELECT * from Nganh order by NganhID DESC";
$result = mysqli_query($connect, $sql);
if (!$result) {
    die("Cau truy van sai!");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Quan Ly Hoc Sinh</title>
</head>

<body>
    <div class="function">
        <a href="index.php?page_layout=addproduct">Thêm Học Sinh</a>
        <a href="index.php?page_layout=addmajor" style="padding-left: 20px;">Thêm Ngành</a>|<a href="index.php?page_layout=listmajor">Danh sách ngành</a>
        <a href="index.php?page_layout=addgrade" style="padding-left: 20px;">Thêm Lớp</a>|<a href="index.php?page_layout=listgrade">Danh Sách Lớp</a>
        <a href="index.php?page_layout=addsubject" style="padding-left: 20px;">Thêm Môn Học</a>|<a href="index.php?page_layout=listsubject">Danh Sách Môn Học</a>
        <a href="index.php?page_layout=addmark" style="padding-left: 20px;">Thêm Điểm</a>|<a href="index.php?page_layout=listmark">Danh Sách Điểm</a>
    </div>
    <div class="header">
        <?php require_once("header.php"); ?>
    </div>

    <div class="container">
        <h2 style="text-align: center;">Danh Sách Chuyên Ngành</h2>
        <table class="table">
            <tr>
                <th>NganhID</th>
                <th>Tên Chuyên Ngành</th>
                <th>Mã Chuyên Ngành</th>
                <th>Số Năm</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['NganhID']; ?></td>
                    <td><?php echo $row['TenNganh']; ?></td>
                    <td><?php echo $row['MaChuyenNganh']; ?></td>
                    <td><?php echo $row['SoNam']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>