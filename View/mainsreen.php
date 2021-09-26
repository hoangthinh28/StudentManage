<?php
require_once("../Model/database.php");
$connect =  new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

//Search
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $keyword  = $_GET['q'];
    $sql = "SELECT * FROM HocSinh where Ho like '%$keyword%' or Ten like '%$keyword%'";
} else {
    $sql = "SELECT * from HocSinh order by HocSinhID DESC";
}
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
        <h2 style="text-align: center;">Danh Sách Học Sinh</h2>
        <table class="table">
            <tr>
                <th>HocSinhID</th>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Nơi sinh</th>
                <th>GT</th>
                <th>Dân Tộc</th>
                <th>Lớp ID</th>
                <th>UPDATE</th>
                <th>View Details</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['HocSinhID']; ?></td>
                    <td><?php echo $row['Ho'] .' '. $row['Ten']; ?></td>
                    <td><?php echo $row['NgaySinh']; ?></td>
                    <td><?php echo $row['DiaChi']; ?></td>
                    <td><?php echo $row['NoiSinh']; ?></td>
                    <td><?php echo $row['GT']; ?></td>
                    <td><?php echo $row['DanToc']; ?></td>
                    <td><?php echo $row['LopID']; ?></td>
                    <td><a href="index.php?page_layout=edit&id=<?php echo $row['HocSinhID']; ?>">Edit</a></td>
                    <td><a href="index.php?page_layout=detail&id=<?php echo $row['HocSinhID']; ?>">View Details</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>