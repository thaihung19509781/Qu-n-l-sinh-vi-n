<?php
session_start();
class login
{
	
	private function ketnoi()
	{
		$con=mysql_connect("localhost","root","");
		if (!$con)
		{
			echo 'Khong ket noi duoc csdl'; 	
			exit();
		}	
		else
		{
			mysql_select_db("diemdanh");
			mysql_query("SET NAMES UTF8");
			return $con;
		}
	}
	public function dangnhap($username,$password )
		{
			$link=$this->ketnoi();
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


    public function themxoasua($sql)
	{
		$link=$this->ketnoi();
		if(mysql_query($sql,$link))
		{
			return 1;
		}
		else
		{
			echo 'Ngu';
			return 0;	
		}
			
	}
	public function load_lophocphan($sql)
	{
		$link= $this->ketnoi(); 
		$ketqua=mysql_query($sql, $link);
		 mysql_close($link);
		 $i=mysql_num_rows ($ketqua);
		  if ($i>0)
		  {
			  echo'<table width="1200" border="1" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="52" align="center"><strong>STT</strong></td>
							<td width="321" align="center"><strong>MÃ LỚP HỌC PHẦN</strong></td>
							<td width="321" align="center"><strong>TÊN LỚP HỌC PHẦN</strong></td>
							<td width="100" align="center"><strong>THỜI GIAN HỌC</strong></td>
							<td width="359" align="center"><strong>TÊN PHÒNG HỌC</strong></td>
							<td width="359" align="center"><strong>NĂM HỌC</strong></td>
							<td width="359" align="center"><strong>THỜI GIAN</strong></td>
							<td width="52" align="center"><strong>MÃ GIÁO VIÊN</strong></td>
						  </tr>';
				$dem=1;
			while ($row = mysql_fetch_array($ketqua))
			{	
				$dem=$dem++;
				session_start();
				$stt=$dem;
				$malhp=$row['maLHP'];
				$tenlhp=$row['tenLHP'];
				$thoigianhoc=$row['Thoigianhoc']; 
				$tenphonghoc=$row['Tenphonghoc'];
				$namhoc=$row['Namhoc'];
				$thoigian=$row['Thoigian'];
				$magv=$row['maGv'];
				echo' </tr>
						  <td align="center"align="miđle">'.$dem.'</td>
						  <td align="left" align="middle">'.$malhp.'</td>
						  <td align="left" align="middle">'.$tenlhp.'</td>
						  <td align="center" align="middle">'.$thoigianhoc.'</td>
						  <td align="center" align="middle">'.$tenphonghoc.'</td> 
						  <td align="center" align="middle">'.$namhoc.'</td>
						  <td align="center" align="middle">'.$thoigian.'</td>
						  <td align="center" align="middle">'.$magv.'</td>
						  </tr>';
						  
				$dem++;
				
			}
			
			echo'</table>';
		  }
			else
			{
				echo 'Đang cập nhật dữ liệu...';
			
			}
		 }
		 public function loadsanpham($sql)
		 {
			 $link=$this->ketnoi();
			 $ketqua=mysql_query($sql,$link);
			 mysql_close($link);
			 $i=mysql_num_rows($ketqua);
			 if($i>0)
			 {
				 while($row=mysql_fetch_array($ketqua))
				 {
					 $malhp=$row['maLHP'];
					 $tenlhp=$row['tenLHP'];
					 
					 
					 echo '
					 
					 <div class="noiBat_item itemsp1 ">
						 <div class="img-container">
							 <img src="../img/Logo_IUH.png" width="100%">
						 </div>
						 <div class="detailsp">
						 	<p class="detailsp_tensp"><a href="xemlophocphan.php?malhp='.$malhp.'" id="sp1">'.$malhp.'</a> </p>
							<p class="detailsp_tensp"><a href="xemlophocphan.php?malhp='.$malhp.'" id="sp1">'.$tenlhp.'</a> </p>
							<p class="detailsp_tensp"><a href="tonghopdiemdanh.php?idlhp='.$malhp.'" id="sp1">Tổng hợp điểm danh</a> </p>
						 </div>
					 </div>
					 
						 ';	
				 }
			 }
			 else
			 {
				 echo 'Không có dữ liệu';	
			 }
			 
		 }
		 public function loadchitiet($sql)
	{
		$link=$this->ketnoi();
		$ketqua=mysql_query($sql,$link);
		mysql_close($link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
			$malhp=$row['maLHP'];
			$tenlhp=$row['tenLHP'];
			$thoigian=$row['Thoigian'];
			$thoigianhoc=$row['Thoigianhoc'];
			$Namhoc=$row['Namhoc'];
			
			echo '<h5>'.$tenlhp.'</h5>';
			echo'</br>';
			echo 'Thời gian: '.$thoigian;
			echo '</br>';
			echo 'Mã lớp học phần: '.$malhp;
			echo'</br>';
			echo 'Thời gian học: '.$thoigianhoc;
			echo'</br>';
			echo 'Năm học: '.$Namhoc;
			echo'</br>';
			}
		}
	}
	public function confirmdangnhap($id,$password,$username,$masv,$tensv)
	{
		$link=$this->ketnoi();
		$sql="select id from taikhoan where id='$id' and username='$username' and password='$password' and masv='$masv' and tensv='$tensv' limit 1";
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
			 public function loadhdnk($sql)
		 {
			 $link=$this->ketnoi();
			 $ketqua=mysql_query($sql,$link);
			 mysql_close($link);
			 $i=mysql_num_rows($ketqua);
			 if($i>0)
			 {
				 while($row=mysql_fetch_array($ketqua))
				 {
					 $mahdnk=$row['maHDNK'];
					 $tenhdnk=$row['tenHDNK'];
					 $tenhinh=$row['hinh'];
					 
					 
					 echo '
					 
					 <div class="noiBat_item itemsp1 ">
						 <div class="img-container">
							 <img src="file/'.$tenhinh.'" width="200px" height="100px" />
						 </div>
						 <div class="detailsp">
						 	<p class="detailsp_tensp"><a href="xemlophocphan.php?malhp='.$mahdnk.'" id="sp1">'.$mahdnk.'</a> </p>
							<p class="detailsp_tensp"><a href="xemlophocphan.php?malhp='.$tenhdnk.'" id="sp1">'.$tenhdnk.'</a> </p>
						 </div>
					 </div>
					 
						 ';	
				 }
			 }
			 else
			 {
				 echo 'Không có dữ liệu';	
			 }
			 
		 }
}
?>