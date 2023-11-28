<?php
function show_class($class_id, $class_name, $class_teacher)
{
    global $smarty, $mysqli, $op, $msg, $all_class;
    $mysqli = new mysqli(_DB_HOST, _DB_ID, _DB_PW, _DB_NAME);
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
                //$smarty->assign('all_class',$all_class);
                return $all_class;
                $op = 'search_result';
            } else {
                $msg = '查無資料';
                return $msg;
            }
            //$smarty->assign('class_id',$class_id);
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
                //$smarty->assign('all_class',$all_class);
                return $all_class;
                $op = 'search_class_result';

            } else {
                $msg = '查無資料';
                return $msg;
            }
            //$smarty->assign('class_name',$class_name);
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
                //$smarty->assign('all_class',$all_class);
                $op = 'search_class_teacher';
                return $all_class;
            } else {
                $msg = '查無資料';
                return $msg;
            }
            //$smarty->assign('class_teacher',$class_teacher);
        }
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
/**
 *
 * @covers "./src/Search.php" function: show_class()
 */
//整體測試
class Search_test extends \PHPUnit\Framework\TestCase
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

    //測試課程代號
    public function testID()
    {
        $class_id = 1437;
        $class_name = "";
        $class_teacher = "";

        $test_all_class = [
            'course_id' => '1437',
            'course_name' => "軟體工程實務",
            'course_teacher' => "許懷中",
            'course_credit' => 3,
            'course_RE' => "選修",
            'course_garde' => "資訊三甲",
            'course_time' => "星期三第06節,星期三第07節,星期三第08節",
            'course_room' => "工319(電腦實習室)",
            'course_people' => "64/70",
        ];
        $all_class = show_class($class_id, $class_name, $class_teacher);
        $this->assertEquals($test_all_class['course_id'], $all_class[0]['course_id']);
        $this->assertEquals($test_all_class['course_name'], $all_class[0]['course_name']);
        $this->assertEquals($test_all_class['course_teacher'], $all_class[0]['course_teacher']);
        $this->assertEquals($test_all_class['course_credit'], $all_class[0]['course_credit']);
        $this->assertEquals($test_all_class['course_RE'], $all_class[0]['course_RE']);
        $this->assertEquals($test_all_class['course_garde'], $all_class[0]['course_garde']);
        $this->assertEquals($test_all_class['course_time'], $all_class[0]['course_time']);
        $this->assertEquals($test_all_class['course_room'], $all_class[0]['course_room']);
        $this->assertEquals($test_all_class['course_people'], $all_class[0]['course_people']);


        //測試錯誤
        $class_id = 123;
        $class_name = "";
        $class_teacher = "";

        $testmsg = "查無資料";

        $msg = show_class($class_id, $class_name, $class_teacher);
        $this->assertEquals($msg, $testmsg);
    }

    //測試課程名稱
    public function testname()
    {
        $class_id = "";
        $class_name = "軟體工程實務";
        $class_teacher = "";

        $test_all_class = [
            'course_id' => '1437',
            'course_name' => "軟體工程實務",
            'course_teacher' => "許懷中",
            'course_credit' => 3,
            'course_RE' => "選修",
            'course_garde' => "資訊三甲",
            'course_time' => "星期三第06節,星期三第07節,星期三第08節",
            'course_room' => "工319(電腦實習室)",
            'course_people' => "64/70",
        ];
        $all_class = show_class($class_id, $class_name, $class_teacher);
        $this->assertEquals($test_all_class['course_id'], $all_class[0]['course_id']);
        $this->assertEquals($test_all_class['course_name'], $all_class[0]['course_name']);
        $this->assertEquals($test_all_class['course_teacher'], $all_class[0]['course_teacher']);
        $this->assertEquals($test_all_class['course_credit'], $all_class[0]['course_credit']);
        $this->assertEquals($test_all_class['course_RE'], $all_class[0]['course_RE']);
        $this->assertEquals($test_all_class['course_garde'], $all_class[0]['course_garde']);
        $this->assertEquals($test_all_class['course_time'], $all_class[0]['course_time']);
        $this->assertEquals($test_all_class['course_room'], $all_class[0]['course_room']);
        $this->assertEquals($test_all_class['course_people'], $all_class[0]['course_people']);

        //測試錯誤
        $class_id = "";
        $class_name = "電子學(一)";
        $class_teacher = "";

        $testmsg = "查無資料";

        $msg = show_class($class_id, $class_name, $class_teacher);
        $this->assertEquals($msg, $testmsg);
    }

    //測試課程老師
    public function testteacher()
    {
        $class_id = "";
        $class_name = "";
        $class_teacher = "許懷中";

        $test_all_class = [
            'course_id' => '1437',
            'course_name' => "軟體工程實務",
            'course_teacher' => "許懷中",
            'course_credit' => 3,
            'course_RE' => "選修",
            'course_garde' => "資訊三甲",
            'course_time' => "星期三第06節,星期三第07節,星期三第08節",
            'course_room' => "工319(電腦實習室)",
            'course_people' => "64/70",
        ];
        $all_class = show_class($class_id, $class_name, $class_teacher);
        $this->assertEquals($test_all_class['course_id'], $all_class[0]['course_id']);
        $this->assertEquals($test_all_class['course_name'], $all_class[0]['course_name']);
        $this->assertEquals($test_all_class['course_teacher'], $all_class[0]['course_teacher']);
        $this->assertEquals($test_all_class['course_credit'], $all_class[0]['course_credit']);
        $this->assertEquals($test_all_class['course_RE'], $all_class[0]['course_RE']);
        $this->assertEquals($test_all_class['course_garde'], $all_class[0]['course_garde']);
        $this->assertEquals($test_all_class['course_time'], $all_class[0]['course_time']);
        $this->assertEquals($test_all_class['course_room'], $all_class[0]['course_room']);
        $this->assertEquals($test_all_class['course_people'], $all_class[0]['course_people']);

        //測試錯誤
        $class_id = "";
        $class_name = "";
        $class_teacher = "派大星";

        $testmsg = "查無資料";

        $msg = show_class($class_id, $class_name, $class_teacher);
        $this->assertEquals($msg, $testmsg);
    }
}