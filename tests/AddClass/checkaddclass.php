<?php

function checkaddclass($user_id, $chose_id)
{
    global $class_id, $op, $msg, $isuser, $all_class;
    $mysqli = new mysqli(_DB_HOST, _DB_ID, _DB_PW, _DB_NAME);

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
        return $msgdanger;
//        $smarty->assign('msgdanger',$msgdanger);
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
                        return $msgdanger;
//                        $smarty->assign('msgdanger',$msgdanger);
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
//        show_all_class();
        $msgsuccess = '加選成功';
        return $msgsuccess;
//        $smarty->assign('msgsuccess',$msgsuccess);
        return;
    }
}

use PHPUnit\Framework\TestCase;

/**
 * @covers "./src/Addclass.php" function: checkaddclass()
 */
class Addclass_checkaddclass_Test extends TestCase
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

    public function testcheckaddclassWhenUserIsLoggedIn()
    {
        //加選課程1437衝堂
        // Simulate user login
        $_SESSION['user_id'] = 123;
        $user_id = "123";
        $chose_id = 1437;

        $test_msg = "課程衝堂";

        $msg = checkaddclass($user_id, $chose_id);
        $this->assertEquals($test_msg, $msg);


        //加選課程9999超過規定學分
        // Simulate user login
        $_SESSION['user_id'] = 123;
        $user_id = "123";
        $chose_id = 9999;

        $test_msg = "超過規定學分";

        $msg = checkaddclass($user_id, $chose_id);
        $this->assertEquals($test_msg, $msg);

        //加選課程1420加選成功
        // Simulate user login
        $_SESSION['user_id'] = 123;
        $user_id = "123";
        $chose_id = 1420;

        $test_msg = "加選成功";

        $msg = checkaddclass($user_id, $chose_id);
        $this->assertEquals($test_msg, $msg);
    }
}
