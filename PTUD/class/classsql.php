<?php
 class mysql
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
	public function themxoasua($sql)
	{
		$link=$this->connect();
		if(mysql_query($sql,$link))
		{
			return 1;
				
		}
		else
		{
			return 0;	
		}
	}
	public function loaddiemdanh($sql)
	{
		$link=$this->connect();
		$ketqua= mysql_query($sql,$link);
		mysql_close($link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			echo'<table width="570" border="1" align="center">
					  <tr>
						<th colspan="5" scope="col" >Danh sách sinh viên đã diểm danh</th>
					  </tr>
					  <tr>
						<td width="157">Ngày điểm danh</td>
						<td width="172">Họ và tên sinh viên</td>
						<td width="219" colspan="3">Thời gian điểm danh</td>
					  </tr>';
			while($row= mysql_fetch_array($ketqua))
			{
				$ngaydiemdanh=$row['ngay'];
				$giodiemdanh=$row['gio'];
				$id=$row['id'];
				$tensv=$row['tesv'];
				$masv=$row['masv'];
				$trangthai=$row['trangthai'];
				session_start();
				$_SESSION['ngay']=$ngaydiemdanh;
				echo'<tr>
    					<td>'.$ngaydiemdanh.'</td>
   						<td>'.$tensv.'</td>
    					<td colspan="3">'.$giodiemdanh.'</td>
 					 </tr>'	;
			}
			echo'</table>';
			
			
		}
		else
		{
			echo'không có dữ liệu';
		}
		
		
	}
	public function loaddiemdanhki($sql)
	{
		$link=$this->connect();
		$ketqua= mysql_query($sql,$link);
		mysql_close($link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			$sodem=0;
			echo' <table width="200" border="1" align="center">
					   <tr>
							<th width="22%" scope="col">Số thứ tự</th>
							<th width="28%" scope="col">Họ và tên </th>
							<th width="50%" scope="col">số buổi tham gia điểm danh</th>
					   </tr>';
			while($row= mysql_fetch_array($ketqua))
			{
				$ngaydiemdanh=$row['ngay'];
				$giodiemdanh=$row['gio'];
				$id=$row['id'];
				$tensv=$row['tesv'];
				$masv=$row['masv'];
				$trangthai=$row['trangthai'];
				$sodem++;
				$sobuoi=$row['sobuoi'];
				
				echo'<tr>
    					<td>'.$sodem.'</td>
   						<td>'.$tensv.'</td>
    					<td colspan="3">'.$sobuoi.'</td>
 					 </tr>'	;
			}
			echo'</table>';
			
			
		}
		else
		{
			echo'không có dữ liệu';
		}
		
		
	}
	
}
?>