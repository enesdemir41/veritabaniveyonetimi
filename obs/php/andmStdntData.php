<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Obs Ogrenci Bilgileri</title>

	<!-- Bootstrap -->
    <link href="../css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet" type="text/css">
</head>
<body>
	
	<nav class="navbar navbar-dark bg-dark ">
		<a class="navbar-brand nav-link" href="../userProfile.html">
			<img class="img" alt="" src="../images/profilePic.png" width="30" height="30"/>
			Kullanici
		</a>
		
		<div class="navbar-brand text-center">
			<img class="img" src="../images/logo.png" alt="logo" width="30" heigth="30"/>
		</div>
		
		<div>
			<a class="navbar-brand float-right" href="loginPage.php">
				
				<img src="../images/logout.png" alt="" height="30" width="30"/>
			</a>
			<a class="navbar-brand float-right nav-link" href="staffPanel.html">
				<img src="../images/home.png" alt="" height="30" width="30">
			</a>
		</div>
	</nav>
	
	<?php 
	
	include("classes/classes.php");
	
	$allstudents = new database();
	$studentsrows = $allstudents->getrows("SELECT * from ogrenci",null);
	?>

	
	<div class="bg-secondary">
		<div class="container col-md-12 p-5">
			<form>
				<table class="table table-dark bg-dark">
					<thead class="text-center">
						<tr>
							<th>
								<label>Ogrencinin Adi</label>
							</th>
							<th>
								<label>Soyadi</label>
							</th>
							<th>
								<label>Numarasi</label>
							</th>
							<th>
							
							</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach ($studentsrows as $student) {?>
						<tr>
							<td><?php echo $student->Isim ?></td>
							<td><?php echo $student->Soyisim ?></td>
							<td><?php echo $student->OgrenciID ?></td>
							<td class="float-right">
								<button type="button" class="btn btn-secondary">Bilgileri Goster</button>
							</td>
						</tr>
					<?php }?>
					</tbody>
				</table>
			</form>
		</div>
	</div>

	
	
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="../js/jquery-3.4.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap-4.4.1.js"></script>
</body>
</html>
