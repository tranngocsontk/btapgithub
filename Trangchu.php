<?php session_start();
	if(!isset($_SESSION['user'])){
		header("Location: dangnhap.php");
		die();
	}
	?>
<html>
    <head> 
        
        <title>Trang chủ</title>
		 <style type="text/css">
  <!--   table, th, td{
    border:1px solid #868585;
}
table{
    border-collapse:collapse;
}
table tr:nth-child(odd){
    background-color:#eee;
}
table tr:nth-child(even){
    background-color:white;
}
table tr:nth-child(1){
    background-color:skyblue;
} -->
    </style>
    </head>
	
	<?php 
	include 'thuvien.php';
	?>
    <body>
	<div class="w3-Connect w3-Pale-Red w3-border w3-center">
  <div class="row ">
	<div class="container">
  
  <div class="btn-group">
   <a class="dropdown-item " href="quanlytk.php"><h4 class='text-danger'>Thông tin ADMIN</h4></a>
	<a class="dropdown-item " href="them.php"><h4 class='text-danger'>Thêm Thông tin Sinh Viên</h4></a>
	 <div class="dropdown">
 
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
     MENU
    </button>
    <div class="dropdown-menu">
     
      <a class="dropdown-item " href="https://www.facebook.com/TRAN.NGOC.SON.PC">FACEBOOK</a>
      <a class="dropdown-item " href="https://myaccount.google.com/personal-info">GMAIL</a>
	   <a class="dropdown-item" href="demo.php"><h5 class='text-danger'>Đăng xuất</h5></a>
    </div>
  </div>
  </div>
  
</div>
</div>

</div>

        <form action="" method="post">
	
            <?php			
            $Connect = mysqli_connect('localhost','root','','bang');
            $sql = 'select * from bang1';
            $Ketqua = mysqli_query($Connect,$sql);
			?>
	
			<div class="jumbotron w3-Pale-Brown">		
			<div class="container text-center ">
			<h1> Danh sách sinh viên đã được thêm </h1>
			<table class="table text-center" > 
			<tbody>
				<tr>
					<th colspan="8"><h3>Danh sách Sinh Viên: </h3> </th>
				</tr>
				<tr >
					<th >
					Id 
					</th>
					<th >
					Tên
					</th>
					<th >
					Địa chỉ
					</th>
					<th >
					sđt
					</th>
					
					<th >
					Giới tính
					</th>
					<th >
					Hình ảnh
					</th>
					<th colspan="2">
					Lựa chọn </th>
				</tr>
				
				<?php
					while($row = mysqli_fetch_assoc($Ketqua)){
						
						$Id = $row['ID'];
						$Ten = $row['ten'];
						$Diachi = $row['diachi'];
						$Sdt = $row['sdt'];
						$Hinhanh=$row['hinhanh'];
						$Ghichu=$row['ghichu'];
						?>
				<tr>
					<td><?php echo $Id; ?> </td>
					<td><?php echo $Ten; ?> </td>
					<td><?php echo $Diachi; ?> </td>
					<td><?php echo $Sdt; ?> </td>
					<td><?php echo $Ghichu; ?> </td>
					<td><img src="anh/<?php echo $Hinhanh?>"  height="150" width="150" alt="Không thể tải ảnh" title="NGỌC SƠN 19CNTT1B XIN CHÀO CÁC BẠN"/> </td>

					<td><a href='capnhat.php?ID=<?php echo $Id?>'><h5> Sữa </h5></a> </td>
					<td><a href='xoa.php?ID=<?php echo $Id?>&hinhanh=<?php echo $Hinhanh?>'><h5 class='text-danger'> Xoá </h5></a></td>
				</tr>
				<?php
					}
				?>
			
			
			</table>
			</div>
			</div>
				
			<div class="w3-container w3-text-theme text-center">
			<h3> CẢM ƠN VÌ SỰ ĐÓNG GÓP CỦA BẠN </H3>
</div>			
			
			</tbody>
			
        </form>
        
    </body>
</html>