<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\ArrayWalker;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ArrayController extends Controller
{
    /**
     * This command walk through the array and search solution based on the RULE.
     */

    /**
     * @param int $number
     * @param string $array
     * @return int
     */
    public function actionIndex(int $number = 0, string $array = '')
    {
        $array = explode(',', $array);

        $number = (int)$number;
        $array = array_map(function ($item) {
            return (int)$item;
        }, $array);

        $arrayWalker = new ArrayWalker($number, $array);
        $solution = $arrayWalker->solution();

        echo $solution . "\n";

        return ExitCode::OK;
    }
}
