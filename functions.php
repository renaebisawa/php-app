<?php
require_once('connection.php');

function getTodoList()
{
    return getAllRecords();
}

function getSelectedTodo($id)
{
    return getTodoTextById($id);
}

function savePostedData($post)
{
    $path = getRefererPath();
    switch ($path) {
        case '/new.php':
            createTodoData($post['content']);
            break;
        case '/edit.php':
            updateTodoData($post);
            break;
        case '/index.php':
            deleteTodoData($post['id']);
            break; // 追記
        default:
            break;
    }
}

function getRefererPath()
{
    // var_dump('<pre>');
    // var_dump(parse_url($_SERVER['HTTP_REFERER']));
    // var_dump('</pre>');
    // exit;
    $urlArray = parse_url($_SERVER['HTTP_REFERER']); //SERVER遷移する前のURLを取得、parse(URLを分解）に渡す
    return $urlArray['path']; //URLの中のパスを取得
}