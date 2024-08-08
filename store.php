<?php
require_once('functions.php');

savePostedData($_POST);
 //削除したいユーザーのデータが入る
header('Location: ./index.php');