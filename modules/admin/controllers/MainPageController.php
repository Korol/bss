<?php

namespace app\modules\admin\controllers;

use app\models\Language;
use Yii;
use app\modules\admin\models\MainPage;
use app\modules\admin\models\MainPageSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\User;
use yii\web\UploadedFile;

/**
 * MainPageController implements the CRUD actions for MainPage model.
 */
class MainPageController extends Controller
{
    public $blocks_num = 5;
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
     * Lists all MainPage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->checkAccess();
        $searchModel = new MainPageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'blocks_filter' => $this->blocksFilterList(),
        ]);
    }

    /**
     * Displays a single MainPage model.
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
     * Creates a new MainPage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->checkAccess();
        $model = new MainPage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->img = UploadedFile::getInstance($model, 'img');
            if($model->img){
                $model->upload();
                $model->img = $model->img->baseName . '.' . $model->img->extension;
                $model->save();
            }
            Yii::$app->session->setFlash('success', Yii::t('admin', 'Item successfully added!'));
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'blocks_filter' => $this->blocksFilterList(),
            ]);
        }
    }

    /**
     * Updates an existing MainPage model.
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
                $model->img = $model->img->baseName . '.' . $model->img->extension;
                $model->save();
            }
            else{
                $model->img = $img;
                $model->save();
            }
            Yii::$app->session->setFlash('success', Yii::t('admin', 'Item successfully updated!'));
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'blocks_filter' => $this->blocksFilterList(),
            ]);
        }
    }

    /**
     * Deletes an existing MainPage model.
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
     * Finds the MainPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MainPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $conditions = (Yii::$app->user->can('admin')) ? ['id' => $id] : ['id' => $id, 'language_id' => $this->app_language_id];
//        if (($model = MainPage::findOne($id)) !== null) {
        if (($model = MainPage::findOne($conditions)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function blocksFilterList()
    {
        $return = [];
        $label = Yii::t('admin', 'Block');
        for($i = 1; $i <= $this->blocks_num; $i++){
            $return[$i] = $label . ' ' . $i;
        }
        return $return;
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
