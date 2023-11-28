<?php

use PHPUnit\Framework\TestCase;

require_once('vendor/autoload.php');

function check_cancel_class($chose_cancel_id, $user_id)
{
    global $mysqli, $op, $msg;
    $mysqli = new mysqli(_DB_HOST, _DB_ID, _DB_PW, _DB_NAME);
    $user_id = $_SESSION['user_id'];
    $op = "lessonCancel";

    $sql = "SELECT `ccm_credit` FROM `ccm` WHERE `ccm_id` = '{$user_id}'";
    $user_credit = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶資料" . $mysqli->error);
    $user_credit_data = $user_credit->fetch_assoc();
    $user_old_credit = $user_credit_data['ccm_credit'];
    $sql = "SELECT `rules`.`rules_min_credit` FROM `rules` JOIN `ccm` ON `rules`.`rules_depart` = `ccm`.`ccm_grade` WHERE `ccm`.`ccm_id` = '{$user_id}'";
    $user_rules_min_credit = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶規則" . $mysqli->error);
    $user_rules_min_credit_data = $user_rules_min_credit->fetch_assoc();
    $user_rules_min_credit = $user_rules_min_credit_data['rules_min_credit'];
    $sql = "SELECT `course_credit` FROM `course_data` WHERE `course_id` = '{$chose_cancel_id}'";
    $chose_class_credit = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到課程學分" . $mysqli->error);
    $chose_class_credit_data = $chose_class_credit->fetch_assoc();
    $chose_class_credit = $chose_class_credit_data['course_credit'];

    $sql = "SELECT `rules`.`rules_class` FROM `rules` JOIN `ccm` ON `rules`.`rules_depart` = `ccm`.`ccm_grade` WHERE `ccm`.`ccm_id` = '{$user_id}'";
    $user_rules_class = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶規則" . $mysqli->error);
    $user_rules_class_data = $user_rules_class->fetch_assoc();
    $user_rules_class = $user_rules_class_data['rules_class'];
    $user_rules_class = explode(",", $user_rules_class);

    $course_flag = false;

    for ($i = 0; $i < count($user_rules_class); $i++) {
        if ($chose_cancel_id == $user_rules_class[$i]) {
            $course_flag = true;
        }
    }

    $sql = "SELECT `course_RE` FROM `course_data` WHERE `course_id` = '{$chose_cancel_id}'";
    $chose_class_RE = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到課程" . $mysqli->error);
    $chose_class_RE_data = $chose_class_RE->fetch_assoc();
    $chose_class_RE = $chose_class_RE_data['course_RE'];

    if ($course_flag == true) {
        $msg = '不可以退選必修!';
        return $msg;
    } else if ($user_old_credit - $chose_class_credit < $user_rules_min_credit) {
        $msg = '低於規定學分';
        return $msg;
    } else {
        $sql = "SELECT `ccm_course` FROM `ccm` WHERE `ccm_id` = '{$user_id}'";
        $alreadyclass = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶課表" . $mysqli->error);
        $alreadyclass_data = $alreadyclass->fetch_assoc();
        $alreadyclass_list = $alreadyclass_data['ccm_course'];
        $alreadyclass_array = explode(",", $alreadyclass_list);
        $new_list = '';
        $list_first_count = 0;
        //刪除課程
        for ($i = 0; $i < count($alreadyclass_array); $i++) {
            if ($alreadyclass_array[$i] == $chose_cancel_id) {
                array_splice($alreadyclass_array, $i, 1);
                array_filter($alreadyclass_array);
            } else if ($alreadyclass_array[$i] != '' && $list_first_count == 0) {
                $new_list = $alreadyclass_array[$i];
                $list_first_count = 1;
            } else if ($alreadyclass_array[$i] != '' && $list_first_count != 0) {
                $new_list = $new_list . ',' . $alreadyclass_array[$i];
            }
        }


        $sql = "UPDATE `ccm` SET `ccm_credit` = `ccm_credit`-{$chose_class_credit} WHERE `ccm_id` = '{$user_id}'";
        $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,更新用戶學分" . $mysqli->error);
        $sql = "SELECT `course_quotaPick` FROM `course_data` WHERE `course_id` = '{$chose_cancel_id}'";
        $already_pick_person = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到課程已選人數" . $mysqli->error);
        $already_pick_person_data = $already_pick_person->fetch_assoc();
        $already_pick_person = $already_pick_person_data['course_quotaPick'];
        $already_pick_person = $already_pick_person - 1;
        $sql = "UPDATE `course_data` SET `course_quotaPick` = '{$already_pick_person}' WHERE `course_id` = '{$chose_cancel_id}'";
        $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,更新課程已選人數" . $mysqli->error);
        $sql = "UPDATE `ccm` SET `ccm_course` = '{$new_list}' WHERE `ccm_id` = '{$user_id}'";
        $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,更新用戶課表" . $mysqli->error);

//        show_course_selected();
        $msg = '退選成功';
        $course_flag = false;
        return $msg;
    }
}

/**
 * @covers "./src/lessonCancel.php" function: check_cancel_class()
 */
class Check_cacel_class_Test extends TestCase
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

    /** check_cancel_class function
     * error situation：'低於規定學分'
     */
    public function testCheck_cancel_class_error1()
    {
        $_SESSION['user_id'] = 456;
        $user_id = "456";
        $chose_cancel_id = '0103';

        $test_check_result = check_cancel_class($chose_cancel_id, $user_id);
        $this->assertEquals('不可以退選必修!', $test_check_result);
    }

    /** check_cancel_class function
     * error situation：'低於規定學分'
     */
    public function testCheck_cancel_class_error2()
    {
        $_SESSION['user_id'] = 4567;
        $user_id = "4567";
        $chose_cancel_id = '1456';

        $test_check_result = check_cancel_class($chose_cancel_id, $user_id);
        $this->assertEquals('低於規定學分', $test_check_result);
    }

    /** check_cancel_class function
     * success situation
     */
    public function testCheck_cancel_class_succed()
    {
        $_SESSION['user_id'] = 456;
        $user_id = "456";
        $chose_cancel_id = '3093';

        $test_check_result = check_cancel_class($chose_cancel_id, $user_id);
        $this->assertEquals('退選成功', $test_check_result);
    }

}
