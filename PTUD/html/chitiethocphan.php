
<?php
include ("../class/classdangnhap.php");
$p=new login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chi tiết học phần</title>
    <link rel="stylesheet" href="../Css/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/home.js"></script>
</head>
<body>
        <?php
        $lay_malhp=$_REQUEST['malhp'];
        if($lay_malhp>0)
        {
            $p->loadchitiet("select * from lophocphan where maLHP='$lay_malhp' limit 1");
        }
        ?>
</body>
</html>