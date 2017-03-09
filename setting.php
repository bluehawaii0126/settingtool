<?php

session_start();

// session check
if (empty($_SESSION['login_session'])) {
	echo '不正なログインが検出されました。ブラウザを閉じて再度アクセスしてください。';
}
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>setting画面</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
<body>
<div class="container">
	<table class="table table-hover">
		<thead>
			<tr>
				<th colspan="2">設定</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="col-md-1">標準ARMサーバー</td>
				<td class="col-md-3">bbbb2</td>
			</tr>
			<tr>
				<td class="col-md-1">データARMサーバー</td>
				<td class="col-md-3">bbbb2</td>
			</tr>
			<tr>
				<td class="col-md-1">ARMルーター番号</td>
				<td class="col-md-3">bbbb2</td>
			</tr>
			<tr>
				<td class="col-md-1">画像認識センサー番号</td>
				<td class="col-md-3">bbbb2</td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>



