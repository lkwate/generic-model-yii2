<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RelationParam */

$this->title = 'Update Generic Model: ' . $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Generic Model', 'url' => ['index', 'tableName' => get_class($model)::tableName()]];
$this->params['breadcrumbs'][] = ['label' => $model->code, 'url' => ['view', 'id' => $model->code, 'tableName' => get_class($model)::tableName()]];
$this->params['breadcrumbs'][] = 'Update';
?>
<style>
    .title {
        margin-left: 160px;
    }
</style>
<div class="generic-model-update">
    <div class="title">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'treeMenu' => $treeMenu,
    ]) ?>

</div>