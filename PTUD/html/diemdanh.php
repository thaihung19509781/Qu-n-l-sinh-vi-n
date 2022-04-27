<?php
	include("../class/classdiemdanh.php");
	$p=new mylogin();
?>
<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['pass'])&&isset($_SESSION['tensv']))
{
	include('ham_dangnhap.php');
	$q=new login1();
	echo $_SESSION['tensv'];
	$ten = $_SESSION['tensv'];
}

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
            <div class="menu" id="menu">
                <ul>
                    <li class="li1"><a href="../Html/HomeSV.php">Trang chủ</a></li>
                    <li class="li1"><a href="">Chức năng
                            <span class="arrow"><i class="fas fa-angle-down"></i></span>
                        </a>
                        <ul class="submenu">
                            <li class="li2"><a href="xemhoatdongtichcuc.php">Xem hoạt động tích cực</a></li>
                            <li class="li2"><a href="diemdanh.php">Điểm danh </a></li>
                            <li class="li2"><a href="dangkihdnk.php">Đăng kí hoạt động ngoại khóa</a></li>
                            <li class="li2"><a href="">Báo cáo HĐNK</a></li>
                            <li class="li2"><a href="danhdausolanphatbieu.php">Đánh dấu số lần phát biểu</a></li>
                        </ul>
                    </li>
                    <li class="li1"><a href="">Blog</a></li>
                    <li class="li1"><a href="#footer">Giới thiệu</a></li>
                    <li class="li1"><a href="#footer">Liên hệ</a></li>
                </ul>
            </div>
        </div>

        <div class="main">
            <div class="item-main noiBat">
                <div class="content"><a href="#">
                        <h2>Điểm danh</h2>
                    </a>   
                    <br>
                    <p>____________</p>
                </div>
                <div class="noiBat_main" align="">
                
                	<form action=""  method="post" style="height:auto; width:400px; margin:10px; padding:10px; border-style: solid;">
                      <div class="form-group">
                        <label for="email" >Nhập mật khẩu điểm danh:</label>
                        <input type="text" class="form-control" id="passdiemdanh" name="passdiemdanh">
                      </div>
                     
                      <input type="submit" name="nut" id="nut" value="Nhập" />
                    </form>
                    <?php
                    
						switch ($_POST['nut'])
						{
							case 'Nhập':
							{
								$pass=$_REQUEST['passdiemdanh'];

								if($pass!="")
								{
							
								
									if($p->login($pass)==1)
									{
										header('location:xacnhandiemdanh.php?ten='.$ten.'');
										
									}
									else
									{
										echo'Mật khẩu không chính xác';
									}
								}
								else
								{
									echo'bạn chưa nhập mật khẩu';
									
									
								}
								break;
								
							}
						}
				?>
				
                
            	</div>
            
        <div class="footerP">
            <div class="footer">
                <div class="footer_item left">
                    <ul class="footer_ul">
                        <li><img src="/img/Logo_IUH.png" alt="logo" class="img-fluid" width="200" height="80">
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
                            <p>Nhóm 7 - HTTT15B - Trường Đại học Công nghiệp TP.HCM</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer_last" style="background-color: midnightblue;">
                <p style="text-align: center;">Copyright © 2022 - Phát triển bởi Nhóm 7 - HTTT15B - ĐHCN TP.HCM</p>
            </div>
        </div>
    </div>
    </div>

</body>

</html>