<!DOCTYPE html>
<html>
	<head>
		<meta charset= "UTF-8">
		<title>Bannað að Þruma - Admin</title>
		<link rel="stylesheet" type="text/css" href="../css/utlitadmin.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href= "../img/logobolti.png" type= "image/png">
		<meta name="viewport" content="width=device-width">
	    <link rel="stylesheet" href="../css/adminresponsive.css" media="screen and (max-width: 455px)">
	</head>
	<body class="loginbody">
	
<?php

session_start();
error_reporting(0);

$oryggiusername = htmlspecialchars(trim($_POST['username']), ENT_QUOTES);
$oryggipassword = htmlspecialchars(trim($_POST['password']), ENT_QUOTES);

$username = mysql_real_escape_string($oryggiusername);
$password = mysql_real_escape_string($oryggipassword);

if ($username&&$password) {

require "db/connect.php";

$query = $db->prepare("SELECT * FROM notendur WHERE username = ?");
$query->bind_param("s", $bindun);
$bindun = $username;

$query->execute();
$query->store_result();

$numrows = $query->num_rows;

if($numrows==1) {

$notendur = array();
$query->bind_result($id, $dbun, $dbpw);
	
	while($query->fetch()) {
    $notendur[0] = $dbun;
	$notendur[1] = $dbpw;
	}
	
	$dbusername = $notendur[0];
	$dbpassword = $notendur[1];

	if($username==$dbusername&&(md5($password))==$dbpassword) {
	
	session_regenerate_id(true);
	
		$_SESSION['username'] = $dbusername;

  $dateFormat= "Y-m-d";
  $dagsetningbolta=gmdate($dateFormat, time());

?>

	<div id="umsognheild">
	<div class="boxheild2">
		<form action="maeting.php" method="post">
		
		<p class="umsognp">Dagsetning bolta</p>
		<input type="date" id="dagsetningbox" name="dagsetning" value="<?php if(isset($_SESSION['dagsetning'])){ print($_SESSION['dagsetning']); } else { print($dagsetningbolta); }?>"/>
		
		<br/><br/>
		
		<p class="umsognp">Umsögn um bolta</p>
		<textarea name="umsogn" id="umsognbox"><?php if(isset($_SESSION['umsogn'])){ echo $_SESSION['umsogn']; }?></textarea><br />
		
		<input type="submit" class="logintakki" value="Skrá"/>
		
		</form>
	</div>
	</div>

<?php 
} else { ?>
<div class="loginheild">
<div class="boxheild3">
	<p class="fyrirsogn1">Rangt lykilorð</p>
	<a href="login.php" class="skradtakki">Til baka</a>
</div></div>
	<?php  die();
	}

} else { ?>
<div class="loginheild">
<div class="boxheild3">
	<p class="fyrirsogn1">Rangt notandanafn</p>
	<a href="login.php" class="skradtakki">Til baka</a>
</div></div>
	<?php  die();
	}

} else { ?>
<div class="loginheild">
<div class="boxheild3">
	<p class="fyrirsogn1">Sláðu inn notandanafn og lykilorð</p>
	<a href="login.php" class="skradtakki">Til baka</a>
</div></div>
	<?php  die();
	}
?>

</body>
</html>