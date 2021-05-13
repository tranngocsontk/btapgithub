 <?php session_start(); 
if(!isset($_SESSION['user'])){
		header("Location: dangnhap.php");
		die();
	} ?>
 <html>
	<head>
		
		<title> Thêm thông tin sinh viên </title>
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
		<form action="" method="post" enctype="multipart/form-data">
		<div class="jumbotron  text-center w3-pale-blue">
		<div class="container text-center w3-container">
			<table class="table text-center">
				<tr>
					<th colspan="2"><p><h3>Thêm : </h3> </th>
				</tr>
				
				<tr>
					<td><p>Name:</td>
					<td><input type="text" name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'] ?>"/></td>
				</tr>
				<tr>
					<td><p>diachi:</td>
					<td><input type="text" name="diachi" value="<?php if(isset($_POST['diachi'])) echo $_POST['diachi'] ?>"/></td>
				</tr>
				<tr>
					<td><p>Sdt:</td>
					<td><input type="text" name="sdt" value="<?php if(isset($_POST['sdt'])) echo $_POST['sdt'] ?>"/></td>
				</tr>
				<tr>
					<td><p>Hình ảnh:</td>
					<td><input type="file" name="hinhanh" id="file" value="<?php if(isset($_POST['hinhanh'])) echo $_POST['hinhanh'] ?>"/></td>
				</tr>
				<tr>
					<td><p>Giới Tính:</td>
					<td><input type="text" name="ghichu" value="<?php if(isset($_POST['ghichu'])) echo $_POST['ghichu'] ?>"/></td>
				</tr>
			<tr>
					<th colspan="2"><p><button class="w3-button w3-hover-red"><input  type="submit" name="btn" value="Thêm"/></button> </th>
				</tr>
			
			</table>
			</div>
			</div>
			<div class="w3-Connect w3-Pale-Red w3-border">
			<div class="row ">
    <div class="col-sm-4 w3-border text-center">
				
			<h3><p><a href="/Btap/Trangchu.php">Trở về trang chủ</a></h3>
			<p>
			
			<h3><a href="/Btap/quanlytk.php">Thông tin tài khoảng ADMIN</a></h3><p>
			<h3><a href="/Btap/dangkytk.php">Đăng ký tài khoảng ADMIN</a></h3><p>
			<h3><p><a href="/Btap/demo.php">Đăng xuất</a></h3><p>
				
			</div>
	<div class="col-sm-4 w3-border text-center">
				
			<div class="w3-container">
  
  <div class="w3-card" style="width:100%">
    <img src="anh/anh.jpg" alt="Person" style="width:100%">
    <div class="w3-container">
      <h4><b>Trần Ngọc Sơn</b></h4>
      <p>Đầu tư dự án Cntt</p>
    </div>
  </div>
		</div>			
			</div>			
			 <div class="col-sm-4 w3-border text-center">
				<h3 class='text-danger'> Thực hiện kết quả </h3>
			<?php 
				if(isset($_POST['btn'])){	
				
				$ten = $_POST['ten'];
				$diachi = $_POST['diachi'];
				$sdt = $_POST['sdt'];
				$hinhanh = $_FILES['hinhanh'];
				$ghichu = $_POST['ghichu'];
				
				if($ten == ""){
						echo '<p>'."Vui lòng nhập thông tin ( Họ tên )...";
					}
					
				if( $diachi == ""){
					echo '<p>'."Vui lòng nhập thông tin ( Địa chỉ )....";
				}
				if( $sdt == ""){
					echo '<p>'."Vui lòng nhập thông tin ( Số điện thoại )....";
				}
				if( $ghichu == ""){
					echo '<p>'."Vui lòng nhập thông tin ( Giới tính )....";
				}
					else{
						$Connect = mysqli_connect('localhost','root','','bang');						
						$sql = 'select * from bang1 where ten = "$Ten"';
						$ketqua = mysqli_query($Connect,$sql);
						if(!$ketqua){
							echo '<p>'."Sai câu truy vấn MySQL!";
						}
						else{
							$demmasp = mysqli_num_rows($ketqua);
							if($demmasp > 0){
								echo '<p>'."Thông tin đã tồn tại!";
							}
							else{
								$file = $_FILES['hinhanh'];
								if(move_uploaded_file($file['tmp_name'],'anh/'.$file['name'])){
									$hinhanh = $file['name'];
								}
								$sql = "INSERT INTO `bang1` ( `ten`, `diachi`, `sdt`, `hinhanh`, `ghichu`) VALUES ( '$ten', '$diachi', '$sdt','$hinhanh','$ghichu');";
								if(mysqli_query($Connect, $sql)){
									echo '<p>'."Thêm thông tin thành công.";
									
								}
								else{
									echo '<p>'."Thêm thông tin không thành công.";
								}
							}
							
						}
						
					}
				
				}
			
			?>
			</div>
			</div>
			</div>
		</form>
	
	</body>
 
 
 </html>