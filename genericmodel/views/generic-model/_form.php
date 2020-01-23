<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use app\modules\genericmodel\models\FieldGenerator;
use Yii;

/* @var $this yii\web\View */
/* @var $model app\models\CleEtrangereParam */
/* @var $form yii\widgets\ActiveForm */

$tableName = get_class($model)::tableName();

?>

<style>
    .sidenav {
        margin-left: 2px;
        margin-top: 25px;
        height: 100%;
        width: 160px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 18px;
        color: #818181;
        display: block;
    }

    .sidenav a:hover {
        color: black;
    }

    .main {
        margin-top: 30px;
        margin-left: 160px;
        /* Same as the width of the sidenav */
        font-size: 15px;
        /* Increased text to enable scrolling */
        padding: 0px 10px;
        /* fixe height */
        height: 500px;
        margin-bottom: 50px;


        scroll-behavior: auto;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 10px;
        }
    }
</style>

<div class="sidenav">
    <?=
        Yii::debug($treeMenu);
        echo Nav::widget(
            $treeMenu
        )
    ?>
</div>

<div class="main">
    <div class="generic-model-form">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'offset' => 'col-sm-offset-4',
                    'wrapper' => 'col-sm-8',
                    'error' => '',
                    'hint' => '',
                ],
            ],
        ]); ?>
        <?php
        $fields = FieldGenerator::generateField($form, $model);
        ?>
        <?php foreach ($fields as $attr => $field) : ?>
            <?= $field ?>
        <?php endforeach; ?>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>