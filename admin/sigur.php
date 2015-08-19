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

$lm = $db->query("SELECT * FROM leikmenn");
$leikmenn = array();
while($row = $lm->fetch_object()){
  $leikmenn[] = $row;
}

$flokkun = array();

for($y = 0; $y < sizeof($leikmenn); $y++){
	$flokkun[$y] = 0;
}

for($x = 1; $x < (sizeof($leikmenn)+1); $x++){
if(isset($_POST["mbox{$x}"])) {
	$flokkun[$x-1] = 1;
}}

$_SESSION['maettir'] = $flokkun;

?>

	<div class="loginheild">
		<form action="stadfesta.php" class="boxheild3" method="post">
			<p class="loginp">Hverjir voru í sigurliðinu?</p>
			<?php for($x = 0; $x < sizeof($leikmenn); $x++){
				if($_SESSION['maettir'][$x]==1) { ?>
					<label class="maetinglabel"><p class="maetingnofn"><?php echo $leikmenn[$x]->nafn1 ?> <?php echo $leikmenn[$x]->nafn2 ?> <span class="nafn3"><?php echo $leikmenn[$x]->nafn3 ?></span><img src="../img/tekk.png" class="tekkmerki"><input type="checkbox" id="boxid" value="sigur" name="sbox<?php echo ($x+1) ?>"></p></label>
			<?php }} ?>
			<input type="submit" class="maetingtakki" value="Skrá"/>
		</form>
	</div>

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