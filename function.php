<?php

// connecting to mySQL database
function link_db()
{
    $db = new mysqli('localhost', 'root', '12345', 'reporter');
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");

    return $db;
}

function db_show_article($sn)
{
    global $db, $smarty;

    // require HTML purifier
    require_once 'HTMLPurifier/HTMLPurifier.auto.php';
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);


    $sql    = "SELECT * FROM `article` WHERE `sn`='$sn'";
    $result = $db->query($sql) or die($db->error);
    $data   = $result->fetch_assoc();

    // using purifier to cleanup content/title to be displayed
    $data['content'] = $purifier->purify($data['content']);
    $data['title'] = $purifier->purify($data['title']);

    $smarty->assign('article', $data);

    return;
}

