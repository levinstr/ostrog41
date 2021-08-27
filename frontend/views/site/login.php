<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
?>

<?= $this->render(
    '../layouts/menu.php'
) ?>

<div class="container site-login">
    <div class="row">
        <div class="col-lg-5 col-md-offset-4">
            <h2 class="text-center"><?= Html::encode($this->title) ?></h2>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    Если Вы забыли пароль, то можете <?= Html::a('восстановить', ['site/request-password-reset']) ?>.
                    <br>
                    Нужно подтверждение e-mail? <?= Html::a('Выслать', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group text-center">
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?= $this->render(
    '../layouts/footer.php'
) ?>
