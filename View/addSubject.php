<?php
require_once('../Model/database.php');

$connect =  new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
$sql_list = "SELECT * FROM MonHocChuyenNganh";
$query_list = mysqli_query($connect, $sql_list);

if (isset($_POST['sbm'])) {
    $MonHocID = $_POST['MonHocID'];
    $TenMonHoc = $_POST['TenMonHoc'];
    $HocTrinh = $_POST['HocTrinh'];
    $NganhID = $_POST['NganhID'];

    $sql = "INSERT INTO MonHocChuyenNganh(MonHocID, TenMonHoc, HocTrinh, NganhID) VALUES('$MonHocID', '$TenMonHoc', '$HocTrinh', '$NganhID')";
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
            <h2>Thêm Môn Học Chuyên Ngành</h2>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>MonHocID</label>
                    <input type="text" name="MonHocID" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tên Môn Học</label>
                    <input type="text" name="TenMonHoc" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Học Trình</label>
                    <input type="text" name="HocTrinh" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>NganhID</label>
                    <input type="text" name="NganhID" class="form-control" required>
                </div>
                <button name="sbm" class="btn btn-success" type="submit">Add</button>
            </form>
        </div>
    </div>
</body>

</html>