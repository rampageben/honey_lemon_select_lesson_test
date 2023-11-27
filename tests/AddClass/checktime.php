<?php

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

use PHPUnit\Framework\TestCase;

/**
 * @covers "./src/Addclass.php" function: checktime()
 */
class checktime extends TestCase
{
    public function testchecktime()
    {
        //時間306 307 308轉中文
        $time1 = '306';
        $time2 = '307';
        $time3 = '308';
        $test_time = "星期三第06節,星期三第07節,星期三第08節";
        $time = checktime($time1, $time2, $time3);
        $this->assertEquals($test_time, $time);

        //時間306 307 308轉中文
        $time1 = '106';
        $time2 = '107';
        $time3 = '';
        $test_time = "星期一第06節,星期一第07節";
        $time = checktime($time1, $time2, $time3);
        $this->assertEquals($test_time, $time);
    }
}
