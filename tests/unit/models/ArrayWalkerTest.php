<?php

namespace tests\models;

use app\models\ArrayWalker;
use PHPUnit\Framework\TestCase;

class ArrayWalkerTest extends TestCase
{
    public function testSolution()
    {
        $arrayWalker = new ArrayWalker();

        $this->assertEquals($arrayWalker->solution(5, [5,5,5,1]), 1);
    }
}
