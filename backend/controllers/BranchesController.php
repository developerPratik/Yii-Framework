<?php

namespace backend\controllers;

use kartik\form\ActiveForm;
use Yii;
use backend\models\Branches;
use backend\models\BranchesSearch;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BranchesController implements the CRUD actions for Branches model.
 */
class BranchesController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Branches models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BranchesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Branches model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Imports an excel file (.xlsx) using php,
     *stores the excel data into selected database
     */

    public function actionImportExcel()
    {
        $inputFile = 'uploads/branches_file.xlsx';

        try{
            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFile);


        }
        catch(Exception $e){
            var_dump($e);
    }
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for( $row = 1; $row<=$highestRow; $row++){
            $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row);

            if($row == 1){
                continue;
            }

            $branch = new Branches();
            $branch_id = $rowData[0][0];
            $branch->companies_company_id;
            $branch->branch_name;
            $branch->branch_address;
            $branch->branch_status;
        }


    }
    /**
     * Creates a new Branches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Branches();

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){

            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if(Yii::$app->user->can('create-branch')){
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->branch_id]);
            } else {
                return $this->renderAjax('create', [
                    'model' => $model,
                ]);
            }

        }
        else{
            Yii::$app->getSession()->setFlash('error', 'You don\'t have the required privileges');
            return $this->redirect(['branches/index']);
        }

    }

    /**
     * ajax validation function that
     * accepts ajax requests
     * */

    public function actionValidation()
    {
        $model = new Branches();

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }


public function actionList($id){

        $getBranches = Branches::find()
                        ->where(['companies_company_id' => $id])
                        ->all();
        if($getBranches != null) {
            foreach($getBranches as $branch){
                echo "<option value=".$branch->branch_id.">".$branch->branch_name."</option>";

            }
        }
        else{
            echo null;
        }

    }

    /**
     * Updates an existing Branches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->branch_id]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Branches model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Branches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Branches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Branches::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
