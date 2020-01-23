<?php

namespace app\modules\genericmodel\controllers;

use Yii;
use app\modules\genericmodel\models\TreeMenuGenerator;
use app\modules\genericmodel\models\GenericModel;
use app\modules\genericmodel\models\GenericModelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RelationParamController implements the CRUD actions for RelationParam model.
 */
class GenericModelController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * display menu tree of differents rubrique
     */
    public function actionWelcome()
    {

        $treeMenu = TreeMenuGenerator::generateMenu();
        return $this->render('welcome', [
            'treeMenu' => $treeMenu,
        ]);
    }

    /**
     * Lists all RelationParam models.
     * @return mixed
     */
    public function actionIndex($tableName)
    {
        $treeMenu = TreeMenuGenerator::generateMenu();
        GenericModel::genericInitModel($tableName);
        GenericModelSearch::genericInitSearch();
        $searchModel = new GenericModelSearch();
        //unset parameter of table
        $params = Yii::$app->request->queryParams;
        unset($params['tableName']);
        $dataProvider = $searchModel->search($params);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'treeMenu' => $treeMenu
        ]);
    }

    /**
     * Displays a single RelationParam model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tableName, $id)
    {
        $treeMenu = TreeMenuGenerator::generateMenu();
        GenericModel::genericInitModel($tableName);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'treeMenu' => $treeMenu
        ]);
    }

    /**
     * Creates a new RelationParam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tableName)
    {
        $treeMenu = TreeMenuGenerator::generateMenu();
        GenericModel::genericInitModel($tableName);
        $model = new GenericModel();
        Yii::debug($model);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code, 'tableName' => $tableName]);
        }

        return $this->render('create', [
            'model' => $model,
            'treeMenu' => $treeMenu
        ]);
    }

    /**
     * Updates an existing RelationParam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tableName, $id)
    {
        $treeMenu = TreeMenuGenerator::generateMenu();
        GenericModel::genericInitModel($tableName);
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code, 'tableName' => $tableName]);
        }

        return $this->render('update', [
            'model' => $model,
            'treeMenu' => $treeMenu,
        ]);
    }

    /**
     * Deletes an existing RelationParam model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tableName, $id)
    {
        GenericModel::genericInitModel($tableName);
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'tableName' => $tableName]);
    }

    /**
     * Finds the RelationParam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RelationParam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GenericModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
