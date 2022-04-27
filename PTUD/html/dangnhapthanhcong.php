<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['pass'])&&isset($_SESSION['tensv']))
{
	include('ham_dangnhap.php');
	$q=new login();
	$q->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['tensv']);
	echo $_SESSION['tensv'];
		
}
else
{
	header('location:dangnhap.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>đăng nhập thành công</title>
</head>

<body>
<h1>Thông báo đã đăng nhập thành công .</h1>
</body>
</html>