<?php
include("../class/classsql.php");
$p = new mysql();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý điểm tích cực</title>
    <link rel="stylesheet" href="../CSS/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/home.js"></script>
</head>

<body>
    <!-- Main đây nha -->
    <div class="container" id="container">
        <!-- Header đây nha -->
        <div class="header">
            <div class="logo">
                <div class="logo-item item1"></div>
                <div class="logo-item item2">
                    <h1>QUẢN LÝ SỰ TÍCH CỰC</h1>
                </div>
                <div class="logo-item item3">
                    <div class="search">
                        <input id="search" type="search" placeholder="Tìm kiếm...">
                        <a href="#"> <i class="fas fa-search"></i></a>
                    </div>
                    <div class="login"><a href="taikhoan.php" onclick=""><i class="fas fa-user"></i></a></div>
                    
                </div>
            </div>
            <div class="menu" id="menu" style="background-color:#9F9;">
                <ul>
                    <li class="li1"><a href="../Html/HomeGV.php">Trang chủ</a></li>
                    <li class="li1"><a href="">Chức năng
                            <span class="arrow"><i class="fas fa-angle-down"></i></span>
                        </a>
                        <ul class="submenu">
                            <li class="li2"><a href="hocphan.php">Tạo lớp học phần</a></li>
                            <li class="li2"><a href="diemdanhsv.php">Điểm danh sinh viên</a></li>
                            <li class="li2"><a href="addHDNK.php">Thêm hoạt động ngoại khóa</a></li>
                            <li class="li2"><a href="xacnhanbchdnk.php">Xác nhận báo cáo HĐNK</a></li>
                        </ul>
                    </li>
                    <li class="li1"><a href="">Blog</a></li>
                    <li class="li1"><a href="#footer">Giới thiệu</a></li>
                    <li class="li1"><a href="#footer">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <br/>
         <hr style="margin:20px" />


        
      <div class="taopass">
      <h2 style="text-align:center;">Tạo mật khẩu điểm danh</h2>
      <br/>

      				<div class="label_item ">
                    <form name="form1" method="post" action="">
                      <div align="center">
                        <table width="343" border="1">
                          <tr>
                            <th height="44" scope="col">Tạo mật khẩu điểm danh </th>
                          </tr>
                          <tr>
                            <td><div align="center">
                              <label for="txtpass"></label>
                              <label for="txtpass2">Nhập mật khẩu </label>
                              <input type="text" name="txtpass" id="txtpass2">
                            </div></td>
                          </tr>
                          <tr>
                            <td><input type="submit" name="nut" id="nut" value="Tạo mật khẩu"></td>
                          </tr>
                        </table>
                      </div>
                      <div align="center"></div>
                    </form>
					<div class="">
        <?php
                        switch ($_POST['nut']) {

                            case 'Tạo mật khẩu': {
                                    $matkhaudiemdanh = $_REQUEST['txtpass'];
                                    $sql = "UPDATE pass SET pass = '$matkhaudiemdanh' WHERE id =1 LIMIT 1";
                                    if ($matkhaudiemdanh != '') {
                                        if ($p->themxoasua($sql) == 1) {
                                            echo 'Tạo mật khẩu điểm danh thành công';
                                        } else {
                                            echo 'Tạo không thành công';
                                        }
                                    } else {
                                        echo 'Bạn chưa nhập mật khẩu';
                                    }

                                    break;
                                }
                        }
                        ?>
        </div>
                    </div>
      	
      </div>
      <br/>

            
        <div class="footerP">
            <div class="footer">
                <div class="footer_item left">
                    <ul class="footer_ul">
                        <li><img src="../img/Logo_IUH.png" alt="logo" class="img-fluid" width="100" height="80">
                            <p>Chào mừng các bạn đến với Hệ thống học tập quản lý điểm tích cực của nhóm 7 thuộc trường Đại
                                học Công nghiệp TP.HCM, kênh thông tin cung cấp các chức năng giúp quản lý sự tích cực của
                                sinh viên cho giảng viên.</p></li>
                    </ul>
                </div>
                <div class="footer_item between">
                    <ul class="footer_ul">
                        <li><h2>Liên kết</h2></li>
                        <li><a href="http://iuh.edu.vn/">Website Nhà Trường</a></li>
                        <li><a href="https://csm.iuh.edu.vn/">Website Trung tâm QTHT</a></li>
                        <li><a href="https://sv.iuh.edu.vn/">Cổng Thông Tin Sinh Viên</a></li>
                    </ul>
                </div>
               
                <div class="footer_item right">
                    <ul class="footer_ul">
                        <li>
                            <h2>Liên Hệ</h2>
                        </li>
                        <li>
                            <p>Nhóm 7 - DHTTT15B - Trường Đại học Công nghiệp TP.HCM</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer_last" style="background-color: lightblue;">
                <p style="text-align: center;">Copyright © 2022 - Phát triển bởi Nhóm 7 - DHTTT15B - ĐHCN TP.HCM</p>
            </div>
        </div>
    </div>
    </div>

</body>

</html>