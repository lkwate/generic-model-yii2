<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\FieldGenerator;

/* @var $this yii\web\View */
/* @var $model app\models\RelationParamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generic-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

        <?php foreach(FieldGenerator::generateField($form, $model) as $attr => $field): ?>

            <?= $field ?>

        <?php endforeach; ?>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
