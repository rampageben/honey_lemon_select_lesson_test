<?php

function show_all_class($user_id, $class_id)
{
    global $smarty, $mysqli, $op, $msg, $isuser, $all_class;
    $mysqli = new mysqli(_DB_HOST, _DB_ID, _DB_PW, _DB_NAME);
    $alreadyclass_list = array();

    $op = 'addclass';
    $user_id = $_SESSION['user_id'];

    if ($class_id != '') {
//        return $class_id;
        $sql = "SELECT * FROM `course_data` WHERE `course_id` LIKE '%{$class_id}%' ORDER BY `course_id` ASC";
        $result = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程" . $mysqli->error);
        if (mysqli_num_rows($result) != 0) {
            $sql = "SELECT `ccm_course` FROM `ccm` WHERE `ccm_id` = '{$user_id}'";
            $alreadyclass = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶課表" . $mysqli->error);
            $alreadyclass_data = $alreadyclass->fetch_assoc();

            $alreadyclass_list = explode(",", $alreadyclass_data['ccm_course']);
//            return $alreadyclass_list;
            $i = 0;
            while ($class = $result->fetch_assoc()) {
                $all_class[$i] = $class;
                $all_class[$i]['course_time'] = checktime($class['course_time1'], $class['course_time2'], $class['course_time3']);
                $all_class[$i]['course_room'] = checkroom($class['course_room1'], $class['course_room2'], $class['course_room3']);
                $all_class[$i]['course_people'] = $class['course_quotaPick'] . '/' . $class['course_quota'];
                if ($class['course_quotaPick'] == $class['course_quota']) {
                    $all_class[$i]['already'] = "true";
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
//            $smarty->assign('all_class',$all_class);
            $op = 'search_add_result';
            return $all_class;
        } else {
            $msg = '查無資料';
            return $msg;
        }
//        $smarty->assign('class_id',$class_id);
    }
}

//function checkroom($room1,$room2,$room3){
//    $room = '';
//    if($room1!=''){
//        $room =  $room.$room1;}
//    if($room2!=''){
//        $room =  $room.','.$room2;}
//    if($room3!=''){
//        $room=  $room.','.$room3;}
//    return $room;
//}

//function checktime($time1,$time2,$time3){
//    $time = '';
//    if($time1!=''){
//        $time =  $time.changetime($time1);}
//    if($time2!=''){
//        $time =  $time.','.changetime($time2);}
//    if($time3!=''){
//        $time=  $time.','.changetime($time3);}
//    return $time;
//}

//function changetime($orgtime){
//    if($orgtime==''){
//        return '';}
//    $week = substr($orgtime,0,1);
//    $time = substr($orgtime,1,2);
//    switch($week){
//        case '1':
//            $week = '星期一';
//            break;
//        case '2':
//            $week = '星期二';
//            break;
//        case '3':
//            $week = '星期三';
//            break;
//        case '4':
//            $week = '星期四';
//            break;
//        case '5':
//            $week = '星期五';
//            break;
//        case '6':
//            $week = '星期六';
//            break;
//        case '7':
//            $week = '星期日';
//            break;
//        default:
//            $week = '';
//            break;
//    }
//    return $week.'第'.$time.'節';
//}


use PHPUnit\Framework\TestCase;

/**
 * @covers "./src/Addclass.php" function: show_all_class()
 */
class Addclass_show_all_class_Test extends TestCase
{
    public function setUp(): void
    {
        // Define database connection constants
        if (!defined("_name")) {
            define("_name", "honey lemon select lesson");
        }
        if (!defined("_DB_HOST")) {
            define("_DB_HOST", "localhost");
        }
        if (!defined("_DB_ID")) {
            define("_DB_ID", "root");
        }
        if (!defined("_DB_PW")) {
            define("_DB_PW", "");
        }
        if (!defined("_DB_NAME")) {
            define("_DB_NAME", "lesson_database");
        }

    }

    public function testShowAllClassWhenUserIsLoggedIn()
    {
        //找class_id 1437
        // Simulate user login
        $_SESSION['user_id'] = 123;
        $user_id = "123";
        $class_id = 1437;

        // Mock course data
        $test_all_class = [
            'course_id' => '1437',
            'course_name' => "軟體工程實務",
            'course_teacher' => "許懷中",
            'course_credit' => 3,
            'course_RE' => "選修",
            'course_garde' => "資訊三甲",
            'course_time' => "星期三第06節,星期三第07節,星期三第08節",
            'course_room' => "工319(電腦實習室)",
            'course_people' => "65/70",
            'already' => "false",
        ];

        $all_class = show_all_class($user_id, $class_id);
        $this->assertEquals($test_all_class['course_id'], $all_class[0]['course_id']);
        $this->assertEquals($test_all_class['course_name'], $all_class[0]['course_name']);
        $this->assertEquals($test_all_class['course_teacher'], $all_class[0]['course_teacher']);
        $this->assertEquals($test_all_class['course_credit'], $all_class[0]['course_credit']);
        $this->assertEquals($test_all_class['course_RE'], $all_class[0]['course_RE']);
        $this->assertEquals($test_all_class['course_garde'], $all_class[0]['course_garde']);
        $this->assertEquals($test_all_class['course_time'], $all_class[0]['course_time']);
        $this->assertEquals($test_all_class['course_room'], $all_class[0]['course_room']);
        $this->assertEquals($test_all_class['course_people'], $all_class[0]['course_people']);
        $this->assertEquals($test_all_class['already'], $all_class[0]['already']);


        //找不到資料
        // Simulate user login
        $_SESSION['user_id'] = 123;
        $user_id = "123";
        $class_id = 99999;

        // Mock course data
        $test_msg = '查無資料';

        $msg = show_all_class($user_id, $class_id);
        $this->assertEquals($test_msg, $msg);

    }


}
