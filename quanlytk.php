<?php session_start(); 
	if(!isset($_SESSION['user'])){
		header("Location: dangnhap.php");
		die();
	} 
	?>
<html>
    <head>
        
        <title>Thông tin ADMIN</title>
		 <style type="text/css">
    table, th, td{
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
}
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
   <a class="dropdown-item " href="Trangchu.php">Trang chủ</a>
	<a class="dropdown-item " href="dangky.php">Thêm tài khoản</a>
	 <div class="dropdown">
 
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
     MENU
    </button>
     <div class="dropdown-menu">
     
      <a class="dropdown-item " href="https://www.facebook.com/TRAN.NGOC.SON.PC">FACEBOOK</a>
      <a class="dropdown-item " href="https://myaccount.google.com/personal-info">GMAIL</a>
	   <a class="dropdown-item" href="demo.php">Đăng xuất</a>
    </div>
  </div>
  </div>
  
</div>
</div>

</div>
        <form action="" method="post">
            <?php			
            $Connect = mysqli_connect('localhost','root','','bang');
            $sql = 'select * from username';
            $Ketqua = mysqli_query($Connect,$sql);
			?>
			<div class="jumbotron w3-Pale-Brown">		
			<div class="container text-center ">
			<table class="table text-center" > 
			<tbody>
				<tr>
					<th colspan="8"><h3>Danh sách Tài khoảng : </h3> </th>
				</tr>
				<tr >
					<th >
					ID
					</th>
					<th >
					Tài Khoảng
					</th>
					<th >
					Mật Khẩu
					</th>
					
					<th colspan="2">
					Lựa chọn </th>
				</tr>
				
				<?php
					while($row = mysqli_fetch_assoc($Ketqua)){
						$Id = $row['id'];
						$User = $row['user'];
						$Pass = $row['pass'];
						
						
						?>
				<tr>
					<td><?php echo $Id; ?> </td>
					<td><?php echo $User; ?> </td>
					<td><?php echo $Pass; ?> </td>
					
										
					<td><a  href='suatk.php?user=<?php echo $row['user']?>'> Sữa </a> </td>
					<td><a href='xoatk.php?user=<?php echo $User?>'> Xoá </a></td>
				</tr>
				<?php
					}
				?>
				
				
			</tbody>
			</table>
		</div>
			</div>
			
        </form>
        
    </body>
</html>