<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ClaimSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="claim-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'iduser') ?>

    <?php // echo $form->field($model, 'idcategory') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'photobef') ?>

    <?php // echo $form->field($model, 'photoaft') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
