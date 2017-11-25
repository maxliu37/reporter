<?php
require_once 'loginheader.php';
require_once 'header.php';

$page_title = '管理頁面';

// if (isset($_POST['op'])) {
//     $op = htmlspecialchars($_POST['op']);
// } else {
//     $op = '';
// }

$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op']) : '';
$sn = isset($_REQUEST['sn']) ? (int)$_REQUEST['sn'] : 0;
//$op = isset($_POST['sn']) ? (int)$_POST['op'] : 0;

switch ($op) {
    case 'insert':
        # code...
        $sn = db_insert_article($db);
        header("location: index.php?sn={$sn}");
        exit;

    case 'delete_article':
    # code...
        db_delete_article($sn);
        header("location: index.php");
        exit;    

    case 'article_form':
        break;
        
    case 'modify_article':
        db_show_article($sn);
        break;

    default:
        # code...
        break;
}

require_once 'footer.php';

//insert one database article
function db_insert_article($db)
{
    global $db;
    $title   = $db->real_escape_string($_POST['title']);
    $content = $db->real_escape_string($_POST['content']);
    $username = $db->real_escape_string($_POST['username']);

    $sql     = "INSERT INTO `article` (`title`, `content`, `username`, `create_time`, `update_time`) VALUES ('{$title}', '{$content}', '{$username}', NOW(), NOW())";
    $db->query($sql) or die($db->error);
    $sn = $db->insert_id;

    if (isset($_FILES)) {
        require_once 'class.upload.php';
        $foo = new Upload($_FILES['pic']);
        if ($foo->uploaded) {
            // save uploaded image with a new name
            $foo->file_new_name_body = 'cover_' . $sn;
            $foo->image_resize       = true;
            $foo->image_convert      = png;
            $foo->image_x            = 1200;
            $foo->image_ratio_y      = true;
            $foo->Process('uploads/');
            if ($foo->processed) {
                $foo->file_new_name_body = 'thumb_' . $sn;
                $foo->image_resize       = true;
                $foo->image_convert      = png;
                $foo->image_x            = 400;
                $foo->image_ratio_y      = true;
                $foo->Process('uploads/');
            }
        }



    //if (isset($_FILES)) {
    //    $ext = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
    //    if (!is_dir('uploads')) {
    //        mkdir('uploads');
    //    }
    //    move_uploaded_file($_FILES['pic']['tmp_name'], "uploads/{$sn}.{$ext}");

    }

    return $sn;
}


function db_delete_article($sn) {
    global $db;

$sql = "DELETE FROM `article` WHERE sn='{$sn}' and username='{$_SESSION['username']}'";
    $db->query($sql) or die($db->error);
}
