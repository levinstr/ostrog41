<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form clearfix">

    <?= "<?php " ?>$form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
    ]); ?>

<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
    }
} ?>
    <div class="col-xs-6 col-sm-6">
        <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Сохранить') ?>, ['class' => 'btn btn-success']) ?>
        <?= "<?= " ?>Html::resetButton(<?= $generator->generateString('Очистить') ?>, ['class' => 'btn btn-secondary']) ?>&nbsp;
        <?= "<?= " ?>Html::a(<?= $generator->generateString('Отменить') ?>, ['index'], ['class' => 'btn btn-light']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
