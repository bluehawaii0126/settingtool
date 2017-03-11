<?php

session_start();
// session check
if (empty($_SESSION['login_session'])) {
	echo '不正なログインが検出されました。ブラウザを閉じて再度アクセスしてください。';
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/settingtool/config.php'); 



$Skinny->SkinnyDisplay('views/setting.html', $out);
?>



