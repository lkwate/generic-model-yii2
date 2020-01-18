<?php

namespace app\modules\genericmodel\models;

use Yii;
use app\modules\genericmodel\models\GeneratorModel as Generator;
//use yii\gii\generators\model\Generator; // generator to generate
use \yii\db\ActiveRecord;

class GenericModel extends ActiveRecord
{

    private static $_genericTableName;
    private static $_genericGenerator;
    private static $_table;


    public static function genericInitModel($tableName) {
        GenericModel::$_genericGenerator = new Generator();
        GenericModel::$_genericTableName = $tableName;
        GenericModel::$_table = GenericModel::getDb()->getSchema()->getTableSchema(GenericModel::$_genericTableName);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()  {

        return GenericModel::$_genericTableName;
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {

        $result = GenericModel::$_genericGenerator->generateRulesArray(GenericModel::$_table);
        $return = []; 
        foreach($result as $k => $v) {
            $return[] = eval("return ".$v.";");
        }
        return $return;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        $result = GenericModel::$_genericGenerator->generateLabels(GenericModel::$_table);
        return $result;
    }
}