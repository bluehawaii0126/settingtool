<!DOCTYPE html>
<html lang="ja">
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ARM Setting Tool</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">ARM Setting Tool</h2>
        <?php 
          if (!empty($_GET['error']) && $_GET['error'] == 1) { ?>
            <font color="red">idまたはpasswordに誤りがあります</font>
        <?php } else if (!empty($_GET['error']) && $_GET['error'] == 2) { ?>
            <font color="red">3回失敗したためロックされました。<br/>しばらくたってから再度お試しください。</font>
        <?php } else if (!empty($_GET['error']) && $_GET['error'] == 3) { ?>
            <font color="red">ロックされています。<br/>しばらくたってから再度お試しください。</font>
        <?php } ?>
        <label for="inputUserId" class="sr-only">id</label>
        <input type="userid" id="userid" name="userid" class="form-control" placeholder="id" required autofocus>
        <label for="inputPassword" class="sr-only">password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
        <div>　</div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
      </form>
    </div>
  </body>
</html>
