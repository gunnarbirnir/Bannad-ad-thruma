<!DOCTYPE html>
<html>
   <head>
     <meta charset= "UTF-8">
	 <title>Bannað að Þruma</title>
	 <link rel="stylesheet" type="text/css" href="css/utlit.css">
	 <link rel="stylesheet" href="css/responsive.css" media="screen and (max-width: 1060px)">
	 <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	 <meta name="viewport" content="width=device-width">
	 <script type="text/javascript" src="js/jquery.js" charset="UTF-8"></script>
	 <script type="text/javascript" src="js/effectar.js" charset="UTF-8"></script>
	 <link rel="shortcut icon" href= "img/logobolti.png" type= "image/png">
   </head>
   <body>
		<?php 
		error_reporting(0);
		require "admin/db/connect.php";
		
		$bolti = $db->query("SELECT * FROM boltar");
		$boltar = array();
		while($rod = $bolti->fetch_object()){
			$boltar[] = $rod;
		} ?>
		
	<div id="sidaheild">
	<div id="boltiheild">
	
	<?php if(sizeof($boltar)==0) { ?>
		<div id="enginnbolti"><p class="f1">Enginn bolti skráður</p></div>
	<?php } ?>
		
		<?php for($x = 0; $x < sizeof($boltar); $x++){ ?>
		<?php $tala = sizeof($boltar) - ($x + 1) ?>
		<div class="bolti">
		<p class="f1">Bolti <?php echo date("d.m.Y", strtotime($boltar[$tala]->dagsetning)) ?></p>
		<p class="umsogn"><?php echo nl2br($boltar[$tala]->umsogn) ?></p>
		<table class="tafla1" cellspacing="0" cellpadding="0">
		<tr>
			<td class="dalkur1" valign="top">
			<p class="f2">Sigurlið</p>
			<hr class="hr1">
			<p class="leikmannalisti"><?php echo nl2br($boltar[$tala]->sigur) ?></p>
			</td>
			<td class="dalkur2"></td>
			<td class="dalkur3" valign="top">
			<p class="f2">Taplið</p>
			<hr class="hr1">
			<p class="leikmannalisti"><?php echo nl2br($boltar[$tala]->tap) ?></p>
			</td>
		</tr>
		</table>
		<p class="s1">Skráð kl. <?php echo date("H:i", strtotime($boltar[$tala]->timasetning)) ?> - <?php echo date("d/m/y", strtotime($boltar[$tala]->timasetning)) ?> </p> 
		</div>
		<?php } ?>
			<footer id="botn">
			<hr class="hr2">
					<p id="botntexti">Bannað að Þruma, haust 2015</p>
			</footer>
		</div>
		
		<?php 
		$lm = $db->query("SELECT * FROM leikmenn ORDER BY stig DESC, sigrar DESC, nafn1");
		$leikmenn = array();
			while($row = $lm->fetch_object()){
				$leikmenn[] = $row;
			}
		
		$stig = array();
		$saeti = array() ?>
	<div id="stada">
		<p class="f3">Staðan</p>
		<table id="tafla2" cellspacing="0" cellpadding="0">
		<td align="center" class="th3"><p class="p4">#</p></th>
		<td align="left" class="th2"><p class="p4">Nafn</p></th>
		<td align="center" class="th1" id="maetingdalkur"><p class="p4">Mæting</p></th>
		<td align="center" class="th1" id="sigrardalkur"><p class="p4">Sigrar</p></th>
		<td align="center" class="th1"><p class="p4">Stig</p></th>
		<?php for($x = 0; $x < sizeof($leikmenn); $x++){ ?>
			<tr>
				<td id="tdid1" class="td1" align="center"><p class="p3"><?php echo ($x + 1) ?>.</p></td>
				<td id="tdid2" class="td1"><p class="p2adal"><?php echo $leikmenn[$x]->nafn1 ?> <?php echo $leikmenn[$x]->nafn2 ?></p><p class="p2adal" id="sidastanafn">&nbsp;<?php echo $leikmenn[$x]->nafn3 ?></p></td>
				<td id="tdid3" align="center" class="td1"><p class="p2"><?php echo $leikmenn[$x]->maeting ?>/<?php echo $leikmenn[$x]->heild ?> </p></td>
				<td id="tdid4" align="center" class="td1"><p class="p2"><?php echo $leikmenn[$x]->sigrar ?></p></td>
				<td id="tdid5" align="center" class="td1"><p class="p2"><?php echo $leikmenn[$x]->stig ?> </p></td>
			</tr>
		<?php } ?>
		</table>
	</div></div>
	
<div id="banner2">
<div id="banner2innri">
	<p class="bannerlinkar2" id="lid2">Lið</p>
	<p class="bannerlinkar2" id="um2">Um</p>
	<a href="admin/login.php" target="_blank"><p class="bannerlinkar2" id="admin2">ADMIN</p></a>
</div></div>

	<header id="banner">
	<div id="midja">
		<a href="index.php"><img src="img/bannerlogo.png" id="logo"></a>
		<a href="index.php"><img src="img/logo1.png" id="logo2"></a>
		<div id="bannerlinkarheild">
			<a href="index.php"><p class="bannerlinkar" id="heim">Heim</p></a>
			<p class="bannerlinkar" id="skiptailid">Skipta í lið</p>
			<p class="bannerlinkar" id="lid">Lið</p>
			<p class="bannerlinkar" id="um">Um</p>
			<a href="admin/login.php" target="_blank"><p class="bannerlinkar" id="admin">ADMIN</p></a>
			<a><p class="bannerlinkar" id="strik"><img src="img/strik.png" id="strikmynd"></p></a>
		</div>
	</div>
	</header>
   </body>
</html>