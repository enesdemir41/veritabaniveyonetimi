
<?php

include("/classes/classes.php");

if(!empty($_POST)){

	$database = new database();
	$query = "SELECT * FROM ogretmenler WHERE kullaniciadi = ? AND sifre = ?";


	//echo $kullaniciadi.$sifre;

	if($database->getrow($query,array($_POST['kulAd'],$_POST['kulSif']))){
		echo "giris basarili" ; 
		header("Location: admnPanel.php");
	}
	else{
		echo "Kullanıcı Adı veya Şifre hatalı" ; 
	}
	
	
}


?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Giris Sayfasi</title>
	
	
<!-- Bootstrap -->
    <link href="../css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet" type="text/css">
</head>

<body>
	<nav class="navbar navbar-dark bg-dark nav-link disabled">
		<div class="navbar-brand">
			<a href="loginPage.php" class="text-decoration-none text-white ">
				<img src="../images/logo.png" width="30"/>
				<label>OBS Bilgilendirme Sistemi</label>
			</a>
			
		</div>
	</nav>
	
	<form method="post" class="form p-3 col-sm-5 col-md-4 col-lg-4 col-xl-4">
		<div class="input-group">
			<label>Kullanıcı Adınız :</label>
		</div>
		<div class="input-group mb-3">
			<input type="text" class="form-control" name="kulAd" id="kulNo" placeholder="Numaraniz"/>
		</div>
		<div class="input-group">
			<label>Kullanıcı Şifreniz :</label>
		</div>
		<div class="input-group mb-3">
			<input type="password" class="form-control" name="kulSif" id="kulSif" placeholder="Sifreniz"/>
			<button type="submit" class="btn btn-outline-secondary text-white bg-secondary">Giris Yap</button>
		</div>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td>
						<a class="text-primary" href="rstNumber.html">Numarami Unuttum</a>
					</td>
				</tr>
				<tr>
					<td>
	  					<a class="text-primary" href="rstPass.html">Sifremi Unuttum</a>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="../js/jquery-3.4.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap-4.4.1.js"></script>
</body>
</html>
