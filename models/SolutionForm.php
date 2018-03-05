<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SolutionForm extends Model
{
    public $number;
    public $array;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['number'], 'required', 'message' => 'Число не может быть пустым'],
            [['number'], 'integer', 'message' => 'Число должно быть целым'],
            [['array'], 'required', 'message' => 'Массив не может быть пустым'],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function findSolution()
    {
        if ($this->validate()) {
            $solution = Solution::findOne(['user_id' => Yii::$app->getUser()->id]) ?: new Solution();
            return $solution->findSolution($this->number, $this->array);
        }
        return false;
    }
}
