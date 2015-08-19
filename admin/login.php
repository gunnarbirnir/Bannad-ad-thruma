<!DOCTYPE html>
<html>
<head>
	 <meta charset= "UTF-8">
	 <title>Bannað að Þruma - Admin</title>
	 <link rel="stylesheet" type="text/css" href="../css/utlitadmin.css">
	 <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	 <link rel="shortcut icon" href= "../img/logobolti.png" type= "image/png">
	 <meta name="viewport" content="width=device-width">
	 <link rel="stylesheet" href="../css/adminresponsive.css" media="screen and (max-width: 355px)">
</head>
<body class="loginbody">

<div class="loginheild">
	<img src="../img/logo1.png" id="logo1">
	<img src="../img/logo2.png" id="logo2">

 <?php session_start();
 error_reporting(0);
 ?>

	<form action="umsogn.php" method="POST">
		<div class="boxheild"><p class="loginp">Notandanafn</p> <input type="text" name="username" class="loginbox"><br/>
		<p class="loginp">Lykilorð</p> 	<input type="password" name="password" class="loginbox"><br/>
		<input type="submit" value="Innskráning" class="logintakki" id="innskraningtakki"></div>
	</form>
</div>
</body>
</html>