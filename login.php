<?php

session_start();

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/vendor/autoload.php');
$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, array('cache' => __DIR__ . '/twig_cache'));
require_once('./ArmUtil.php');

if (file_exists('.loginlock')) {
    $updateDate = filemtime('.loginlock');
    $diffTime = strtotime('now') - $updateDate;
    if ($diffTime > $LOGIN_LOCKTIME) {
        unlink('.loginlock');
    } else {
        $out = array();
        $out['errmsg'] = $MESSAGES['login_lock'];
    }
    $template = $twig->loadTemplate('index.html');
    echo $template->render($out);
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
        $out['errmsg'] = $MESSAGES['login_lock_now'];
        $f = fopen('.failed', 'w');
        fwrite($f, 0);
        fclose($f);
    } else {
        $newFailedCount = 1 + $failedFile[0];
        $f = fopen('.failed', 'w');
        fwrite($f, $newFailedCount);
        fclose($f);
        $out['errmsg'] = $MESSAGES['login_failed'];
    }
    $template = $twig->loadTemplate('index.html');
    echo $template->render($out);
    exit;
}

$f = fopen('.failed', 'w');
fwrite($f, 0);
fclose($f);

$_SESSION['login_session'] = 'loginsuccess';

$saveFileUri = 'data.json';
$out = array();
$out['schedules'] = ArmUtil::getSchedules();
$defaultSchedule = ArmUtil::getD3();
$out = array_merge($out, $defaultSchedule);
if (!file_exists($saveFileUri)) {
    $out['default_arm_server'] = $DEFAULT_ARM_SERVER;
    $out['data_arm_server'] = $DATA_ARM_SERVER;
    $out['arm_router_no'] = $ARM_ROUTER_NO;
    $out['pic_sensor_no'] = $PIC_SENSOR_NO;
} else {
    $json = file_get_contents($saveFileUri, true);
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $saveData = json_decode($json, true);
    $out = array_merge($out, $saveData);
}

$template = $twig->loadTemplate('setting.html');
echo $template->render($out);

?>
