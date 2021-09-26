<?php
require_once('../Model/database.php');

$connect =  new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
$sql_list = "SELECT * FROM HocSinh";
$query_list = mysqli_query($connect, $sql_list);

if (isset($_POST['sbm'])) {
    $hocsinhID = $_POST['HocSinhID'];
    $ho = $_POST['Ho'];
    $ten = $_POST['Ten'];
    $ngaysinh = $_POST['NgaySinh'];
    $diachi = $_POST['DiaChi'];
    $noisinh = $_POST['NoiSinh'];
    $gt = $_POST['GT'];
    $dantoc = $_POST['DanToc'];
    $lopID = $_POST['LopID'];

    $sql = "INSERT INTO HocSinh(HocSinhID, Ho, Ten, NgaySinh, DiaChi, NoiSinh, GT, DanToc, LopID) VALUES('$hocsinhID', '$ho', '$ten', '$ngaysinh', '$diachi', '$noisinh', '$gt', '$dantoc', '$lopID')";
    $query = mysqli_query($connect, $sql);
    header('location: ../Controller/index.php');
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
    <link rel="stylesheet" href="../style.css">
    <title>Phi Long</title>
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
    <div class="container-fluid">
        <div class="card-header">
            <h2>Add Product</h2>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>HocSinhID</label>
                    <input type="text" name="HocSinhID" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Họ</label>
                    <input type="text" name="Ho" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" name="Ten" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Ngày Sinh(YYYY-MM-DD)</label>
                    <input type="text" name="NgaySinh" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Địa Chỉ</label>
                    <input type="text" name="DiaChi" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nơi Sinh</label>
                    <input type="text" name="NoiSinh" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Giới Tính</label>
                    <input type="text" name="GT" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Dân Tộc</label>
                    <input type="text" name="DanToc" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>LopID</label>
                    <input type="text" name="LopID" class="form-control" required>
                </div>

                <button name="sbm" class="btn btn-success" type="submit">Add</button>
            </form>
        </div>
    </div>
</body>

</html>