<?php

namespace app\modules\genericmodel\models;

use Yii;
use app\modules\genericmodel\models\GenericModel;
use yii\helpers\Inflector;
use yii\helpers\VarDumper;
use yii\helpers\ArrayHelper;

class FieldGenerator {

    public static function generateSearchField($form, $model) {
        $result = array(); 
        $tableSchema = Yii::$app->getDb()->getSchema()->getTableSchema(GenericModel::tableName());
        $index = 0; 
        $genericModel = new GenericModel(); 
        $attrLabels = $genericModel->attributeLabels();
        foreach ($attrLabels as $key) {
            $result[$key] = FieldGenerator::generateActiveSearchField($tableSchema, $form, $model, $key);
            $index++;
            if ($index>3) {
                break;
            }
        }
        Yii::debug($result);
        return $result;
    }

    /**
     * Generates code for active search field
     * @param string $attribute
     * @return string
     */
    public static function generateActiveSearchField($tableSchema, $form, $model,  $attribute)
    {
        if ($tableSchema === false) {
            return $form->field($model, $attribute);
        }

        $column = $tableSchema->columns[$attribute];
        if ($column->phpType === 'boolean') {
            return $form->field($model, $attribute)->checkbox();
        }

        return $form->field($model, $attribute);
    }
    
    public static function generateField($form, $model) {
        $result = array();
        $table = Yii::$app->getDb()->getSchema()->getTableSchema(GenericModel::tableName());
        $fk = $table->foreignKeys;
        // retrieve name of foreign key
        $fkNames = [];
        foreach($fk as $key => $value) {
            $refTable = $value[0];
            unset($value[0]);
            foreach($value as $k => $v) {
                $columnName = $k;
            }
            $fkNames[$columnName] = $refTable;
        }
        $attrLabels = $table->getColumnNames();
        foreach ($attrLabels as $key => $value) {
            if (array_key_exists($value, $fkNames)) {
                $data = FieldGenerator::generatDropDownListData(GenericModel::tableName(), $fkNames[$value]);
                $data = [''=>''] + $data;
                $result[$key] = $form->field($model, $value)->dropDownList($data);
            } else {
                $result[$key] = FieldGenerator::generateActiveField($table, $form, $model, $value);
            }
            
        }
        return $result;
    }

    /**
     * Generates data to dropdonwlist
     */
    public static function generatDropDownListData($tableName, $fkTableName) {
        GenericModel::genericInitModel($fkTableName);
        $data = ArrayHelper::map(GenericModel::find()->all(), 'code', 'libelle');
        GenericModel::genericInitModel($tableName);
        return $data;
    }


    /**
     * Generates code for active field
     * @param string $attribute
     * @return string
     */
    private static function generateActiveField($tableSchema, $form, $model, $attribute)
    {
        if ($tableSchema === false || !isset($tableSchema->columns[$attribute])) {
            if (preg_match('/^(password|pass|passwd|passcode)$/i', $attribute)) {
                return $form->field($model, $attribute)->passwordInput();
            }

            return $form->field($model, $attribute);
        }
        $column = $tableSchema->columns[$attribute];
        if ($column->phpType === 'boolean') {
            return $form->field($model, $attribute)->checkbox();
        }

        if ($column->type === 'text') {
            return $form->field($model, $attribute)->textarea(['rows' => 6]);
        }

        if (preg_match('/^(password|pass|passwd|passcode)$/i', $column->name)) {
            $input = 'passwordInput';
        } else {
            $input = 'textInput';
        }

        if (is_array($column->enumValues) && count($column->enumValues) > 0) {
            $dropDownOptions = [];
            foreach ($column->enumValues as $enumValue) {
                $dropDownOptions[$enumValue] = Inflector::humanize($enumValue);
            }
            return $form->field($model, $attribute)->dropDownList(preg_replace("/\n\s*/", ' ', VarDumper::export($dropDownOptions)) , ['prompt' => '']);
        }

        if ($column->phpType !== 'string' || $column->size === null) {
            return $form->field($model, $attribute)->$input();
        }

        return $form->field($model, $attribute)->$input(['maxlength' => true]);
    }

}