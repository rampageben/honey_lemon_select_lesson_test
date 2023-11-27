<?php
require_once('header.php');
$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
$class_id = isset($_REQUEST['class_id']) ? filter_var($_REQUEST['class_id'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$chose_id = isset($_REQUEST['chose_id']) ? filter_var($_REQUEST['chose_id'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$all_class = isset($all_class) ? $all_class : array();
if ($isuser == false) {
    $msg = '請先登入';
} else {
    show_all_class();
    if ($chose_id != '') {
        checkaddclass($chose_id);
    }
}

require("footer.php");

function show_all_class()
{
    global $smarty, $mysqli, $class_id, $op, $msg, $isuser, $all_class;
    $alreadyclass_list = array();
    $op = 'addclass';
    $user_id = $_SESSION['user_id'];
    if ($class_id != '') {
        $sql = "SELECT * FROM `course_data` WHERE `course_id` LIKE '%{$class_id}%' ORDER BY `course_id` ASC";
        $result = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程" . $mysqli->error);
        if (mysqli_num_rows($result) != 0) {
            $sql = "SELECT `ccm_course` FROM `ccm` WHERE `ccm_id` = '{$user_id}'";
            $alreadyclass = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶課表" . $mysqli->error);
            $alreadyclass_data = $alreadyclass->fetch_assoc();
            $alreadyclass_list = explode(",", $alreadyclass_data['ccm_course']);
            $i = 0;
            while ($class = $result->fetch_assoc()) {
                $all_class[$i] = $class;
                $all_class[$i]['course_time'] = checktime($class['course_time1'], $class['course_time2'], $class['course_time3']);
                $all_class[$i]['course_room'] = checkroom($class['course_room1'], $class['course_room2'], $class['course_room3']);
                $all_class[$i]['course_people'] = $class['course_quotaPick'] . '/' . $class['course_quota'];
                if ($class['course_quotaPick'] == $class['course_quota']) {
                    $all_class[$i]['already'] = "cant";
                } else {
                    $all_class[$i]['already'] = "false";
                }
                foreach ($alreadyclass_list as $already) {
                    if ($already == $class['course_id']) {
                        $all_class[$i]['already'] = "true";
                        break;
                    }
                }

                $i++;
            }
            $smarty->assign('all_class', $all_class);
            $op = 'search_add_result';
        } else {
            $msg = '查無資料';
        }
        $smarty->assign('class_id', $class_id);
    }
}

function checkaddclass($chose_id)
{
    global $smarty, $mysqli, $class_id, $op, $msg, $isuser, $all_class;

    $user_id = $_SESSION['user_id'];
    $op = "chose_class";
    $sql = "SELECT `ccm_credit` FROM `ccm` WHERE `ccm_id` = '{$user_id}'";
    $user_credit = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶資料" . $mysqli->error);
    $user_credit_data = $user_credit->fetch_assoc();
    $user_new_credit = $user_credit_data['ccm_credit'];
    $sql = "SELECT `rules`.`rules_max_credit` FROM `rules` JOIN `ccm` ON `rules`.`rules_depart` = `ccm`.`ccm_grade` WHERE `ccm`.`ccm_id` = '{$user_id}'";
    $user_rules_max_credit = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶規則" . $mysqli->error);
    $user_rules_max_credit_data = $user_rules_max_credit->fetch_assoc();
    $user_rules_max_credit = $user_rules_max_credit_data['rules_max_credit'];
    $sql = "SELECT `course_credit`,`course_time1`,`course_time2`,`course_time3` FROM `course_data` WHERE `course_id` = '{$chose_id}'";
    $chose_class_credit = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到課程學分" . $mysqli->error);
    $chose_class_credit_data = $chose_class_credit->fetch_assoc();
    $chose_class_credit = $chose_class_credit_data['course_credit'];
    $chose_class_time = [$chose_class_credit_data['course_time1'], $chose_class_credit_data['course_time2'], $chose_class_credit_data['course_time3']];
    if ($user_new_credit + $chose_class_credit > $user_rules_max_credit) {
        $msgdanger = '超過規定學分';
        $smarty->assign('msgdanger', $msgdanger);
        return;
    } else {
        $sql = "SELECT `ccm_course` FROM `ccm` WHERE `ccm_id` = '{$user_id}'";
        $alreadyclass = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶課表" . $mysqli->error);
        $alreadyclass_data = $alreadyclass->fetch_assoc();
        $alreadyclass_list = $alreadyclass_data['ccm_course'];
        $alreadyclass_list_data = explode(",", $alreadyclass_list);
        foreach ($alreadyclass_list_data as $i) {
            $sql = "SELECT `course_time1`,`course_time2`,`course_time3` FROM `course_data` WHERE `course_id` LIKE '{$i}'";
            $alreadyclass_time = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到已選課程資訊" . $mysqli->error);
            $alreadyclass_time_data = $alreadyclass_time->fetch_assoc();
            $courseTimesList = [$alreadyclass_time_data['course_time1'], $alreadyclass_time_data['course_time2'], $alreadyclass_time_data['course_time3']];
            foreach ($courseTimesList as $courseTime) {
                if ($courseTime != '') {
                    if (in_array($courseTime, $chose_class_time)) {
                        $msgdanger = '課程衝堂';
                        $smarty->assign('msgdanger', $msgdanger);
                        return;
                    }
                }
            }
        }
        $alreadyclass_list = $alreadyclass_list . ',' . $chose_id;
        $sql = "UPDATE `ccm` SET `ccm_course` = '{$alreadyclass_list}',`ccm_credit` = `ccm_credit`+{$chose_class_credit} WHERE `ccm_id` = '{$user_id}'";
        $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,更新用戶課表" . $mysqli->error);
        $sql = "SELECT `course_quotaPick` FROM `course_data` WHERE `course_id` = '{$chose_id}'";
        $already_pick_person = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到課程已選人數" . $mysqli->error);
        $already_pick_person_data = $already_pick_person->fetch_assoc();
        $already_pick_person = $already_pick_person_data['course_quotaPick'];
        $already_pick_person = $already_pick_person + 1;
        $sql = "UPDATE `course_data` SET `course_quotaPick` = '{$already_pick_person}' WHERE `course_id` = '{$chose_id}'";
        $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,更新課程已選人數" . $mysqli->error);
        show_all_class();
        $msgsuccess = '加選成功';
        $smarty->assign('msgsuccess', $msgsuccess);

    }
}

function checkroom($room1, $room2, $room3)
{
    $room = '';
    if ($room1 != '') {
        $room = $room . $room1;
    }
    if ($room2 != '') {
        $room = $room . ',' . $room2;
    }
    if ($room3 != '') {
        $room = $room . ',' . $room3;
    }
    return $room;
}

function checktime($time1, $time2, $time3)
{
    $time = '';
    if ($time1 != '') {
        $time = $time . changetime($time1);
    }
    if ($time2 != '') {
        $time = $time . ',' . changetime($time2);
    }
    if ($time3 != '') {
        $time = $time . ',' . changetime($time3);
    }
    return $time;
}

function changetime($orgtime)
{
    if ($orgtime == '') {
        return '';
    }
    $week = substr($orgtime, 0, 1);
    $time = substr($orgtime, 1, 2);
    switch ($week) {
        case '1':
            $week = '星期一';
            break;
        case '2':
            $week = '星期二';
            break;
        case '3':
            $week = '星期三';
            break;
        case '4':
            $week = '星期四';
            break;
        case '5':
            $week = '星期五';
            break;
        case '6':
            $week = '星期六';
            break;
        case '7':
            $week = '星期日';
            break;
        default:
            $week = '';
            break;
    }
    return $week . '第' . $time . '節';
}

?>