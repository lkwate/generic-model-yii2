<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RelationParam */

$this->title = "Create " . get_class($model)::tableName();
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index', 'tableName' => get_class($model)::tableName()]];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .title {
        margin-left: 160px;
    }
</style>
<div class="generic-model-create">
    <div class="title"> 
        <h3><?= Html::encode($this->title) ?></h3>
    </div>


    <?= $this->render('_form', [
        'model' => $model,
        'treeMenu' => $treeMenu,
    ]) ?>

</div>