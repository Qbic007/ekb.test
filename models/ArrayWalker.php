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
        $this->size = count($array);
    }

    protected function reset_parameters()
    {
        $this->counter = null;
        $this->left_key = 0;
        $this->right_key = $this->size - 1;
    }

    protected function stepLeft()
    {
        if ($this->number == $this->array[$this->left_key]) {
            $this->counter += 1;
        }
        $this->left_key++;
    }

    protected function stepRight()
    {
        if ($this->number != $this->array[$this->right_key]) {
            $this->counter -= 1;
        }
        $this->right_key--;
    }

    /**
     * @return int
     */
    public function solution()
    {
        $this->reset_parameters();

        for ($i = 0; $i < $this->size; $i++) {
            if ($this->counter == 0) {
                $this->stepLeft();
                continue;
            }
            $this->stepRight();
        }

        if ($this->counter === 0)
            return $this->left_key;

        $this->reset_parameters();

        for ($i = 0; $i < $this->size; $i++) {
            if ($this->counter == 0) {
                $this->stepRight();
                continue;
            }
            $this->stepLeft();
        }

        if ($this->counter === 0)
            return $this->left_key;

        return -1;
    }
}