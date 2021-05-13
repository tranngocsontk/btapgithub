<?php session_start() ?>
 <html>
	<head>
		<meta charset="UTF-8">
		<title> </title>
		
	</head>
	
	<body>
		<form action="" method="post" enctype="multipart/form-data">
		
		<?php 
				if(isset($_GET['user'])){
				$User= $_GET['user'];
				$Connect = mysqli_connect('localhost','root','','bang');
				$sql = "DELETE FROM Username WHERE user = '$User'";
				$ketqua = mysqli_query($Connect,$sql);
				
				
				
				}
				
				
			header('Location:http://localhost/Btap/quanlytk.php');
			?>
		</form>
	</body>
 
 
 </html>