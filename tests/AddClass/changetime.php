<?php

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


use PHPUnit\Framework\TestCase;

/**
 * @covers "./src/Addclass.php" function: changetime()
 */
class changetime_Test extends TestCase
{
    public function testchangetime()
    {
        //306時間轉中文
        $orgtime = '306';
        $test_time = "星期三第06節";
        $time = changetime($orgtime);
        $this->assertEquals($test_time, $time);

        //510時間轉中文
        $orgtime = '510';
        $test_time = "星期五第10節";
        $time = changetime($orgtime);
        $this->assertEquals($test_time, $time);


    }
}
