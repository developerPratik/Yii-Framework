<?php

namespace backend\controllers;

use Yii;
use backend\models\Uploaded;
use backend\models\UploadedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UploadedController implements the CRUD actions for Uploaded model.
 */
class UploadedController extends Controller
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
     * Lists all Uploaded models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UploadedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Uploaded model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpload(){
        $fileName = 'file';
        $uploadedPath = 'uploads/';
        if(isset($_FILES[$fileName])){
            $file = UploadedFile::getInstanceByName($fileName);
            if($file->saveAs($uploadedPath  . '/' . 'upload_' . time() . '.' . $file->extension)) {
                echo \yii\helpers\Json::encode($file);
            }
        }
        return false;
    }


    public function actionSetCookie()
    {

        $cookie = new \yii\web\Cookie([
            'name' => 'testCookie',
            'value' => 'test Cookie Vaue']);

        Yii::$app->getResponse()->getCookies()->add($cookie);
    }


    public function actionCheckCookie(){

        if(Yii::$app->getRequest()->getCookies()->has('testCookie')){
            echo Yii::$app->getRequest()->getCookies()->getValue('testCookie');

        }
        else{
            echo 'no cookie set';

        }






    }
    /**
     * Creates a new Uploaded model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Uploaded();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $fileName = 'file';
            return $this->redirect(['view', 'id' => $model->file_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Uploaded model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->file_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Uploaded model.
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
     * Finds the Uploaded model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uploaded the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Uploaded::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
