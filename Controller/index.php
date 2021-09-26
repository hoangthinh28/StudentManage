<?php
require_once('../Model/database.php');
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
    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'mainscreen':
                require_once('../View/mainsreen.php');
                break;
            case 'addproduct':
                require_once('../View/addproduct.php');
                break;
            case 'delete':
                require_once('../View/deletestudent.php');
                break;
            case 'detail':
                require_once('../View/detailStudent.php');
                break;
            case 'edit':
                require_once('../View/updatestudent.php');
                break;
            case 'update':
                require_once('../View/updatemark.php');
                break;
            case 'updatesubject':
                require_once('../View/updateSubject.php');
                break;
            case 'addmajor':
                require_once('../View/addMajor.php');
                break;
            case 'listmajor':
                require_once('../View/listMajor.php');
                break;
            case 'addgrade':
                require_once('../View/addGrade.php');
                break;
            case 'listgrade':
                require_once('../View/listGrade.php');
                break;
            case 'addsubject':
                require_once('../View/addSubject.php');
                break;
            case 'listsubject':
                require_once('../View/listSubject.php');
                break;
            case 'addmark':
                require_once('../View/addMark.php');
                break;
            case 'listmark':
                require_once('../View/listMark.php');
                break;
            default:
                require_once('../View/mainscreen.php');
                break;
        }
    } else {
        require_once('../View/mainsreen.php');
    }
    ?>
</body>

</html>