<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RelationParam */

$this->title = 'Update Generic Model: ' . $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Generic Model', 'url' => ['index', 'tableName' => get_class($model)::tableName()]];
$this->params['breadcrumbs'][] = ['label' => $model->code, 'url' => ['view', 'id' => $model->code, 'tableName' => get_class($model)::tableName()]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="generic-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
