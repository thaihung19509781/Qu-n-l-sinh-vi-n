<?php
class login
{
	private function connect()
			{
			
				$connect= mysql_connect("localhost","root","");
				if(!$connect)
					{
						echo'không kết nối được';	
						exit();
					}
				else
					{
						mysql_select_db("diemdanh");
						mysql_query("SET NAMES UTF8");				
						return $connect;
	
					}
			}
	
	public function dangnhap($username,$password )
		{
			$link=$this->connect();
			$sql="select id, username, password from taikhoan where username='$username' && password='$password' limit 1";
			$_kq=mysql_query($sql,$link);
			$i=mysql_num_rows($_kq);
			if($i==1)
			{
				while($row=mysql_fetch_array($_kq))
				{
					$id=$row['id'];
					$password=$row['password'];
					$username=$row['username'];
					session_start();
					$_SESSION['id']=$id;
					$_SESSION['pass']=$password;
					$_SESSION['user']=$username;
					return 1;	
				}
			}
			else
			{
				return 0;
			}
			
		}
	public function confirmdangnhap($id,$password,$username)
			{
				$link=$this->connect();
				$sql="select id from taikhoan where id='$id' and password='$password' and username='$username' ";
				$ketqua=mysql_query($sql,$link);
				$i=mysql_num_rows($ketqua);
				if($i==1)
				{
					header('location:test.php');
				}
				else
				{
					header('location:testdangnhap.php');	
				}
	
			}

}


?>