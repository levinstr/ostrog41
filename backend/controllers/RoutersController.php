<?php

namespace backend\controllers;

use Yii;
use common\models\Routers;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * RoutersController implements the CRUD actions for Routers model.
 */
class RoutersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'create', 'update', 'view', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Routers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Routers::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new Routers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Routers();

        if ($model->load(Yii::$app->request->post())) {

            if(!empty(UploadedFile::getInstance($model, 'file'))) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->photo = $model->upload();
            } else {
                $model->photo = 'nophoto.jpg';
            };

            $model->save();
            return $this->redirect('index');

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Routers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            if(!empty(UploadedFile::getInstance($model, 'file'))) {
                unlink(Yii::getAlias('@frontend').'/web/uploads/images/routers/'.$model->photo);
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->photo = $model->upload();
            } else {
                $model->photo = $model->photo;
            };

            $model->save();
            return $this->redirect('index');

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Routers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        if ($model->photo != 'nophoto.jpg') {
            unlink(Yii::getAlias('@frontend').'/web/uploads/images/routers/'.$model->photo);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Routers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Routers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Routers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
