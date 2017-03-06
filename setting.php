<?php

session_start();

// session check
if (empty($_SESSION['login_session'])) {
	echo '不正なログインが検出されました。ブラウザを閉じて再度アクセスしてください。';
}
?>


<table class="table">
	<tr>
		<th></th>
	</tr>
</table>