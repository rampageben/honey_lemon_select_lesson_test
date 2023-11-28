<?php

use PHPUnit\Framework\TestCase;

require_once('vendor/autoload.php');


//catch course data when ccm_course ==
function show_course_selected_course_data($ccm_course_array, $user_id)
{
    global $mysqli, $op, $user_id, $msg;
    $mysqli = new mysqli(_DB_HOST, _DB_ID, _DB_PW, _DB_NAME);
    $op = 'lessonCancel';
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `ccm` WHERE `ccm_id` LIKE '%{$user_id}%'";
    $result = $mysqli->query($sql) or die("在查詢課表時發生錯誤" . $mysqli->error);

    if (mysqli_num_rows($result) != 0) {
        $ccm_course_data = $result->fetch_assoc();
        $ccm_course_array = explode(",", $ccm_course_data['ccm_course']);

        for ($i = 0; $i < count($ccm_course_array); $i++) {
            if ($ccm_course_array[$i] != '') {
                $sql = "SELECT * FROM `course_data` WHERE `course_id` LIKE '%{$ccm_course_array[$i]}%' ";
                $course_d = $mysqli->query($sql) or die("在查詢課程時發生錯誤" . $mysqli->error);
                $course_d_f = $course_d->fetch_assoc();
                $ccm_course_forCancel[$i]['course_name'] = $course_d_f['course_name'];
                $ccm_course_forCancel[$i]['course_credit'] = $course_d_f['course_credit'];
                $ccm_course_forCancel[$i]['course_RE'] = $course_d_f['course_RE'];
                $ccm_course_forCancel[$i]['course_id'] = $course_d_f['course_id'];

            }
        }
        return $ccm_course_forCancel;
    } else {
        $msg = '查無資料';
        return $msg;
    }
}


/**
 * @covers "./src/lessonCancel.php" function: show_course_selected()
 */
class lessonCancel_show_course_selected_Test extends TestCase
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

    /** from course database
     * catch course_credit, course_RE, course_name, course_id
     *
     */
    public function testShowsSelectedCoursesCcm_course_credit()
    {
        $_SESSION['user_id'] = 456;
        $user_id = "456";
        $ccm_course_array = ['0103',];

        $course_data = [
            'course_id' => '0103',
            'course_credit' => '3',
            'course_name' => '經濟學(一)',
            'course_RE' => '必修',
        ];
        $test_course_data = show_course_selected_course_data($ccm_course_array[0], $user_id);
        $this->assertEquals($course_data['course_id'], $test_course_data [0]['course_id']);
        $this->assertEquals($course_data['course_credit'], $test_course_data [0]['course_credit']);
        $this->assertEquals($course_data['course_name'], $test_course_data[0]['course_name']);
        $this->assertEquals($course_data['course_RE'], $test_course_data [0]['course_RE']);
    }

}
