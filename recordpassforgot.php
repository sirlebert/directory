<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION["username"])){
	$in=1;

}else{
	$in=0;
	
}
?>
<html lang="en">
<head>
	<script src='https://www.google.com/recaptcha/api.js'></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Españoles en Edimburgo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php
		include 'header.php';
	?>
		
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php
						include 'categories.php';
					?>					
				</div>
				
				<div class="col-sm-9 padding-right">
					<?php
						function generar_clave($longitud){ 
							$cadena="[^A-Z0-9]"; 
							return substr(eregi_replace($cadena, "", md5(rand())) . 
							eregi_replace($cadena, "", md5(rand())) . 
							eregi_replace($cadena, "", md5(rand())), 
							0, $longitud); 
						} 

						$clave=generar_clave(16); 
						$id=$_POST["id"];
						$code=$_POST["code"];
						$passwd2=sha1($_POST["pass"]);
						$passwd3=sha1($_POST["reppass"]);
						$results3 = $mysqli->query("SELECT * FROM users where id like '".$id."' and code like '".$code."'");
						$row_cnt = $results3->num_rows;
						$row3 = $results3->fetch_assoc();
						if ($row_cnt == 1){
							if ($passwd2 == $passwd3){
									$results1 = $mysqli->query("update users set password= '".$passwd2."', code= '".$clave."' where id like '".$id."'");
									echo "<h2>Contraseña cambiada</h2>";
									echo "<meta http-equiv=\"refresh\" content=\"2;url=login.php\"/>";
							}else{
									echo "<h2>las nuevas contraseñas no coinciden</h2>";
									echo "<meta http-equiv=\"refresh\" content=\"2;url=passforgot.php?code=".$code."&id=".$id."\"/>";
							}
						}else{
							echo "<h2>Estamos teniendo problemas con el usuario, por favor contacta con un administrador</h2>";
						}
					?>
				</div>
			</div>
		</div>
	</section>
	
	<?php
		include 'footer.php';
	?>
	 
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	
</body>
</html>