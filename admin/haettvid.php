<?php

session_start();
error_reporting(0);

if($_SESSION['username']) {

require "db/connect.php";

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset= "UTF-8">
		<title>Bannað að Þruma - Admin</title>
		<link rel="stylesheet" type="text/css" href="../css/utlitadmin.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href= "../img/logobolti.png" type= "image/png">
		<meta name="viewport" content="width=device-width">
	    <link rel="stylesheet" href="../css/adminresponsive.css" media="screen and (max-width: 400px)">
	</head>
	<body class="loginbody">
	<div class="loginheild">
	<div class="boxheild3">
	<p class="fyrirsogn1">Hætt var við skráningu</p>
	<a href="login.php" class="skradtakki">Til baka</a>
	</div></div>
	</body>
</html>

<?php session_destroy() ?>

<?php } else { ?>
	<p>Þú þarft að skrá þig inn</p>
	<a href="login.php">Til baka</a>
	<?php  die();
	}
?>