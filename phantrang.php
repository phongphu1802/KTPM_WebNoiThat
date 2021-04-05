<?php
class phantrang
{
	/** Author:
	 *	Cach su dung:
	 *  1. include/require/require_once('phantrang.php')
	 *  2. Chen navigation bar vao vi tri muon chen bang cach goi phuong thuc:
	 *  phantrang::navigation$records,$records_per_page,$current_page,$url)
	 *  Trong do:
	 *  $records: tong so record
	 *  $records_per_page: so record muon hien thi tren mot trang
	 *  $current_page: trang hien tai dung de xet hien thi cho cac nut DAU, TRUOC, KE, CUOI
	 *  $url: la url khi duyet cac link trong navigation bar khong co tham so &Page=
	 */
	public static function navigation($records,$records_per_page,$current_page,$url)
	{
		$curr=1;
		$pages=1;
		if(is_numeric($current_page)&&$current_page>0)
			$curr=$current_page;
		$pages=ceil($records/$records_per_page);
		
		echo '<table width="100%" bgcolor="#FFFFFF">';
		echo  	'<tr>';
		echo 		'<td width=20%>Tổng số dòng: <b>'.$records.'</b></td>'; //Cột tổng số dòng
		echo 		'<td width=20%>Dòng: <b>'.(($curr-1)*$records_per_page+1).'-';
		if($curr*$records_per_page>$records)
			echo $records;
		else
			echo $curr*$records_per_page;
		echo '</b></td>'; //Cột số dòng hiện tại
		echo 		'<td width=60% align="right">';
		//Navigation bar
		echo '<table class="phantrang" border="0">';
		echo  '<tr>';
		if($curr>1)
		{
			echo	'<td><a href="'.$url.'&Page=1'.'"><img border="0" src="images/first.png" /></a>&nbsp;</td>';
			echo	'<td><a href="'.$url.'&Page='.($curr-1).'"><img border="0" src="images/previous.png" /></a>&nbsp;</td>';
		}
		for($i=1;$i<=$pages;$i++)
		{
			
			if($i==$curr)
				echo '<td id="curr">&nbsp;'.$i.'&nbsp;</td>';
			else
				echo '<td><a href="'.$url.'&Page='.$i.'">'.$i.'&nbsp;</a></td>';
				
			
		}
		if($curr<$pages)
		{	
			echo	'<td><a href="'.$url.'&Page='.($curr+1).'"><img border="0" src="images/next.png" /></a>&nbsp;</td>';
			echo	'<td><a href="'.$url.'&Page='.$pages.'"><img border="0" src="images/last.png" /></a></td>';
		}
		echo  '</tr>';
		echo '</table>';
		//Ket thuc Navigation bar
		
		echo 		'</td>';
		echo  	'</tr>';
		echo '</table>';


	}
}
?>
