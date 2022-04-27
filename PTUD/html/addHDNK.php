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
    <link rel="stylesheet" href="../Css/Home.css">
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

        <div class="main">
            <div class="item-main noiBat">
                <div class="content"><a href="#">
                        <h2>Thêm hoạt động ngoại khóa</h2>
                    </a>
                    <br>
                    <p>____________</p>
                </div>
                <div class="noiBat_main">
	



<form name="form1"  enctype="multipart/form-data" id="form1" method="post" action="">
<div class="" style="padding-top:10px;"><h1>Bảng thêm HĐNK của GV:</h1></div>
<br>

  <table width="479" border="1">
   <tr><td><b>Nội dung</b></td></tr>
    <tr>
      
      <td width="174"><label for="idnk"></label>
      <input type="hidden" name="idnk" id="idnk" value="<?php echo $p->laycot("select maHDNK from hoatdongngoaikhoa where maHDNK='$layid' limit 1"); ?>" /></td>
    </tr>
    <tr>
      <td>Tên HĐNK</td>
      <td width="289"><label for="tennk"></label>
      <input type="text" name="tennk" id="tennk" value="<?php echo $p->laycot("select tenHDNK from hoatdongngoaikhoa where maHDNK='$layid' limit 1"); ?>" /></td>
    </tr>
    <tr>
      <td>Thời Gian</td>
      <td><label for="time"></label>
      <input type="text" name="time" id="time" value="<?php echo $p->laycot("select thoigian from hoatdongngoaikhoa where maHDNK='$layid' limit 1"); ?>" /></td>
    </tr>
    <tr>
      <td>Địa Điểm</td>
      <td><label for="dd"></label>
      <input type="text" name="dd" id="dd" value="<?php echo $p->laycot("select diadiem from hoatdongngoaikhoa where maHDNK='$layid' limit 1"); ?>" /></td>
    </tr>
    <tr>
      <td>Mô tả</td>
      <td><label for="mota"></label>
      <input type="text" name="mota" id="mota" value="<?php echo $p->laycot("select mota from hoatdongngoaikhoa where maHDNK='$layid' limit 1"); ?>" /></td>
    </tr>
      <tr>
      <td>Hình ảnh</td>
      <td><label for="file"></label>
      <input type="file" name="file" id="file"/></td>
    </tr>
    <tr>
      
      <td>
      <label for="idgv">ID giảng viên</label>
      <td colspan="3">
        <input type="text" name="idgv" id="idgv" value="<?php echo $p->laycot("select idGV from hoatdongngoaikhoa where maHDNK='$layid' limit 1"); ?>" />       
      </tr>
  </table> 
  <p>
    <input type="submit" name="nut" id="nut" value="Thêm">
    <input type="submit" name="nut" id="nut" value="Hủy Chọn">
  </p>
</form>
<?php
switch($_POST['nut'])
{
	case'Thêm':
	{
		$idnk=$_REQUEST['idnk'];
		$ten=$_REQUEST['tennk'];
		$time=$_REQUEST['time'];
		$dd=$_REQUEST['dd'];
		$mota=$_REQUEST['mota'];
		$idGV=$_REQUEST['idgv'];
		$name=$_FILES['file']['name'];
	    $tmp_name=$_FILES['file']['tmp_name'];
		$size=$_FILES['file']['size'];
	    $type=$_FILES['file']['type'];
		if($name!='')
		{          $name=time()."_".$name;
					if($p->uploadfile($name,$tmp_name,"file")==1)
					{
						if($p->themxoasua("INSERT INTO hoatdongngoaikhoa(tenHDNK,hinh,thoigian,diadiem,mota,idGV)VALUES( '$ten','$name', '$time','$dd','$mota','$idGV')")==1)
						{
							echo 'Thêm HDNK thành công.';
						}
						else{
							echo 'Thất bại.';
						}
					}
					else
					{
						echo 'load ảnh thất bại. ';
					}
		}else
		{
			echo 'Vui lòng chọn ảnh '; 
		}
	}break;
	case'Hủy Chọn':
	{
		$idnk=$_REQUEST['idnk'];
		if($idnk>0){
			header('location:addHDNK.php');
			}
		
	}break;
}

?>
<div style="padding-top: 20px;padding-left:20px;" >

<?php
echo'Danh sách hoạt động ngoại khóa đã thêm';

$p->load_ds_hdnk("select * from hoatdongngoaikhoa order by maHDNK desc");
?>
</div>
                
            </div>
            
        <div class="footerP">
            <div class="footer">
                <div class="footer_item left">
                    <ul class="footer_ul">
                        <li><img src="../img/Logo_IUH.png" alt="logo" class="img-fluid" width="200" height="80">
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
            <div class="footer_last" style="background-color: midnightblue;">
                <p style="text-align: center;">Copyright © 2022 - Phát triển bởi Nhóm 7 - DHTTT15B - ĐHCN TP.HCM</p>
            </div>
        </div>
    </div>
    </div>

</body>

</html>