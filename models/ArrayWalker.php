<?php
/**
 * Created by PhpStorm.
 * User: qbic0_000
 * Date: 05.03.2018
 * Time: 22:05
 */

namespace app\models;

/**
 * Class ArrayWalker
 * @package app\models
 */
class ArrayWalker
{
    /**
     * @var int
     */
    protected $number = 0;
    /**
     * @var array
     */
    protected $array = [];
    /**
     * @var int
     */
    protected $size = 0;

    /**
     * ArrayWalker constructor.
     * @param $number
     * @param $array
     */
    public function __construct($number, $array)
    {
        $this->number = $number;
        $this->array = $array;
        $this->size = count($array);
    }

    /**
     * @return int
     */
    public function solution()
    {
        $counter = 0;
        $array_forward = array_map(function ($item) use (&$counter) {
            if ($item == $this->number)
                $counter++;
            return $counter;
        }, $this->array);

        $counter = 0;
        $array_back = [];
        for ($i = $this->size - 1; $i >= 0; $i--) {
            if ($this->array[$i] != $this->number)
                $counter++;
            $array_back[$i] = $counter;
        }

        for ($i = 1; $i < $this->size; $i++) {
            if ($array_forward[$i - 1] && $array_forward[$i] && ($array_forward[$i - 1] == $array_back[$i]))
                return $i;
        }

        return -1;

    }
}