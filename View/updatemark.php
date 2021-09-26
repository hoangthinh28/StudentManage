<?php
require_once('../Model/database.php');

$connect =  new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

$id = $_GET['markID'];
$sql_up = "SELECT * FROM Diem WHERE DiemID ='$id'";
$query_up = mysqli_query($connect, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['sbm'])) {
    $DiemTB = $_POST['DiemTB'];

    $updateMark = "UPDATE Diem SET DiemTB = '$DiemTB' WHERE DiemID = '$id'";
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
                        <label>Điểm Trung Bình</label>
                        <input type="text" name="DiemTB" class="form-control" value="<?php echo $row_up['DiemTB']; ?>" required>
                    </div>
                    <button name="sbm" class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>
</body>

</html>