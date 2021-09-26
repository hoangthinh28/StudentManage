<?php
require_once('../Model/database.php');

$connect =  new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

$id = $_GET['id'];
$sql_up = "SELECT * FROM HocSinh WHERE HocSinhID ='$id'";
$query_up = mysqli_query($connect, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['sbm'])) {
    $HocSinhID = $_POST['HocSinhID'];
    $Ho = $_POST['Ho'];
    $Ten = $_POST['Ten'];
    $NgaySinh = $_POST['NgaySinh'];
    $DiaChi = $_POST['DiaChi'];
    $NoiSinh = $_POST['NoiSinh'];
    $GT = $_POST['GT'];
    $DanToc = $_POST['DanToc'];
    $LopID = $_POST['LopID'];

    $updateMark = "UPDATE HocSinh SET HocSinhID = '$HocSinhID', Ho = '$Ho',  Ten = '$Ten', 
                    NgaySinh = '$NgaySinh',  DiaChi = '$DiaChi',  NoiSinh = '$NoiSinh',  
                    GT = '$GT',  DanToc = '$DanToc',  LopID = '$LopID'  WHERE HocSinhID = '$id'";
    if (mysqli_query($connect, $updateMark)) {
        header('location: ../Controller/index.php?page_layout=mainscreen');
    } else {
        echo "Update thất bại: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
            <h2>UPDATE Điểm </h2>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-group">
                        <label>HocSinhID</label>
                        <input type="text" name="HocSinhID" class="form-control" value="<?php echo $row_up['HocSinhID']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Họ</label>
                        <input type="text" name="Ho" class="form-control" value="<?php echo $row_up['Ho']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" name="Ten" class="form-control" value="<?php echo $row_up['Ten']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="text" name="NgaySinh" class="form-control" value="<?php echo $row_up['NgaySinh']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" name="DiaChi" class="form-control" value="<?php echo $row_up['DiaChi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nơi sinh</label>
                        <input type="text" name="NoiSinh" class="form-control" value="<?php echo $row_up['NoiSinh']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>GT</label>
                        <input type="text" name="GT" class="form-control" value="<?php echo $row_up['GT']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>DanToc</label>
                        <input type="text" name="DanToc" class="form-control" value="<?php echo $row_up['DanToc']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>LopID</label>
                        <input type="text" name="LopID" class="form-control" value="<?php echo $row_up['LopID']; ?>" required>
                    </div>
                    <button name="sbm" class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>
</body>

</html>