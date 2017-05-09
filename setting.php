<?php
session_start();

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/PictureSensor.php');
require_once(__DIR__ . '/vendor/autoload.php');
$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, array('cache' => __DIR__ . '/twig_cache'));
require_once('./ArmUtil.php');

error_log('kiteruyo');


if (empty($_SESSION['login_session'])) {
	$out['errmsg'] = $MESSAGES['no_login'];
  $template = $twig->loadTemplate('index.html');
  echo $template->render($out);
	exit;
}

$out = array();
switch ($_POST['action_no']) {
	  case 1:
				error_log('action1');
				$params = $_POST;
				$pictureSensor = new PictureSensor();
				$pictureSensor->registData($params);
				break;
	  case 2:
		    error_log('action2');
        $out['schedules'] = ArmUtil::getSchedules();
        $defaultSchedule = ArmUtil::getD3();
        $out = array_merge($out, $defaultSchedule);
        $out = array_merge($out, $DEFAULT_SETTINGS);
				$template = $twig->loadTemplate('setting.html');
				echo $template->render(array('data' => $out));
				break;
		default:
		    error_log('error');
}
?>
