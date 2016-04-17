<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION["username"])){
	$in=1;
	if ($_SESSION["level"] == 2)
	{
		header("Location: admin.php");
	}
}else{
	$in=0;
	header("Location: login.php");
}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>User Area | Españoles en Edimburgo</title>
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
				<!-- user information -->
				<?php
					print '<div class="item-title">Bienvenido '.$_SESSION["username"].'</div>';
				?>
			
				<div class="left-sidebar">
					<h2>Estas seguro de querer eliminar el usuario y sus servicios?</h2><br>
					<?php
						echo '<a href="deluser.php?user='.$_SESSION["email"].'&back=logout"><button name="edit" type="button" class="boton">SI</button></a> <a href="user.php"><button name="edit" type="button" class="boton">NO</button></a>';
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