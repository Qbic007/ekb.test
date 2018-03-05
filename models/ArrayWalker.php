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
     * @var int
     */
    protected $left_key = 0;
    /**
     * @var int
     */
    protected $right_key = 0;
    /**
     * @var int|null
     */
    protected $counter = null;

    /**
     * ArrayWalker constructor.
     * @param $number
     * @param $array
     */
    public function __construct($number, $array)
    {
        $this->number = $number;
        $this->array = $array;
        end($this->array);
        $this->right_key = key($this->array);
        $this->size = $this->right_key + 1;
    }

    protected function step_left()
    {
        if ($this->number == $this->array[$this->left_key]) {
            $this->counter++;
        }
        $this->left_key++;
    }

    protected function step_right()
    {
        if ($this->number != $this->array[$this->right_key]) {
            $this->counter--;
        }
        $this->right_key--;
    }

    /**
     * @return int
     */
    public function solution()
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->counter == 0) {
                $this->step_left();
                continue;
            }
            $this->step_right();
        }

        if ($this->counter === 0)
            return $this->left_key;

        return -1;
    }
}