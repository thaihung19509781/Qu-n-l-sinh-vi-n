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
            <div class="item-main noiBat">
                <div class="content"><a href="#">
                        <h2>Đánh giấu số lần phát biểu</h2>
                    </a>
                    <br>
                    <p>____________</p>
                </div>
                <div class="noiBat_main">
<h1>Danh sách sinh viên thuộc cùng lớp học phần</h1>
<?php
$p->load_ds_sinhvien('select * from sinhvien ');
?>
<h1>Chọn sinh viên vừa phát biểu biểu trên danh sách</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="488" border="1">
    <tr>
      <td colspan="2"><div align="center">Thông tin sinh viên phát biểu bài</div></td>
    </tr>
    <tr>
      <td width="205"><label for="txtids"></label>
        <div align="center">
          <input type="text" name="txtids" id="txtids" value="<?php echo $p->laycot("select ID from sinhvien where ID='$layid' limit 1"); ?>"/>
      </div></td>
      <td width="267"><label for="txttens"></label>
        <div align="center">
          <input type="text" name="txttens" id="txttens" value="<?php echo $p->laycot("select tenSV from sinhvien where ID='$layid' limit 1"); ?>"/>
      </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right">
        <input type="submit" name="nut" id="nut" value="đánh dấu" />
      </div></td>
    </tr>
  </table>
</form>
<?php
switch($_POST['nut'])
{
	case 'đánh dấu':
	{
		$kt_id=$p->laycot("select idSV from bangdanhdausolanphatbieu where idSV=(select ID from sinhvien where ID='$layid') limit 1");
		$id_dd=$_REQUEST['txtids'];
		$ten_dd=$_REQUEST['txttens'];
		
		if($kt_id==$id_dd){ 
		   if($p->themxoasua("UPDATE bangdanhdausolanphatbieu SET solanPhatBieu=solanPhatBieu+1 WHERE idSV ='$id_dd' limit 1")==1)
			{
				echo 'Đã tăng số lần phát biểu.';
			}else
			{
				echo 'Chưa tăng số lần phát biểu';
			}
			
		}else{
		if($p->themxoasua("INSERT INTO bangdanhdausolanphatbieu(maPhatBieu,tenSV,idSV,solanPhatBieu)VALUES( '', '$ten_dd','$id_dd','1')")==1)
		{
			echo"Đã đánh dấu thành công";
		}else
		{
			echo "Đánh dấu thất bại";
		}
		}	
	}
	break;
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