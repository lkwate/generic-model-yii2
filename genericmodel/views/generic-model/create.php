<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RelationParam */

$this->title ="Create ".get_class($model)::tableName();
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index', 'tableName' => get_class($model)::tableName()]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generic-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
