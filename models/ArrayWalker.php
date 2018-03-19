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
     * @return int
     */
    public function solution($number, $array)
    {
        $size = count($array);
        $counter = 0;
        $left_index = 0;
        $right_index = 0;

        for ($i = 0; $i < $size; $i++) {

            if ($left_index + $right_index >= $size)
                break;

            $left_counter = $counter;
            $right_counter = $counter;

            if ($array[$left_index] === $number)
                $left_counter++;

            if ($array[$size - $right_index - 1] !== $number)
                $right_counter++;

            if ($left_counter > $right_counter) {
                $right_index++;
                continue;
            }
            if ($left_counter < $right_counter) {
                $left_index++;
                continue;
            }
            $left_index++;
            $right_index++;
            $counter = $left_counter;
        }

        return $counter ? $left_index : -1;

    }
}