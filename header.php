<?php include_once("analyticstracking.php") ?>
<header id="header"><!--header-->

<script src="//edimburgo.ovh/js/cookiechoices.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function(event) {
    cookieChoices.showCookieConsentDialog
('Las cookies nos ayudan a ofrecer nuestros servicios. Al utilizarlos, usted acepta el uso de cookies.',
 'Aceptar', 
 'Más info', 
 '//edimburgo.ovh/cookies.php');
  });
</script>

<?php

//this parts gets the name of the page accessed, no domain, no extension
$nombre_archivo = $_SERVER['SCRIPT_NAME'];
	//get the url of the file of the page we are on
	if ( strpos($nombre_archivo, '/') !== FALSE )
	//remove everything just leaving the name of the file without extension
	$nombre_archivo = preg_replace('/\.php$/', '' ,array_pop(explode('/', $nombre_archivo)));
?>
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="social-icons pull-left">
							<ul class="nav navbar-nav">
								<li>
								<a href="https://www.facebook.com/groups/225683810811975/"target="_blank"><i class="fa fa-facebook"></i>Españoles en Edimburgo</a> 
								</li>

							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li>
								<?php 
								
								// depending if we are logged on or not the page will show a diferent option
								if(($nombre_archivo != "login2")and ($nombre_archivo != "logout")){
									if($in==1){
										echo '<div><a href="user.php"><i class="fa fa-user"></i>'.$_SESSION["username"].'</a> - <a href="logout.php">Logout</a></div>';
									}else{									
										Print '<form name="login" action="login2.php" method="post">
													<input name="logemail" type="email" placeholder="Email" required/>
													<input name="logpass" type="password" placeholder="Contraseña" required/>
													<button name="logbutton" type="submit" class="btn btn-default">Login</button>
												</form>';
									}
								}
								?>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="item-title">Españoles en Edimburgo</div>
						<div class="col-sm-6">
							<div class="item-subtitle">El Directorio</div>
						</div>
						<!--The search tool-->
						<div class="col-sm-6" align="right">
						<form name="login" action="search.php" method="post">
							<input name="search" type="search" placeholder="Nombre del Servicio" required/>
							<button name="searchbutton" type="submit" class="btn btn-default">Buscar</button>
						</form>
						</div>
						<!--End of search tool -->
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						
						
					</div>
					<div class="col-sm-8">
						<div class="item-subtitle">
						<div class="search_box pull-right">
							<ul class="nav navbar-nav navbar-collapse">
								<li><a href="index.php" class="active">Inicio</a></li>
								<li><a href="listado.php?cat=todos&letter=zz">Listado</a></li>
								<li><a href="aboutus.php">About Us</a></li>
								<?php 
								if(($nombre_archivo != "login2")and ($nombre_archivo != "logout")){
									if($in==0){
										Print '<li><a href="login.php">Registrate</a>';
									}else{
										Print '<li><a href="user.php">Home</a>';
									}									
								}
								?>
							</ul>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	