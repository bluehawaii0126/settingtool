<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/settingtool/vendor/autoload.php'); 
$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, array('cache' => __DIR__ . '/twig_cache'));
$template = $twig->loadTemplate('index.html');
echo $template->render(array());
?>
