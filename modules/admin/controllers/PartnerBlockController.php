<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\PartnerBlock;
use app\modules\admin\models\PartnerBlockSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Language;
use app\modules\admin\models\User;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

/**
 * PartnerBlockController implements the CRUD actions for PartnerBlock model.
 */
class PartnerBlockController extends Controller
{
    public $app_language_id = 0;

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
     * Lists all PartnerBlock models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->checkAccess();
        $searchModel = new PartnerBlockSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PartnerBlock model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->checkAccess();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PartnerBlock model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->checkAccess();
        $model = new PartnerBlock();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->img = UploadedFile::getInstance($model, 'img');
            if($model->img){
                $model->upload();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PartnerBlock model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->checkAccess();
        $model = $this->findModel($id);
        $img = $model->img;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->img = UploadedFile::getInstance($model, 'img');
            if($model->img){
                $model->upload();
            }
            else{
                $model->img = $img;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PartnerBlock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->checkAccess();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PartnerBlock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PartnerBlock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $conditions = (Yii::$app->user->can('admin')) ? ['id' => $id] : ['id' => $id, 'language_id' => $this->app_language_id];
//        if (($model = PartnerBlock::findOne($id)) !== null) {
        if (($model = PartnerBlock::findOne($conditions)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function checkAccess()
    {
        if(Yii::$app->user->can('admin')){
            return true;
        }
        else {
            $language = Language::findOne(['url' => Yii::$app->language]);
            $this->app_language_id = $language->id;
            $user = User::findOne(Yii::$app->user->id);
            if($language->id == $user->language_id){
                return true;
            }
            else{
                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            }
        }
    }
}
