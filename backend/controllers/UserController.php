<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                        'actions' => ['index', 'delete', 'error'],
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->request->post('hasEditable')) {

            $id = Yii::$app->request->post('editableKey');

            if (!empty(Yii::$app->request->post('role'))) {
                $userRole = Yii::$app->authManager->getRole(Yii::$app->request->post('role'));
                //удаляем все роли и правила
                Yii::$app->authManager->revokeAll($id);
                //назначаем роль
                Yii::$app->authManager->assign($userRole, $id);

                $output = (Yii::$app->request->post('role') == 'admin') ? 'Администратор' : 'Зарегистрированный';
            } else {
                $output = array_values(Yii::$app->authManager->getRolesByUser($id))[0]->description;;
            }
            $out = Json::encode(['output'=>$output, 'message'=>'']);
            return $out;
        }
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        //удаляем все роли и правила
        Yii::$app->authManager->revokeAll($id);

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
