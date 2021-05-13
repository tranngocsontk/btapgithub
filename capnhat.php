 <?php session_start();
 if(!isset($_SESSION['user'])){
		header("Location: dangnhap.php");
		die();
	}
	?>
 <html>
	<head>
		<title> Cập nhật thông tin sinh viên </title>
		 <style type="text/css">
	
 </style>
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
	<?php		
			if(isset($_GET['ID']))
				$Id= $_GET['ID'];
			$gan=$Id;
            $Connect = mysqli_connect("localhost",'root','',"bang");
            $sql = "select * from bang1 where ID = '$Id' ";
            $ketqua = mysqli_query($Connect,$sql);
			while ($row = mysqli_fetch_assoc($ketqua)) 
			{
						$Id = $row['ID'];
						$Ten = $row['ten'];
						$Diachi = $row['diachi'];
						$Sdt = $row['sdt'];
						$Hinhanh=$row['hinhanh'];
						$Ghichu=$row['ghichu'];
			}
			?>
		<form action="" method="post" enctype="multipart/form-data">
		  <?php			
            $Connect = mysqli_connect('localhost','root','','bang');
            $sql = 'select * from bang1';
            $Ketqua = mysqli_query($Connect,$sql);

			?>
		<div class="jumbotron w3-Pale-Brown">		
			<div class="container text-center ">
			<h1> Cập nhật Thông tin tại đây </h1>	
			<table class="table text-center" > 
			<tbody>
				<tr>
					<th colspan="10"><p><h3>Cập Nhật : </h3> </th>
				</tr>
				<tr><th>
					Id:</th>
					
				
				<th >
					Name:</th>
				
				
				<th >
					Địa chỉ:</th>
					
				
				<th >
					Số điện thoại:</th>
				
				<th>Giới tính:</th>	
				<th>Hình ảnh:</th>
				<th></th>
				</tr>
				<tr>
				<td>
				<input type=Button name="ID" value="<?php if(isset($_POST['ID'])) echo $_POST['ID'];
				else 
					if (!empty($Id)) echo $Id;?>"> </td>
				<td>
				<input type="text" name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];
				else 
					if (!empty($Ten)) echo $Ten; ?>"/></td>
				<td>
				<input type="text" name="diachi" value="<?php if(isset($_POST['diachi'])) echo $_POST['diachi'];
				else 
					if (!empty($Diachi)) echo $Diachi; ?>"/></td>
				<td>
				<input type="text" name="sdt" value="<?php if(isset($_POST['sdt'])) echo $_POST['sdt'];
				else 
					if (!empty($Sdt)) echo $Sdt; ?>"/>
				</td>									
							
				<td><input type="text" name="ghichu" value="<?php if(isset($_POST['ghichu'])) echo $_POST['ghichu'];
				else 
					if (!empty($Ghichu)) echo $Ghichu; ?>"/>
				</td>
				<td><input type="file" name="hinhanh" id="file" value="<?php if(isset($_POST['hinhanh'])) echo $_POST['hinhanh'] ?>"/>
				</td>
				<th><input type="submit" name="btn" value="Sữa"/> </th>
				</tr>
				
			</tbody>
			</table>
			</DIV>
			</DIV>
			<div class="w3-Connect w3-Pale-Red w3-border">
			<div class="row ">			
				<div class="col-sm-4 w3-border text-center">
			<h3><a href="/Btap/Trangchu.php">Trở về trang chủ</a></h3>
			</DIV>
			<div class="col-sm-4 w3-border text-center">
			<h3><a href="/Btap/quanlytk.php">Thông tin tài khoảng ADMIN</a></h3>
			</DIV>
			
			<div class="col-sm-4 w3-border text-center">
			<h3><a href="/Btap/demo.php">Đăng xuất</a></h3>
			</DIV>
				</div>
				</div>
			<div class="w3-Connect w3-Pale-blue w3-border">
			<div class="container text-center ">
			<h3> Kết quả chạy chương trình </h3>
			<h4><?php 
				if(isset($_POST['btn'])){
				
				$ten = $_POST['ten'];
				$diachi = $_POST['diachi'];
				$sdt = $_POST['sdt'];
				$hinhanh = $_FILES['hinhanh'];
				$ghichu = $_POST['ghichu'];
				if(isset($_GET['ID'])){
				$Id = $_GET['ID'];				
				$Connect = mysqli_connect('localhost','root','','bang');
				$file = $_FILES['hinhanh'];
								if(move_uploaded_file($file['tmp_name'],'anh/'.$file['name'])){
									$hinhanh = $file['name'];
								}
				$sql =  "UPDATE bang1 SET ten ='$ten ',diachi='$diachi',sdt='$sdt',hinhanh='$hinhanh',ghichu='$ghichu' WHERE ID ='$gan'";
				$ketqua = mysqli_query($Connect,$sql);
				if(!$ketqua){
							echo '<p>'."Tên đã tồn tại";
						}
				if(mysqli_query($Connect, $sql)){
									echo '<p>'."Sửa thông tin thành công";
									
								}
								else{
									echo '<p>'."Sửa thông tin không thành công.";
								}
				
				}
				

				
						
				
				}
				
			?></h4>
</div>
</div>
		</form>
	
	</body>
 
 
 </html>