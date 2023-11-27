<?php
require_once('header.php');
$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
$class_id = isset($_REQUEST['class_id']) ? filter_var($_REQUEST['class_id'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$class_name = isset($_REQUEST['class_name']) ? filter_var($_REQUEST['class_name'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$class_teacher = isset($_REQUEST['class_teacher']) ? filter_var($_REQUEST['class_teacher'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$all_class = isset($all_class) ? $all_class : array();
if ($isuser == false) {
    $msg = '請先登入';
} else {
    show_class();
}
require("footer.php");

function show_class()
{
    global $smarty, $mysqli, $class_id, $op, $msg, $all_class, $class_name, $class_teacher;
    $op = 'search';
    if ($class_id != '' || $class_name != '' || $class_teacher != '') {
        //改
        if ($class_id != '' && $class_name == '' || $class_id != '' && $class_teacher == '') {
            //改
            $sql = "SELECT * FROM `course_data` WHERE `course_id` LIKE '%{$class_id}%' ORDER BY `course_id` ASC";
            $course = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程" . $mysqli->error);
            if (mysqli_num_rows($course) != 0) {
                $i = 0;
                while ($class = $course->fetch_assoc()) {
                    $all_class[$i] = $class;
                    $all_class[$i]['course_time'] = checktime($class['course_time1'], $class['course_time2'], $class['course_time3']);
                    $all_class[$i]['course_room'] = checkroom($class['course_room1'], $class['course_room2'], $class['course_room3']);
                    $all_class[$i]['course_people'] = $class['course_quotaPick'] . '/' . $class['course_quota'];
                    $i++;
                }
                $smarty->assign('all_class', $all_class);
                $op = 'search_result';
            } else {
                $msg = '查無資料';
            }
            $smarty->assign('class_id', $class_id);
        } //改
        else if ($class_name != '' && $class_id == '' || $class_name != '' && $class_teacher == '') {
            //改
            $sql = "SELECT * FROM `course_data` WHERE `course_name` LIKE '%{$class_name}%' ";
            $course_name = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程" . $mysqli->error);
            if (mysqli_num_rows($course_name) != 0) {
                $i = 0;
                while ($class = $course_name->fetch_assoc()) {
                    $all_class[$i] = $class;
                    $all_class[$i]['course_time'] = checktime($class['course_time1'], $class['course_time2'], $class['course_time3']);
                    $all_class[$i]['course_room'] = checkroom($class['course_room1'], $class['course_room2'], $class['course_room3']);
                    $all_class[$i]['course_people'] = $class['course_quotaPick'] . '/' . $class['course_quota'];
                    $i++;
                }
                $smarty->assign('all_class', $all_class);
                $op = 'search_class_result';
            } else {
                $msg = '查無資料';
            }
            $smarty->assign('class_name', $class_name);
        } //改
        else if ($class_teacher != '' && $class_id == '' || $class_teacher != '' && $class_name == '') {
            //改
            $sql = "SELECT * FROM `course_data` WHERE `course_teacher` LIKE '%{$class_teacher}%' ";
            $course_teacher = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程" . $mysqli->error);
            if (mysqli_num_rows($course_teacher) != 0) {
                $i = 0;
                while ($class = $course_teacher->fetch_assoc()) {
                    $all_class[$i] = $class;
                    $all_class[$i]['course_time'] = checktime($class['course_time1'], $class['course_time2'], $class['course_time3']);
                    $all_class[$i]['course_room'] = checkroom($class['course_room1'], $class['course_room2'], $class['course_room3']);
                    $all_class[$i]['course_people'] = $class['course_quotaPick'] . '/' . $class['course_quota'];
                    $i++;
                }
                $smarty->assign('all_class', $all_class);
                $op = 'search_class_teacher';
            } else {
                $msg = '查無資料';
            }
            $smarty->assign('class_teacher', $class_teacher);
        }
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