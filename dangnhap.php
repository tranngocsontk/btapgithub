<?php session_start();
	
	?>
<html>
    <head>
        <meta charset="UTF-8">
			
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-deep-orange.css">
  
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/border.css">
		<link rel="stylesheet" type="text/css" href="css/border.css">
        <title>Đăng nhập</title>
		 </head>

    <body>
	<div class="w3-display-container w3-text-white">
    <img src="anh/anhnen2.jpg" alt="Lights" style="width:100%">
	 <div class="w3-display-middle w3-large">
	<div class="w3-container w3-text-theme text-center">
	<img src="anh/anh3.jpg" class="rounded-circle" alt="Cinque Terre" width="150" height="150"><p><h1 class="text-danger">Trần Ngọc Sơn 19cntt1B </h1></p>
	<h2>
  <br><h1>CHÀO MỪNG BẠN ĐẾN VỚI QUẢN LÝ SINH VIÊN</h1>
  <h2>cảm ơn vì bạn đã có mặt ở đây ^^</h2></h2></br>
  	

	<form action="" method="post" enctype="multipart/form-data">
	<div class="container text-center ">
	
	<br><p> <h2 class="text-white"> Đăng Nhập </h2></p>
		<h4 class="text-white">	<p>Tài khoản: <input type="text" placeholder="Nhập tài khoản" name="user" value="<?php if(isset($_POST['user'])) echo $_POST['user'] ?>"/> 
			<p>Mật khẩu:  <input type="password" placeholder="Nhập mật khẩu" name="pass" value="<?php if(isset($_POST['pass'])) echo $_POST['pass'] ?>"/> </h4>
			<div class="form-check mb-2 mr-sm-2">
      <h6 class="text-primary"><label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="remember"> Remember me
      </label></h6>
    </div>  
			<p> <input type="submit" class="btn btn-primary" name="btn" value="Đăng nhập"/> 
			<a href="/Btap/dangky.php">			Đăng ký</a>
			</br>
		<?php 
				if(isset($_POST['btn'])){	
				$user = $_POST['user'];
				$pass = $_POST['pass'];
					if($user == ""){
						echo '<p>'."Vui lòng nhập tài khoản";
					}
					else{
						$Connect = mysqli_connect('localhost','root','','bang');
						$sql = "select * from username where user = '$user'";
						$ketqua = mysqli_query($Connect,$sql);
							if(!$ketqua){
								echo '<p>'."Sai câu truy vấn Mysql";
							}
							else{
								$dem = mysqli_num_rows($ketqua);
								
								if($dem <= 0){
									echo '<p>'."Tài khoảng không tồn tại!";
								}
								else{
									$row = mysqli_fetch_assoc($ketqua);
									if($pass == $row['pass']){
										echo '<p>'."Đăng nhập thành công";
										$_SESSION['user'] = $user;
										header('Location:http://localhost/Btap/Trangchu.php');
									}
									else{
										echo '<p>'."Sai mật khẩu";
									}
								}
							}
					}
				
				}
					
						
			?>
			</div>	
		</form>
	</div>
	</div>
</div>
	</body>
 
 
 </html>