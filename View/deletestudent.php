<?php 
require_once('../Model/database.php');
$connect =  new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
$id = $_GET['id'];
$sql = "DELETE FROM HocSinh WHERE HocSinhID = '$id'";
$query = mysqli_query($connect, $sql);
header('location: ../Controller/index.php?page_layout=mainscreen');
?>