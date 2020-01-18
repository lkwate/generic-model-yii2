<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use Yii;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RelationParamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Generic Model';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generic-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Generic Model', ['create', 'tableName' =>  get_class($searchModel)::tableName()], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);
        $attrLabels = Yii::$app->getDb()->getSchema()->getTableSchema(get_class($searchModel)::tableName())->getColumnNames();
        $attrLabels = array_slice($attrLabels,0, 6);
        $columns = array_merge($attrLabels, [['class' => 'app\modules\genericmodel\models\ActionColumn']]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]); ?>


</div>
