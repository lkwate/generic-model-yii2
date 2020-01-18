<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\modules\genericmodel\models\FieldGenerator;
use Yii;

/* @var $this yii\web\View */
/* @var $model app\models\CleEtrangereParam */
/* @var $form yii\widgets\ActiveForm */
$tableName = get_class($model)::tableName();

?>

<div class="generic-model-form">

    <?php $form = ActiveForm::begin(); ?>
        <?php 
            $fields = FieldGenerator::generateField($form, $model); 
        ?>
        <?php foreach ($fields as $attr => $field): ?>
            <?= $field ?>
        <?php endforeach; ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
