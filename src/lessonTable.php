<?php
require_once('header.php');
$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
$user_id = isset($_REQUEST['user_id']) ? filter_var($_REQUEST['user_id'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
if ($isuser == false) {
    $msg = '請先登入';
} else {
    show_lessonTable();
}
require("footer.php");

function show_lessonTable()
{
    global $smarty, $mysqli, $op, $user_id, $isuser, $msg;
    $op = 'lessonTable';
    //時間，課程名，教室
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `ccm` WHERE `ccm_id` LIKE '%{$user_id}%' ORDER BY `ccm_id` ASC";
    $user_course = $mysqli->query($sql) or die("在查詢課表時發生錯誤" . $mysqli->error);
    $user_course_code = $user_course->fetch_assoc();
    $user_new_course = $user_course_code['ccm_course'];
    $user_course_array = explode(",", $user_new_course);

//             echo $user_course_array[1];
//             echo nl2br("\n");
//             echo $user_course_array[2];
//             echo nl2br("\n");
//             echo $user_course_array[3];
//             echo nl2br("\n");
//             echo $user_course_array[4];
//             echo nl2br("\n");


    $user_course_amount = count($user_course_array);
//             echo $user_course_amount;
    $col = 0;//星期
    $row = 0;//節
//             $i= 2;
//             $sql = "SELECT * FROM `course_data` WHERE `course_id` LIKE '%{$user_course_array[$i]}%' ";
//             $course_detail = $mysqli->query($sql) or die("在查詢課程時發生錯誤".$mysqli->error);
//             $course_detail_data = $course_detail->fetch_assoc();
//             echo $course_detail_data['course_name'];
//             echo "\n";
//             echo $course_detail_data['course_time1'];
//             echo "\n";
//             echo $course_detail_data['course_time2'];
//             echo "\n";
//             echo $course_detail_data['course_time3'];
    $init_flag = 0;
    for ($i = 0; $i < $user_course_amount; $i++) {
        //$i = 1;
        $sql = "SELECT * FROM `course_data` WHERE `course_id` LIKE '%{$user_course_array[$i]}%' ";
        $course_detail = $mysqli->query($sql) or die("在查詢課程時發生錯誤" . $mysqli->error);
        //課程資料
        $course_detail_data = $course_detail->fetch_assoc();

//                 echo $course_detail_data['course_name'];
//                 echo nl2br("\n");


        $ccm_set[$col][$row] = $course_detail_data;
        //init ccm
        if ($init_flag == 0) {
            for ($col_t = 1; $col_t < 8; $col_t++) {
                for ($row_t = 1; $row_t < 15; $row_t++) {
                    if (empty($ccm_set[$col_t][$row_t]['course_name'])) {
                        $ccm_set[$col_t][$row_t]['course_name'] = ' ';
                    }
                }
            }
            $init_flag = 1;
        }
        //照時間放課程名稱
        if (!empty($course_detail_data['course_time1'])) {
            $course_day1 = intval(slideDay($course_detail_data['course_time1']));//星期
            $course_time1 = intval(slideTime($course_detail_data['course_time1']));//節
            $ccm_set[$course_day1][$course_time1]['course_name'] = $course_detail_data['course_name'];
        }
        if (!empty($course_detail_data['course_time2'])) {
            $course_day2 = intval(slideDay($course_detail_data['course_time2']));//星期
            $course_time2 = intval(slideTime($course_detail_data['course_time2']));//節
            $ccm_set[$course_day2][$course_time2]['course_name'] = $course_detail_data['course_name'];
        }
        if (!empty($course_detail_data['course_time3'])) {
            $course_day3 = intval(slideDay($course_detail_data['course_time3']));//星期
            $course_time3 = intval(slideTime($course_detail_data['course_time3']));//節
            $ccm_set[$course_day3][$course_time3]['course_name'] = $course_detail_data['course_name'];
        }
    }
    $smarty->assign('ccm_set', $ccm_set);
//             for($col_t = 1;$col_t<8;$col_t++){
//                 for($row_t = 1;$row_t<11;$row_t++){
//                     if($ccm_set[$col_t][$row_t]['course_name'] != ' '){
//                         echo $ccm_set[$col_t][$row_t]['course_name'];
//                         echo nl2br("\n");
//                     }
//                 }
//             }
}


function slideDay($orgTime)
{
    if ($orgTime == '') {
        return '';
    }
    $week = substr($orgTime, 0, 1);
    return $week;
}

function slideTime($orgTime)
{
    if ($orgTime == '') {
        return '';
    }
    $time = substr($orgTime, 1, 2);
    return $time;
}

?>