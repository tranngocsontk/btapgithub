 
 <html>
	<head>
		<meta charset="UTF-8">
		<title>Cập nhật tài khoảng ADMIN </title>
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
	<?php		
			if(isset($_GET['user']))
				$User= $_GET['user'];
			$gan=$User;
            $Connect = mysqli_connect("localhost",'root','',"bang");
            $sql = "select * from username where user = '$User' ";
            $ketqua = mysqli_query($Connect,$sql);
			while ($row = mysqli_fetch_assoc($ketqua)) 
			{
						$Id = $row['id'];
						$User = $row['user'];
						$Pass = $row['pass'];
			}
			?>
		<form action="" method="post" enctype="multipart/form-data">
		
			
			<div class="jumbotron w3-Pale-Brown">		
			<div class="container text-center ">
			
			<table class="table text-center" > 
			<tbody>
				<tr>
					<th colspan="5"><p><h3>Cập Nhật tài khoảng : </h3> </th>
				</tr>
				<tr><th>
					Id:</th>
					
				
				<th >
					Tài khoảng:</th>
				
				
				<th >
					Mật khẩu:</th>
				</tr>
				<tr>
				<td>
				<input type="text" name="id" value="<?php 
					if(isset($_POST['id'])) echo $_POST['id'];
				else 
					if (!empty($Id)) echo $Id; ?>"/> </td>
				<td>
				<input type="text" name="user" value="<?php 
					if(isset($_POST['user'])) echo $_POST['user'];
				else 
					if (!empty($User)) echo $User ;?>"/></td>
				<td>
				<input type="text" name="pass" value="<?php
					if(isset($_POST['pass'])) echo $_POST['pass'];
				else 
					if (!empty($Pass)) echo $Pass?>"/></td>
				</tr>
				
			</tbody>
			
			</table>
			<h3> <p><input type="submit" name="btn" value="Sữa"/></h3>
			</div>
			</div>
					
				<div class="jumbotron w3-Pale-Brown">		
			<div class="container text-center ">	
				<p><a href="/Btap/quanlytk.php">Trở về danh sách tài khoảng</a>
				
				
			
			
		<?php 
		if(isset($_POST['btn'])){
      if(isset($_POST['id']))
        $Id=$_POST['id'];
	if(isset($_POST['user']))
        $User=$_POST['user'];
      if(isset($_POST['pass']))
        $Pass=$_POST['pass'];
					
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$id = $_POST['id'];
					if($user == ""){
						echo '<p>'."Vui lòng nhập tài khoản";
					}
					else{
						$Connect = mysqli_connect('localhost','root','','bang');
						$sql = "select * from username where id = '$id'";
						$ketqua = mysqli_query($Connect,$sql);
							if(!$ketqua){
								echo '<p>'."Sai câu truy vấn Mysql";
							}
							
								else{
									 $sql ="UPDATE `username` SET  `id`=$Id, `user`='$User', `pass`='$Pass' WHERE `user`='$gan'";
									if(mysqli_query($Connect, $sql)){
										echo '<p>'."Sữa tài khoản thành công.";	
										echo '<p>'.'<a href="/Btap/Trangchu.php">Trang chủ</a>';
										echo '<p>'.'<a href="/Btap/quanlytk.php">Danh sách tài khoảng</a>';
									}
									else{
										echo '<p>'."Tài khoản đã tồn tại.";
										
									}
								}
							}
					}
				
				
			
			?>
			</div>
			</div>
    </form>
    </body>
</html>
 