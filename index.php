<?php
require_once 'header.php';

$page_title = '首頁';

//die(var_dump($_SESSION));

$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op']) : '';
$sn = isset($_REQUEST['sn']) ? (int) $_REQUEST['sn'] : 0;

switch ($op) {

    default:
        if ($sn) {
            db_show_article($sn);
            $op = 'show_article';
        } else {
            db_list_article();
            $op = 'list_article';
        }
        break;
}

// templates display included in footer.php
require_once 'footer.php';

function db_list_article()
{
    global $db, $smarty;

    $sql    = "SELECT * FROM `article` ORDER by `update_time` DESC";
    $result = $db->query($sql) or die($db->error);
    $all    = [];
    $i = 0;
    while ($data = $result->fetch_assoc()) {
        $all[$i] = $data;
        $all[$i]["summary"] = mb_substr(strip_tags($data["content"]), 0, 70);
        $i++;
    }
    $smarty->assign('all', $all);

    return;
}


