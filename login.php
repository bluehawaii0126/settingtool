<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/settingtool/config.php'); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/settingtool/vendor/autoload.php'); 
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
        $out['errmsg'] = 'ログインロックされています。<br/>しばらくたってから再度お試しください';
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
    $template = $twig->loadTemplate('index.html');
    echo $template->render($out);
    exit;
}

$f = fopen('.failed', 'w');
fwrite($f, 0);
fclose($f);

$_SESSION['login_session'] = 'loginsuccess';

// 保存されている情報があれば表示　なければ初期設定表示
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

error_log($saveData);


    $out['default_arm_server'] = $saveData['default_arm_server'];
    $out['data_arm_server'] = $saveData['data_arm_server'];
    $out['arm_router_no'] = $saveData['arm_router_no'];
    $out['pic_sensor_no'] = $saveData['pic_sensor_no'];
    // $out['select_months'] = '1';
    // $out['select_days'] = '1';
    // $out['select_weekdays'] = '1';
    // $out['select_hours'] = '1';
    // $out['select_minutes'] = '1';
    // $out['select_seconds'] = '1';
}

$template = $twig->loadTemplate('setting.html');
echo $template->render($out);

?>
