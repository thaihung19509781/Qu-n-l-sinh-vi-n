                	<?php
						include("ham_xemthogntincanhan.php");
						$p=new login();
						$layid=0;
						if(isset($_REQUEST['id']))
						{
							$layid=$_REQUEST['id'];
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
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #04AA6D;
  color: white;
}
</style>

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
                    <li class="li1"><a href="../Html/SanPham.html">Chức năng
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
            <div class="item-main noiBat" >
                <div class="content"><a href="#">
                        <h2>Đăng kí hoạt động ngoại khóa</h2>
                    </a>   
                    <br>
                    <p>____________</p>
                </div>
                <div class="noiBat_main" align="">
                <div id="loadhdnk">
                	<?php
						echo'<h1 style="padding-top:20px;padding-bottom:20px;">Sinh viên vui lòng chọn hoạt động để đăng ký:</h1>';
						$p->load_ds_hdnk("select * from hoatdongngoaikhoa order by maHDNK desc");
					?>

                	</div>
                    <div id="dakihdnk" style="padding-left:30px;">
                    	<h1>Thông tin đăng kí HDNK:</h1>
                            <form id="form1" name="form1" method="post" action="">
                              <table width="389" border="1">
                                <tr>
                                  <td width="174">Mã số HĐNK</td>
                                  <td width="199"><label for="idnk"></label>
                                  <input type="text" name="idnk" id="idnk" value="<?php echo $p->laycot("select maHDNK from hoatdongngoaikhoa where maHDNK='$layid' limit 1"); ?>"/></td>
                                </tr>
                                <tr>
                                  <td>Tên HĐNK</td>
                                  <td><label for="tennk"></label>
                                  <input type="text" name="tennk" id="tennk" value="<?php echo $p->laycot("select tenHDNK from hoatdongngoaikhoa where maHDNK='$layid' limit 1"); ?>" /></td>
                                </tr>
                                <tr>
                                  <td>Mã số sinh viên</td>
                                  <td><label for="idsv"></label>
                                  <input type="text" name="idsv" id="idsv" value="" /></td>
                                </tr>
                                <tr>
                                  <td>Tên sinh viên</td>
                                  <td><label for="tensv"></label>
                                  <input type="text" name="tensv" id="tensv" value="" /></td>
                                </tr>
                                <tr>
                                  <td>Mã GV</td>
                                  <td><label for="idgv"></label>
                                  <input type="text" name="idgv" id="idgv" value="<?php echo $p->laycot("select idGV from hoatdongngoaikhoa where maHDNK='$layid' limit 1"); ?>" /></td>
                                </tr>
                              </table>
                              <p>
                                <input type="submit" name="nut" id="nut" value="Đăng ký" />
                                <input type="submit" name="nut" id="nut" value="Hủy" />
                              </p>
                            </form>
                            <?php
                            switch($_POST['nut'])
                            {
                                case'Đăng ký':
                                {
                                    $idnk=$_REQUEST['idnk'];
                                    $ten=$_REQUEST['tennk'];
                                    $tensv=$_REQUEST['tensv'];
                                    $idsv=$_REQUEST['idsv'];
                                    $idGV=$_REQUEST['idgv'];
                                    if($idnk>0){
                                            if($p->themxoasua("INSERT INTO hoatdongngoaikhoadadk(maHDNK,tenHDNK,idSV,tenSV,idGV)VALUES( '$idnk', '$ten', '$idsv','$tensv','$idGV')")==1)
                                            {
                                                echo 'Đăng kí thành công HĐNK.';
                                            }
                                            else{
                                                echo'Thất bại.';
                                                }
                                            }else
                                            {
                                                echo 'Vui lòng không để trống hoặc thiếu trường thông tin nào.';
                                            }
                                    
                                }break;
                                case'Hủy':
                                {
                                    $idnk=$_REQUEST['idnk'];
                                    if($idnk>0){
                                        header('location:dangkyHDNK.php');
                                        }
                                    
                                }break;
                            }
                            
                            ?>
                    </div>
                
                

				
                
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