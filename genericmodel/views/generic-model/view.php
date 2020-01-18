<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use Yii;

/* @var $this yii\web\View */
/* @var $model app\models\RelationParam */

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Generic Model', 'url' => ['index', 'tableName' => get_class($model)::tableName()]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="generic-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->code, 'tableName' => get_class($model)::tableName()], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->code, 'tableName' => get_class($model)::tableName()], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => get_class($model)::getTableSchema()->getColumnNames(),
    ]) ?>

</div>
