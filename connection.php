<?php
require_once('config.php');

// PDOクラスのインスタンス化
function connectPdo()
{
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

function createTodoData($todoText)
{
    $dbh = connectPdo();
    $sql = 'INSERT INTO todos (content) VALUES ("' . $todoText . '")';
    $dbh->query($sql);
}

function getAllRecords()
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL';
    return $dbh->query($sql)->fetchAll();
}

function updateTodoData($post)
{
    $dbh = connectPdo();
    $sql = 'UPDATE todos SET content = "' . $post['content'] . '" WHERE id = ' . $post['id'];
    //ユーザーが入れたコンテントの内容が”の中に入る。WHEREは先ほどと一緒
    $dbh->query($sql);
}

function getTodoTextById($id)
{
    $dbh = connectPdo(); //トライキャッチを代入
    $sql = "SELECT * FROM todos WHERE deleted_at IS NULL AND id = $id";
     //todosからすべてを取り出す。WHERが条件、deletedidが削除日時
     //削除日時がNULLであり、かつ指定したIDであることが条件、に当てはまるすべてのカラムを取り出す。
     $data = $dbh->query($sql)->fetch(); //fetchがレコード一つ
    return $data['content'];
}

function deleteTodoData($id)
{
    $dbh = connectPdo(); // 例外でなかったものが代入される
    $now = date('Y-m-d H:i:s'); // 現在の日時を代入
     // SQLクエリを作成し、直接値を組み込む
    $sql = "UPDATE todos SET deleted_at = '$now' WHERE deleted_at IS NULL AND id = $id";
    //削除日時がNULLであり、かつ指定したIDであることが条件、に当てはまるtodosテーブルを更新する
     // クエリを実行
    $dbh->query($sql);
}
