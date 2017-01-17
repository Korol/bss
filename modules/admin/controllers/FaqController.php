<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Faq;
use app\modules\admin\models\FaqSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Language;
use app\modules\admin\models\User;
use yii\web\ForbiddenHttpException;

/**
 * FaqController implements the CRUD actions for Faq model.
 */
class FaqController extends Controller
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
     * Lists all Faq models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->checkAccess();
        $searchModel = new FaqSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Faq model.
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
     * Creates a new Faq model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->checkAccess();
        $model = new Faq();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $max = Faq::find()->where(['language_id' => $model->language_id])->max('sort_order');
            $model->sort_order = ((int)$max + 1);
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionSorting($lang_id = 0)
    {
        $this->checkAccess();
        $admin = false;
        if(Yii::$app->user->can('admin')){
            $admin = true;
            if(!empty($lang_id) && is_numeric($lang_id)){
                $faq = Faq::find()
                    ->where(['language_id' => $lang_id])
                    ->orderBy(['sort_order' => 'asc'])
                    ->asArray()
                    ->all();
            }
            else{
                $faq = [];
            }
        }
        else{
            $lang_id = $this->app_language_id;
            $faq = About::find()
                ->where(['language_id' => $lang_id])
                ->orderBy(['sort_order' => 'asc'])
                ->asArray()
                ->all();
        }
        $languages = Language::find()->asArray()->all();

        return $this->render('sorting', compact('admin', 'lang_id', 'faq', 'languages'));
    }

    public function actionSortingSave()
    {
        $this->checkAccess();
        $post = Yii::$app->request->post();
        if(empty($post['language_id']) || empty($post['sort_list'])){
            return $this->redirect(['index']);
        }

        $model = new Faq();
        $sort_list = explode(',', $post['sort_list']);
        if(!empty($sort_list)){
            foreach($sort_list as $key => $item){
                $sort_order = $key + 1;
                $model->updateAll(['sort_order' => $sort_order], ['language_id' => $post['language_id'], 'id' => $item]);
            }
            Yii::$app->session->setFlash('success', Yii::t('admin', 'FAQ questions sorting order was updated successfully!'));
        }

        return $this->redirect(['sorting', 'lang_id' => $post['language_id']]);
    }

    /**
     * Updates an existing Faq model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->checkAccess();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Faq model.
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
     * Finds the Faq model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Faq the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $conditions = (Yii::$app->user->can('admin')) ? ['id' => $id] : ['id' => $id, 'language_id' => $this->app_language_id];
//        if (($model = Faq::findOne($id)) !== null) {
        if (($model = Faq::findOne($conditions)) !== null) {
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
