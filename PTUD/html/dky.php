<?php
include("../class/classdangnhap.php");
$p=new login();

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

    <div style="margin-top:150px;">
    
  </div>
    </div>
    <div align="center" class="container-fluid">
    <div id="formlienhe" class="col-6">
    <div class="col-6"><h1>FORM ĐĂNG KÍ</h1></div>
    <form id="form1" name="form1" method="post" action="">
  <table width="700" border="0">
    <tr>
      <td width="150">Họ tên:</td>
      <td width="350" height="50"><label for="hoten"></label>
      <input type="text" name="hoten" id="hoten" /></td>
    </tr>
    <tr>
      <td>Mã sinh viên:</td>
      <td width="350" height="50"><label for="mssv"></label>
      <input type="text" name="mssv" id="mssv" /></td>
    </tr>
    <tr>
      <td>Địa chỉ:</td>
      <td width="350" height="50"><label for="diachi"></label>
      <input type="text" name="diachi" id="diachi" /></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td width="350" height="50"><label for="email"></label>
      <input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <td>ID:</td>
      <td width="350" height="50"><label for="username"></label>
      <input type="text" name="username" id="username" /></td>
    </tr>
    <tr>
      <td>Mật khẩu:</td>
      <td width="350" height="50"><label for="pass"></label>
      <input type="password" name="pass" id="pass" /></td>
    </tr>
    <tr>
      <td>Nhập lại mật khẩu:</td>
      <td width="350" height="50"><label for="repass"></label>
      <input type="password" name="repass" id="repass" /></td>
    </tr>
    
    <tr>
      <td width="350" height="20" colspan="2"><input type="submit" name="button" id="button" value="Đăng kí" />
      <input type="submit" name="button" id="button" value="Hủy bỏ" /></td>
    </tr>
  </table>
  <?php
  switch($_POST['button'])
  {
      case 'Đăng kí':
        {
            $pass=$_REQUEST['pass'];
            $repass=$_REQUEST['repass'];
            $hoten=$_REQUEST['hoten'];
            $mssv=$_REQUEST['mssv'];
            $email=$_REQUEST['email'];
            $diachi=$_REQUEST['diachi'];
            $username=$_REQUEST['username'];
            if($username && $hoten && $mssv && $email && $pass && $repass !='')
            {
                if($pass==$repass)
                {
                    
                        if($p->themxoasua("INSERT INTO taikhoan(username,password,phanquyen) VALUES('$username',' $pass','2')")==1 
                        && $p->themxoasua("INSERT INTO sinhvien(maSV,tenSV,diachi,Email,MaLHP) VALUES('$mssv',' $hoten','$diachi','$email','')")==1)
						    {
							    echo'Đăng kí thành công. Hệ thống sẽ chuyển về trang đăng nhập sau 2s';
                                header("refresh: 2; url='dangnhap.php'");
						    }
					    else
						    {
							    echo'Đăng kí không thành công.';
						    }
                
                }
                else
                {
                    echo '2 mật khẩu phải trùng nhau !!';
                }
            }
            else
            {
                echo 'Vui lòng nhập đầy đủ thông tin';
            }
            break;
        }
        case 'Hủy bỏ':
        {
            header('location:index.php');
        }
  }
  ?>
  </form>
</div>
</div>

     
</body>
</html>