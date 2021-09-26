<?php
require_once('../Model/database.php');
$connect =  new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
$id = $_GET['id'];
$sql_list = "SELECT * FROM HocSinh where HocSinhID = '$id'";
$result = mysqli_query($connect, $sql_list);

$query = mysqli_fetch_array($result);
$lopid = $query['LopID'];

$sql_major = "SELECT * FROM Lop where LopID = '$lopid'";
$result1 = mysqli_query($connect, $sql_major);
$query1 = mysqli_fetch_array($result1);
$khoaid = $query1['KhoaID'];
$nganhid = $query1['NganhID'];

$sql_nk = "SELECT * FROM NienKhoa where KhoaID = $khoaid";
$result2 = mysqli_query($connect, $sql_nk);
$query2 = mysqli_fetch_array($result2);

$sql_diem = "SELECT * FROM Diem where HocSinhID = '$id'";
$result3 = mysqli_query($connect, $sql_diem);

$sql_nganh = "SELECT * FROM Nganh where NganhID = '$nganhid'";
$result4 = mysqli_query($connect, $sql_nganh);
$query4 = mysqli_fetch_array($result4);

$sql_monhoc = "SELECT * FROM MonHocChuyenNganh where NganhID = '$nganhid'";
$result5 = mysqli_query($connect, $sql_monhoc);
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
        <h2 style="text-align: center;">Học Sinh</h2>
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
            </tr>
            <tr>
                <td><?php echo $query['HocSinhID']; ?></td>
                <td><?php echo $query['Ho'] . ' ' . $query['Ten']; ?></td>
                <td><?php echo $query['NgaySinh']; ?></td>
                <td><?php echo $query['DiaChi']; ?></td>
                <td><?php echo $query['NoiSinh']; ?></td>
                <td><?php echo $query['GT']; ?></td>
                <td><?php echo $query['DanToc']; ?></td>
                <td><?php echo $query['LopID']; ?></td>
            </tr>
        </table>
    </div>


    <div class="container">
        <h2 style="text-align: center;">Lớp</h2>
        <table class="table">
            <tr>
                <th>LopID</th>
                <th>KhoaID</th>
                <th>NganhID</th>
            </tr>
            <tr>
                <td><?php echo $query1['LopID']; ?></td>
                <td><?php echo $query1['KhoaID']; ?></td>
                <td><?php echo $query1['NganhID']; ?></td>
            </tr>
        </table>
    </div>

    <div class="container">
        <h2 style="text-align: center;">Niên Khoá</h2>
        <table class="table">
            <tr>
                <th>KhoaID</th>
                <th>Năm nhập học</th>
                <th>Tên Khoa</th>
            </tr>
            <tr>
                <td><?php echo $query2['KhoaID']; ?></td>
                <td><?php echo $query2['NamNH']; ?></td>
                <td><?php echo $query2['TenKhoa']; ?></td>
            </tr>
        </table>
    </div>

    <div class="container">
        <h2 style="text-align: center;">Ngành</h2>
        <table class="table">
            <tr>
                <th>NganhID</th>
                <th>Tên ngành </th>
                <th>Mã chuyên ngành</th>
                <th>Số năm</th>
            </tr>
            <tr>
                <td><?php echo $query4['NganhID']; ?></td>
                <td><?php echo $query4['TenNganh']; ?></td>
                <td><?php echo $query4['MaChuyenNganh']; ?></td>
                <td><?php echo $query4['SoNam']; ?></td>
            </tr>
        </table>
    </div>

    <div class="container">
        <h2 style="text-align: center;">Môn Học Chuyên Ngành</h2>
        <table class="table">
            <tr>
                <th>MonHocID</th>
                <th>Tên Môn Học</th>
                <th>Học Trình</th>
                <th>NganhID</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result5)) { ?>
                <tr>
                    <td><?php echo $row['MonHocID']; ?></td>
                    <td><?php echo $row['TenMonHoc']; ?></td>
                    <td><?php echo $row['HocTrinh']; ?></td>
                    <td><?php echo $row['NganhID']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div class="container">
        <h2 style="text-align: center;">Điểm Các Môn Học</h2>
        <table class="table">
            <tr>
                <th>HocSinhID</th>
                <th>MonHocID</th>
                <th>DiemTB</th>
                <th>UPDATE</th>
            </tr>
            <?php
            while ($row1 = mysqli_fetch_assoc($result3)) { ?>
                <tr>
                    <td><?php echo $row1['HocSinhID']; ?></td>
                    <td><?php echo $row1['MonHocID']; ?></td>
                    <td><?php echo $row1['DiemTB']; ?></td>
                    <td><a href="index.php?page_layout=update&markID=<?php echo $row1['DiemID']; ?>">Update</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>