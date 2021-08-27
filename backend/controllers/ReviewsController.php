<?php

namespace backend\controllers;

use Yii;
use common\models\Reviews;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;

/**
 * ReviewsController implements the CRUD actions for Reviews model.
 */
class ReviewsController extends Controller
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
     * Lists all Reviews models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Reviews::find(),
        ]);
        if (Yii::$app->request->post('hasEditable')) {

            $id = Yii::$app->request->post('editableKey');
            $model = Reviews::findOne($id);

            if ($model->load(Yii::$app->request->post())) {

                if (!empty($_POST['Reviews'][Yii::$app->request->post('editableIndex')])) {

                    $model->{$_POST['editableAttribute']} = $_POST['Reviews'][Yii::$app->request->post('editableIndex')][Yii::$app->request->post('editableAttribute')];

                }

                $model->save();

                if ($_POST['editableAttribute'] == 'status') {
                    $output = Yii::$app->formatter->asBoolean($model->status);
                }else{
                    $output = $model->{$_POST['editableAttribute']};
                }

                $out = Json::encode(['output'=>$output, 'message'=>'']);

            }
            return $out;

        }
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Reviews model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reviews model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reviews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reviews::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
