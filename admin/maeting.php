<!DOCTYPE html>
<html>
	<head>
		<meta charset= "UTF-8">
		<title>Bannað að Þruma - Admin</title>
		<link rel="stylesheet" type="text/css" href="../css/utlitadmin.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href= "../img/logobolti.png" type= "image/png">
		<script type="text/javascript" src="../js/jquery.js" charset="UTF-8"></script>
		<script type="text/javascript" src="../js/admineffectar.js" charset="UTF-8"></script>
		<meta name="viewport" content="width=device-width">
	    <link rel="stylesheet" href="../css/adminresponsive.css" media="screen and (max-width: 400px)">
	</head>
	<body class="loginbody">

<?php

session_start();
error_reporting(0);

if($_SESSION['username']) {

require "db/connect.php";

$oryggidagsetning = htmlspecialchars(trim($_POST["dagsetning"]), ENT_QUOTES);
$oryggiumsogn = htmlspecialchars(trim($_POST["umsogn"]), ENT_QUOTES);

$_SESSION['dagsetning'] = mysql_real_escape_string($oryggidagsetning);
$_SESSION['umsogn'] = mysql_real_escape_string($oryggiumsogn);

//Finna af hverju þetta virkar ekki sem skyldi
if(str_word_count($_SESSION['umsogn'], 0, 'éýúíóöðáæþ')<500) {

$lm = $db->query("SELECT * FROM leikmenn");

$leikmenn = array();
while($row = $lm->fetch_object()){
  $leikmenn[] = $row;
}

?>
	<div class="loginheild">
		<form action="sigur.php" class="boxheild3" method="post">
			<p class="loginp">Hverjir mættu?</p>
			<?php for($x = 0; $x < sizeof($leikmenn); $x++){ ?>
				<label class="maetinglabel"><p class="maetingnofn"><?php echo $leikmenn[$x]->nafn1 ?> <?php echo $leikmenn[$x]->nafn2 ?> <span class="nafn3"><?php echo $leikmenn[$x]->nafn3 ?></span><img src="../img/tekk.png" class="tekkmerki"><input type="checkbox" id="boxid" value="maeting" name="mbox<?php echo ($x+1) ?>"></p></label>
			<?php } ?>
			<input type="submit" class="maetingtakki" value="Skrá"/>
		</form>
	</div>

<?php } else { ?>
<div class="loginheild">
<div class="boxheild3">
	<p class="fyrirsogn1">Texti of langur (hámark 500 orð).</p>
	<a href="login.php" class="skradtakki">Til baka</a>
</div></div>
	<?php die();
	}

} else { ?>
<div class="loginheild">
<div class="boxheild3">
	<p class="fyrirsogn1">Þú þarft að skrá þig inn</p>
	<a href="login.php" class="skradtakki">Til baka</a>
</div></div>
	<?php  die();
	}
?>

</body>
</html>