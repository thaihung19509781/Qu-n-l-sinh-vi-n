<?php
	class mylogin
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
						mysql_select_db("diemdanh",$connect);
						mysql_query("SET NAMES UTF8");				
						return $connect;
	
					}
			}
			public function login($password )
		{
			$link=$this->connect();
			$sql="select id, pass from pass where pass='$password'";
			$_kq=mysql_query($sql,$link);
			$i=mysql_num_rows($_kq);
			if($i==1)
			{
				while($row=mysql_fetch_array($_kq))
				{
					$id=$row['id'];
					$pass=$row['pass'];
					session_start();
					$_SESSION['id']=$id;
					$_SESSION['pass']=$pass;
					return 1;	
				}
			}
			else
			{
				return 0;
			}
			
		}
public function confirmlogin($id,$pass)
	{
		$link=$this->connect();
		$sql="select id from pass where id='$id' and pass='$pass'";
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i!=1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
		public function dangnhap($username,$password )
		{
			$link=$this->connect();
			$sql="select id, username, pass, masv, tensv from taikhoan where username='$username' && pass='$password' limit 1";
			$_kq=mysql_query($sql,$link);
			$i=mysql_num_rows($_kq);
			if($i==1)
			{
				while($row=mysql_fetch_array($_kq))
				{
					$id=$row['id'];
					$password=$row['pass'];
					$username=$row['username'];
					$masv=$row['masv'];
					$tensv=$row['tensv'];
					session_start();
					$_SESSION['id']=$id;
					$_SESSION['pass']=$password;
					$_SESSION['user']=$username;
					$_SESSION['tensv']=$tensv;
					return 1;	
				}
			}
			else
			{
				return 0;
			}
			
		}
		public function confirmdangnhap($id,$password,$username,$tensv)
		{
			$link=$this->connect();
			$sql="select id from taikhoan where id='$id' and pass='$password' and username='$username'  and tensv='$tensv'";
			$ketqua=mysql_query($sql,$link);
			$i=mysql_num_rows($ketqua);
			if($i!=1)
			{
				return 1;
			}
			else
			{
				return 0;	
			}

		}
			public function dangnhapgiangvien($username,$password )
		{
			$link=$this->connect();
			$password=md5('e6e061838856bf47e1de730719fb2609');
			$username="admin";
			$sql="select id, username, password, masv, tensv from taikhoan where username='$username' && password='$password'";
			$_kq=mysql_query($sql,$link);
			$i=mysql_num_rows($_kq);
			if($i==1)
			{
				while($row=mysql_fetch_array($_kq))
				{
					$id=$row['id'];
					$password=$row['password'];
					$username=$row['username'];
					$masv=$row['masv'];
					$tensv=$row['tensv'];
					
					session_start();
					$_SESSION['id']=$id;
					$_SESSION['pass']=$password;
					$_SESSION['user']=$username;
					$_SESSION['masv']=$masv;
					$_SESSION['tensv']=$tensv;
					return 1;	
				}
			}
			else
			{
				return 0;
			}
			
		}
		
		
	}

?>