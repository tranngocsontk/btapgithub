<?php session_start()
	
	?>
 <html>
	<head>
		
		<title>Đăng ký tài khoảng </title>
	 <style type="text/css">
	 table, th, td{
    border:1px solid #CEEEDD;
}
table{
    border-collapse:collapse;
}
table tr:nth-child(odd){
    background-color:#AABBDC;
}
table tr:nth-child(even){
    background-color:#AABBDC;
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
		<div class="jumbotron w3-Pale-red text-center">
		<form action="" method="post" enctype="multipart/form-data">
		
			<div class="jumbotron w3-Pale-Brown text-center">		
			<div class="container text-center ">
			
			<table class="table text-center" > 
	<tr>
			<th colspan="2"><h2>Đăng Ký </h2></th>
			</tr>
	<tr>
			<td><p>Tài khoản:</td>
			<td> <input type="text" name="user" value="<?php if(isset($_POST['user'])) echo $_POST['user'] ?>"/></td></tr>
	<tr>		<td><p>Mật khẩu: </td>
			<td> <input type="password" name="pass" value="<?php if(isset($_POST['pass'])) echo $_POST['pass'] ?>"/></td></tr>
	<tr>		<td><p>ID </td> 
			<td> <input type="number" name="id" value="<?php if(isset($_POST['id'])) echo $_POST['id'] ?>"/></td></tr>
			
	
	</table>
	</div>
	<p> <input type="submit" name="btn" value="Đăng ký"/> 
	</div>
	
			<div class="jumbotron w3-Pale-Brown">		
			<div class="container text-center ">
			
				<a href="/Btap/quanlytk.php"><h4 class='text-danger'>Trở về</h4></a>
			<td><p> <a href="/Btap/dangnhap.php"><h4>Trở về Đăng Nhập</h4></a></td>	
			</div>
	</div>
	<h2 class="text-danger"> Kết quả chương trình </h2>
	<div class="jumbotron w3-Pale-Brown text-center">		
			<div class="container text-center ">
			<?php 
				if(isset($_POST['btn'])){	
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$id = $_POST['id'];
					if($user == ""){
						echo '<p>'."Vui lòng nhập tài khoản";
					}
					if($pass == ""){
						echo '<p>'."Vui lòng nhập mật khẩu";
					}
					else{
						$Connect = mysqli_connect('localhost','root','','bang');
						$sql = "select * from username where id = '$id'";
						$ketqua = mysqli_query($Connect,$sql);
							if(!$ketqua){
								echo '<p>'."Sai câu truy vấn Mysql";
							}
							else{
								$dem = mysqli_num_rows($ketqua);
								
								if($dem > 0){
									echo '<p>'."ID đã tồn tại!";
								}
								else{
									$sql = "INSERT INTO `username` (`user`, `pass`, `id`) VALUES ('$user', '$pass', '$id');";
									if(mysqli_query($Connect, $sql)){
										$_SESSION['user'] = $user;
										echo '<p>'."Đăng ký tài khoản thành công.";	
										echo '<p>'.'<a href="/Btap/Trangchu.php">Trang chủ</a>';
										echo '<p>'.'<a href="/Btap/quanlytk.php">Danh sách tài khoảng</a>';
									}
									else{
										echo '<p>'."Tài khoản đã tồn tại.";
										
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