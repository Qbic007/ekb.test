<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'My Yii Application';
$solution = $user ? $user->solution() : null;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Ну, приветики!</h1>
        <? if (Yii::$app->user->isGuest) { ?>
            <p class="lead">Чтобы увидеть то, что требуется - авторизуйтесь!</p>
        <? } ?>
    </div>

    <? if (!Yii::$app->user->isGuest) { ?>
        <div class="body-content">
            <?php if ($solution) { ?>
                <p class="lead">Последние вычисленные данные:</p>
                <p>Число: <?= $solution->number ?></p>
                <p>Массив: <?= $solution->array ?></p>
                <p>Результат: <?= $solution->solution ?></p>
            <? } ?>
            <p class="lead">Введите входные данные в поля ниже:</p>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>

            <?= $form->field($model, 'number')->label('Число')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'array')->label('Массив')->textInput() ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Найти решение', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <p class="lead">Данное миниприложение принимает два входных параметра - целое число и массив.
                Массив необходимо вводить как простой набор целых чисел через запятую.</p>
            <p class="lead">На выходе приложение делит, если это возможно, входной массив по определенному правилу
                (правило читать ниже) и возвращает индекс числа перед которым ставится
                разделитель, либо число -1, если это невозможно.</p>
            <p class="lead">Правило: Необходимо разделить входной массив таким образом, чтобы количество чисел N в
                первой части оказалось равно
                количеству чисел не равных N во второй и это количество должно быть больше 0.</p>

        </div>
    <? } ?>


</div>
