 <?php session_start() ?>
 <html>
	<head>
		<meta charset="UTF-8">
		<title> </title>
		
	</head>
	
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			
			
				
				
			
			<?php 
				if(isset($_GET['ID'])){
				$Id = $_GET['ID'];
				$Connect = mysqli_connect('localhost','root','','bang');
				$sql = "DELETE FROM bang1 WHERE ID = '$Id'";
				$ketqua = mysqli_query($Connect,$sql);
				
				
				
				}
				if(isset($_GET['hinhanh'])){
				$Hinhanh = $_GET['hinhanh'];
				if($Hinhanh != ""){
					unlink('anh'/($Hinhanh));					
				}
			}
				
			header('Location:http://localhost/Btap/trangchu.php');
			?>
		</form>
	
	</body>
 
 
 </html>