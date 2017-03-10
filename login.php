<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/settingtool/config.php'); 
include_once('./Skinny.php');

if (file_exists('.loginlock')) {
    $updateDate = filemtime('.loginlock');
    $diffTime = strtotime('now') - $updateDate;
    if ($diffTime > $LOGIN_LOCKTIME) {
        unlink('.loginlock');
    } else {
        $out = array();
        $out['errmsg'] = 'ログインロックされています。<br/>しばらくたってから再度お試しください';
    }
    $Skinny->SkinnyDisplay('views/index.html', $out);
    exit;
}

$userid = $_POST['userid'];
$password = $_POST['password'];
$passfile = file('.password');
$failedFile = file('.failed');

$loginFailed = false;
if ($userid != 'armadmin') {
    $loginFailed = true;
}
if ($password != $passfile[0]) {
    $loginFailed = true;
}

if ($loginFailed) {
    $out = array();
    if (isset($failedFile[0]) && $failedFile[0] + 1 > 2) {
        touch('.loginlock');
        $out['errmsg'] = '3回失敗したためロックされました。<br/>しばらくたってから再度お試しください';
        $f = fopen('.failed', 'w');
        fwrite($f, 0);
        fclose($f);
    } else {
        $newFailedCount = 1 + $failedFile[0];
        $f = fopen('.failed', 'w');
        fwrite($f, $newFailedCount);
        fclose($f);
        $out['errmsg'] = 'idまたはpasswordに誤りがあります';
    }
    $Skinny->SkinnyDisplay('views/index.html', $out);
    exit;
}

$f = fopen('.failed', 'w');
fwrite($f, 0);
fclose($f);

$_SESSION['login_session'] = 'loginsuccess';
$Skinny->SkinnyDisplay('setting.php', $out);

?>
