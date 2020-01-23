<?php 

namespace app\modules\genericmodel\models;

use app\modules\genericmodel\models\GenericModel;
use Yii;

class TreeMenuGenerator {

    public static function generateMenu() {
        $result = []; 
        $result['options'] = ['class' => 'navbar-nav'];
        $result['items'] = [];
        $dic = [];
        GenericModel::genericInitModel('rubriqueParam');
        $rubriques = GenericModel::find()->orderBy(['code' => SORT_ASC])->all();
        foreach($rubriques as $rubrique) {
            if ($rubrique->rubrique_parent) {
                if ($rubrique->class_rubrique == 1) {
                    
                    $temp = [] ;
                    $temp['label'] = $rubrique->libelle; 
                    $temp['url'] = 'index.php?r=genericmodel/generic-model/index&tableName='.$rubrique->nom_table;
                    array_push($dic[$rubrique->rubrique_parent], $temp);
                } else {
                    //rubric is a branch
                    $temp = [];
                    $temp['label'] = $rubrique->libelle;
                    $temp['items'] = [];
                    // add to dictionary
                    $dic[$rubrique->code] = &$temp['items'];
                    // add to result
                    array_push($dic[$rubrique->rubrique_parent], $temp);
                }
            } else {
                if ($rubrique->class_rubrique == 1) {
                    //rubric is a leaf
                    // construct parent
                    $temp = []; 
                    $temp['label'] = $rubrique->libelle;
                    $temp['items'] = [];
                    // add a leaf
                    $tempLeaf = [];
                    $tempLeaf['label'] =  $rubrique->libelle; 
                    $tempLeaf['url'] = 'index.php?r=genericmodel/generic-model/index&tableName='.$rubrique->nom_table;
                    array_push($temp['items'], $tempLeaf);
                    array_push($result['items'], $temp);

                } else {
                    //rubric is a branch
                    $temp = [];
                    $temp['label'] = $rubrique->libelle;
                    $temp['items'] = [];
                    // add to dictionary
                    $dic[$rubrique->code] = &$temp['items'];
                    // add to result
                    array_push($result['items'], $temp);
                }
            }
        }
        return $result;
    }
}

?>