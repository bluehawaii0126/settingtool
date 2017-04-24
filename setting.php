<?php
session_start();

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/SaveFile.php');
require_once(__DIR__ . '/vendor/autoload.php');
$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, array('cache' => __DIR__ . '/twig_cache'));
require_once('./ArmUtil.php');

if (empty($_SESSION['login_session'])) {
	$out['errmsg'] = $MESSAGES['no_login'];
  $template = $twig->loadTemplate('index.html');
  echo $template->render($out);
	exit;
}



?>
