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

<?php

session_start();
error_reporting(0);

if($_SESSION['username']) {
if($_SESSION['dagsetning'] && $_SESSION['sigurlid'] && $_SESSION['taplid']) {

require "db/connect.php";

$lm = $db->query("SELECT * FROM leikmenn");
$leikmenn = array();
while($row = $lm->fetch_object()){
  $leikmenn[] = $row;
}

for($y = 0; $y < sizeof($leikmenn); $y++){
if($_SESSION['maettir'][$y]==1) {
	$_SESSION['maettir'][$y] = $leikmenn[$y]->id;
}
if($_SESSION['sigrudu'][$y]==1) {
	$_SESSION['sigrudu'][$y] = $leikmenn[$y]->id;
}}

for($x = 0; $x < sizeof($leikmenn); $x++){

	if($_SESSION['maettir'][$x]>0) {
		
		$update1 = $db->prepare("UPDATE leikmenn SET maeting = maeting + 1 WHERE id = ?");
		$update1->bind_param("i", $bindmaettir);
		
		$update2 = $db->prepare("UPDATE leikmenn SET stig = stig + 1 WHERE id = ?");
		$update2->bind_param("i", $bindmaettir);
		
		$bindmaettir = $_SESSION['maettir'][$x];
		
		$update1->execute();
		$update2->execute();
	}
	
	if($_SESSION['sigrudu'][$x]>0) {
	
		$update3 = $db->prepare("UPDATE leikmenn SET sigrar = sigrar + 1 WHERE id = ?");
		$update3->bind_param("i", $bindsigrudu);
		
		$update4 = $db->prepare("UPDATE leikmenn SET stig = stig + 2 WHERE id = ?");
		$update4->bind_param("i", $bindsigrudu);
		
		$bindsigrudu = $_SESSION['sigrudu'][$x];
		
		$update3->execute();
		$update4->execute();
	}}
	
$update = $db->query("UPDATE leikmenn SET heild = heild + 1");

$insert = $db->prepare("INSERT INTO boltar(dagsetning, umsogn, sigur, tap, timasetning) VALUES (?, ?, ?, ?, NOW())");
$insert->bind_param("ssss", $binddagsetning, $bindumsogn, $bindsigur, $bindtap);

$binddagsetning = $_SESSION['dagsetning'];
$bindumsogn = $_SESSION['umsogn'];
$bindsigur = $_SESSION['sigurlid'];
$bindtap = $_SESSION['taplid'];

$insert->execute();

?>

	<div class="loginheild">
	<div class="boxheild3">
	<p class="fyrirsogn1">Bolti skráður</p>
	<a href="../index.php" class="skradtakki">Til baka</a>
	</div></div>

<?php session_destroy() ?>

<?php } else { ?>
<div class="loginheild">
<div class="boxheild3">
	<p class="fyrirsogn1">Ófullnægjandi upplýsingar</p>
	<a href="login.php" class="skradtakki">Til baka</a>
</div></div>
	<?php  die();
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