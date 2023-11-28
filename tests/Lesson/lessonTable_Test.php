<?php

use PHPUnit\Framework\TestCase;

require_once('vendor/autoload.php');

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

function show_lessonTable($user_id)
{
    global $mysqli, $op, $user_id;
    $mysqli = new mysqli(_DB_HOST, _DB_ID, _DB_PW, _DB_NAME);
    $op = 'lessonTable';
    //時間，課程名，教室
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `ccm` WHERE `ccm_id` LIKE '%{$user_id}%' ORDER BY `ccm_id` ASC";
    $user_course = $mysqli->query($sql) or die("在查詢課表時發生錯誤" . $mysqli->error);
    $user_course_code = $user_course->fetch_assoc();
    $user_new_course = $user_course_code['ccm_course'];
    $user_course_array = explode(",", $user_new_course);
    $user_course_amount = count($user_course_array);
    $col = 0;//星期
    $row = 0;//節
    $init_flag = 0;
    for ($i = 0; $i < $user_course_amount; $i++) {
        $sql = "SELECT * FROM `course_data` WHERE `course_id` LIKE '%{$user_course_array[$i]}%' ";
        $course_detail = $mysqli->query($sql) or die("在查詢課程時發生錯誤" . $mysqli->error);
        //課程資料
        $course_detail_data = $course_detail->fetch_assoc();
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
    return $ccm_set;
}

/**
 * @covers "./src/lessonTable.php" function: show_lessonTable()
 */
class lessonTable_Test extends TestCase
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

    /** from ccm database
     * catch ccm_course_data
     * when user_id == ccm_id
     */
    public function test_show_lessonTable()
    {
        // Simulate user login
        $_SESSION['user_id'] = 4567;
        $user_id = "4567";

        // Mock course data
        $lesson_Table1 = '深度學習';
        $lesson_Table2 = '經濟學(一)';
        $lesson_Table3 = '經濟學(一)實習';
        $test_lesson_Table = show_lessonTable($user_id);
        $this->assertEquals($lesson_Table1, $test_lesson_Table[1][2]['course_name']);
        $this->assertEquals($lesson_Table1, $test_lesson_Table[1][3]['course_name']);
        $this->assertEquals($lesson_Table1, $test_lesson_Table[1][4]['course_name']);
        $this->assertEquals($lesson_Table2, $test_lesson_Table[2][2]['course_name']);
        $this->assertEquals($lesson_Table2, $test_lesson_Table[2][3]['course_name']);
        $this->assertEquals($lesson_Table2, $test_lesson_Table[2][4]['course_name']);
        $this->assertEquals($lesson_Table3, $test_lesson_Table[4][9]['course_name']);
        $this->assertEquals($lesson_Table3, $test_lesson_Table[4][10]['course_name']);
    }

}
