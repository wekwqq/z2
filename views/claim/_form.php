<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Claim $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="claim-form">
    <?php $li=[]; $categories=\app\models\Category::find()->all();
    foreach ($categories as $category)
    {
    $li[$category->id]=$category->name;
    }?>
<?php
$form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'id_user')->textInput() ?-->

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idcategory')->dropDownList($li) ?>
    <br>
    <?= Yii::$app->user->identity->admin==1 ? $form->field($model, 'status')->dropDownList([ 'Новая' => 'Новая', 'Решена' => 'Решена', 'Отклонена' => 'Отклонена', ], ['prompt' => '']) : ''?>

    <?= $form->field($model, 'photobef')->fileInput() ?>

    <?=  Yii::$app->user->identity->admin==1 ? $form->field($model, 'photoaft')->fileInput() : '' ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
