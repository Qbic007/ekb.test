<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class User *
 * @var $id int
 * @var $username string
 * @var $password string
 * @package app\models
 */
class Solution extends ActiveRecord
{
    public function findSolution($number = 0, $array = '')
    {
        $array = explode(',', $array);

        $number = (int)$number;
        $array = array_map(function ($item) {
            return (int)$item;
        }, $array);

        $arrayWalker = new ArrayWalker();
        $solution = $arrayWalker->solution($number, $array);

        $this->user_id = \Yii::$app->getUser()->id;
        $this->number = $number;
        $this->array = json_encode($array);
        $this->solution = $solution;
        $this->save();

        return $this;
    }

}
