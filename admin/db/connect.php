<?php

$db = new mysqli("localhost","root","mufc2179","bannad_ad_thruma");
$stafir = $db->query("SET NAMES 'utf8'");

if($db->connect_errno) {
  die($db->error);
}

?>