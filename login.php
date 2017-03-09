<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/settingtool/config.php'); 

if (file_exists('./loginlock')) {
	$updateDate = filemtime('loginlock');
	$diffTime = strtotime('now') - $updateDate;

	if ($diffTime > $LOGIN_LOCKTIME) {
		unlink('./loginlock');
		exit;
	} else {
	    header('Location: index.php?error=3');
	    exit;	
	}
}

$userid = $_POST['userid'];
$password = $_POST['password'];
$passfile = file('./.password');
$failedFile = file('./.failed');

$loginFailed = false;
if ($userid != 'armadmin') {
    $loginFailed = true;
}
if ($password != $passfile[0]) {
	$loginFailed = true;
}

if ($loginFailed) {
	$headerString = 'Location: index.php?error=';
	if (isset($failedFile[0]) && $failedFile[0] + 1 > 2) {
	    touch('loginlock');
		$headerString .= '2';
	} else {
		$newFailedCount = 1 + $failedFile[0];
		$f = fopen('.failed', 'w');
        fwrite($f, $newFailedCount);
        fclose($f);
		$headerString .= '1';
	}
    header($headerString);
    exit;		
}

$f = fopen('.failed', 'w');
fwrite($f, 0);
fclose($f);

$_SESSION['login_session'] = 'loginsuccess';
header('Location: ./setting.php');
exit;	
?>
