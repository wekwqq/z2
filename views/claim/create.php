<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Claim $model */

$this->title = 'Create Claim';
$this->params['breadcrumbs'][] = ['label' => 'Claims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="claim-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
