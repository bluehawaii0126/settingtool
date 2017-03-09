<?php

session_start();
// session check
if (empty($_SESSION['login_session'])) {
	echo '不正なログインが検出されました。ブラウザを閉じて再度アクセスしてください。';
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/settingtool/config.php'); 

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>画像認識センサー環境設定</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
<body>
<div class="container">
	<h3>画像認識センサー環境設定</h3>
	<form>
	<button type="reset" class="btn btn-success" id="clear">表示クリア</button>
	<button type="button" class="btn btn-success" id="initialize">登録内容初期化</button>
	<p>　</p>
	<table class="table table-bordered table-condensed">
		<thead>
			<tr class="active"><th colspan="2">基本情報設定</th></tr>
		</thead>
		<tbody>
		<tr>
			<td class="col-md-3">標準ARMサーバー</td>
			<td class="col-md-9">
				<div class="form-group col-xs-4"><input type="text" name="default-arm-server" class="form-control" value="<?php echo $DEFAULT_ARM_SERVER ?>"></div>
			</td>
		</tr>
		<tr>
			<td>データARMサーバー</td>
			<td><div class="form-group col-xs-4"><input type="text" name="default-arm-server" class="form-control" value="<?php echo $DATA_ARM_SERVER ?>"></div></td>
		</tr>
		<tr>
			<td>ARMルーター番号</td>
			<td><div class="form-group col-xs-7"><input type="text" name="default-arm-server" class="form-control" value="<?php echo $ARM_ROUTER_NO ?>"></div></td>
		</tr>
		<tr>
			<td>画像認識センサー番号</td>
			<td><div class="form-group col-xs-7"><input type="text" name="default-arm-server" class="form-control" value="<?php echo $PIC_SENSOR_NO ?>"></div></td>
		</tr>
		</tbody>
	</table>

	<table class="table table-bordered table-condensed">
		<thead>
			<tr class="active"><th colspan="2">スケジュール設定</th></tr>
		</thead>
		<tbody>
		<tr>
			<td class="col-md-4">センサー死活監視インターバル</td>
			<td class="col-md-8"><div class="form-group col-xs-4"><input type="text" name="default-arm-server" class="form-control"></div></td>
		</tr>
		<tr>
			<td>ドアセンサー死活監視インターバル</td>
			<td><div class="form-group col-xs-4"><input type="text" name="default-arm-server" class="form-control"></div></td>
		</tr>
		<tr>
			<td>死活監視（ARMサーバー間）</td>
			<td><div class="form-group col-xs-7"><input type="text" name="default-arm-server" class="form-control"></div></td>
		</tr>
		<tr>
			<td>設定変更問合せ</td>
			<td><div class="form-group col-xs-7"><input type="text" name="default-arm-server" class="form-control"></div></td>
		</tr>
		<tr>
			<td>画像認識センサー再起動</td>
			<td><div class="form-group col-xs-7"><input type="text" name="default-arm-server" class="form-control"></div></td>
		</tr>
		<tr>
			<td>タイトルなし？？</td>
			<td><div class="form-group col-xs-7"><input type="text" name="default-arm-server" class="form-control"></div></td>
		</tr>
		</tbody>
	</table>

	</form>
</div>
</body>
</html>



