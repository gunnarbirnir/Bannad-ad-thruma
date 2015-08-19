<!DOCTYPE html>
<html>
	<head>
		<meta charset= "UTF-8">
		<title>Bannað að Þruma - Admin</title>
		<link rel="stylesheet" type="text/css" href="../css/utlitadmin.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href= "../img/logobolti.png" type= "image/png">
		<meta name="viewport" content="width=device-width">
	    <link rel="stylesheet" href="../css/adminresponsive.css" media="screen and (max-width: 600px)">
	</head>
	<body class="loginbody">

<?php

session_start();
error_reporting(0);

if($_SESSION['username']) {

require "db/connect.php";

$lm = $db->query("SELECT * FROM leikmenn");
$leikmenn = array();
while($row = $lm->fetch_object()){
  $leikmenn[] = $row;
}

$flokkun2 = array();

for($y = 0; $y < sizeof($leikmenn); $y++){
	$flokkun2[$y] = 0;
}

for($x = 1; $x < (sizeof($leikmenn)+1); $x++){
if(isset($_POST["sbox{$x}"])) {
	$flokkun2[$x-1] = 1;
}}

$_SESSION['sigrudu'] = $flokkun2;

	$sigur = '';
	$tap = '';
	
	for($x = 0; $x < sizeof($leikmenn); $x++){
		if($_SESSION['maettir'][$x] == 1 and $_SESSION['sigrudu'][$x] == 1) { 
		$sigur .= $leikmenn[$x]->nafn1;
		$sigur .= ' ' . $leikmenn[$x]->nafn2;
		$sigur .= ' ' . $leikmenn[$x]->nafn3;
		$sigur .= "\n";
	}} 

	for($x = 0; $x < sizeof($leikmenn); $x++){
		if($_SESSION['maettir'][$x] == 1 and $_SESSION['sigrudu'][$x] == 0) {
		$tap .= $leikmenn[$x]->nafn1;
		$tap .= ' ' . $leikmenn[$x]->nafn2;
		$tap .= ' ' . $leikmenn[$x]->nafn3;
		$tap .= "\n";
	}} 
	
$_SESSION['sigurlid'] = $sigur;
$_SESSION['taplid'] = $tap;

if(strlen($_SESSION['sigurlid'])==0) {
	$_SESSION['sigurlid'] = "Enginn skráður";
}

if(strlen($_SESSION['taplid'])==0) {
	$_SESSION['taplid'] = "Enginn skráður";
}

if(strlen($_SESSION['dagsetning'])==0) {
	$dateFormat= "Y-m-d";
	$dagsetningbolta=gmdate($dateFormat, time());
	$_SESSION['dagsetning'] = $dagsetningbolta;
}

?>

	<div class="loginheild">
	<div class="boxheild4">
		<p class="f1">Bolti <?php echo date("d.m.Y", strtotime($_SESSION['dagsetning'])); ?></p>
		<p class="umsogntexti"><?php echo nl2br($_SESSION['umsogn']) ?></p>
		
	<table class="tafla1" cellspacing="0" cellpadding="0">
	<tr>
		<td class="dalkur1" valign="top">
		<p class="f2">Sigurlið</p>
		<hr class="hr1">
		<p class="leikmannalisti"><?php echo nl2br($_SESSION['sigurlid']) ?></p>
		</td>
		<td class="dalkur2"></td>
		<td class="dalkur3" valign="top">
		<p class="f2">Taplið</p>
		<hr class="hr1">
		<p class="leikmannalisti"><?php echo nl2br($_SESSION['taplid']) ?></p>
		</td>
	</tr>
	</table>
	</div>
	
	<div id="takkaboxheild">
		<a href="skrad.php" class="stadfestatakki" id="stadfesta">Staðfesta</a>
		<a href="haettvid.php" class="stadfestatakki" id="haettavid">Hætta við</a>
	</div></div>

<?php } else { ?>
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