<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/settingtool/config.php'); 


if (file_exists('./loginlock')) {
	$updateDate = filemtime('loginlock');
	error_log($updateDate);
    header('Location: index.php?error=3');
    exit;	
}

$userid = $_POST['userid'];
$password = $_POST['password'];
$passfile = file('./password');
$failed = file('./failed');

$loginFailed = false;
if ($userid != 'armadmin') {
    $loginFailed = true;
}
if ($password != $passfile[0]) {
	$loginFailed = true;
}

if ($loginFailed) {
	$headerString = 'Location: index.php?error=';
	if (isset($failed[0]) && $failed[0] + 1 > 2) {
	    touch('loginlock');
		$headerString .= '2';
	} else {
		$headerString .= '1';
	}
    header($headerString);
    exit;		
}
// 設定画面に遷移
$_SESSION['login_session'] = 'loginsuccess';
header('Location: ./setting.php');
exit;	
?>
