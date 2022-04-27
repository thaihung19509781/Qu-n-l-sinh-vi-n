<?php
include("ham_dangnhap.php");
$p=new login1();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng nhập</title>
</head>
<style>
body {
padding: 50px;
position:relative;
}
* {
margin: 0;
padding: 0;
}
.form-tt {
width: 400px;
border-radius: 10px;
overflow: hidden;
padding: 55px 55px 37px;
background: #9152f8;
background: -webkit-linear-gradient(top,#7579ff,#b224ef);
background: -o-linear-gradient(top,#7579ff,#b224ef);
background: -moz-linear-gradient(top,#7579ff,#b224ef);
background: linear-gradient(top,#7579ff,#b224ef);
text-align: center;
position:absolute;
}
.form-tt h2 {
font-size: 30px;
color: #fff;
line-height: 1.2;
text-align: center;
text-transform: uppercase;
display: block;
margin-bottom: 30px;
}

.form-tt input[type=text], .form-tt input[type=password] {
font-family: Poppins-Regular;
font-size: 16px;
color: #fff;
line-height: 1.2;
display: block;
width: calc(100% - 10px);
height: 45px;
background: 0 0;
padding: 10px 0;
border-bottom: 2px solid rgba(255,255,255,.24)!important;
border: 0;
outline: 0;
}
.form-tt input[type=text]::focus, .form-tt input[type=password]::focus {
color: red;
}
.form-tt input[type=password] {
margin-bottom: 20px;
}
.form-tt input::placeholder {
color: #fff;
}
.checkbox {
display: block;
}
.form-tt input[type=submit] {
font-size: 16px;
color: #555;
line-height: 1.2;
padding: 0 20px;
min-width: 120px;
height: 50px;
border-radius: 25px;
background: #fff;
position: relative;
z-index: 1;
border: 0;
outline: 0;
display: block;
margin: 30px auto;
}
#checkbox {
display: inline-block;
margin-right: 10px;
}
.checkbox-text {
color: #fff;
}
.psw-text {
color: #fff;
}
</style>

<body>

<div class="form-tt">
<h2>Đăng nhập</h2>
<form action="#" method="post" name="dang-ky">

<input type="text" name="txtuser" placeholder="Tên đăng nhập" />
<br />

<input type="password" name="txtpass" placeholder="Mật khẩu" />
<input type="checkbox" id="checkbox" name="checkbox"><label class="checkbox-text">Nhớ đăng nhập lần sau</label>
<input type="submit" name="nut" value="Đăng nhập" />
</form>
</div>
  

<?php

	switch($_POST['nut'])
	{
		case'Đăng nhập':
		{
			$user=$_REQUEST['txtuser'];
			$pass=$_REQUEST['txtpass'];
			if($user!='' && $pass!='')
			{
				if($p->mylogin($user,$pass)==1)
				{
					header('location:HomeSV.php');
				}
				else
				{
					echo'Dang nhap khong thanh cong';
				}
			}
			else
			{
				echo'Vui long nhap day du thong tin';
			}
			break;
		}
	}
	
?>
</body>
</html>