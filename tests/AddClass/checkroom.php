<?php

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


use PHPUnit\Framework\TestCase;

/**
 * @covers "./src/Addclass.php" function: checkroom()
 */
class checkroom_Test extends TestCase
{
    public function testcheckroom()
    {
        $room1 = '工319(電腦實習室)';
        $room2 = '';
        $room3 = '';
        $test_room = "工319(電腦實習室)";
        $room = checkroom($room1, $room2, $room3);
        $this->assertEquals($test_room, $room);

        $room1 = '資電105';
        $room2 = '資電248';
        $room3 = '';
        $test_room = "資電105,資電248";
        $room = checkroom($room1, $room2, $room3);
        $this->assertEquals($test_room, $room);


    }
}
