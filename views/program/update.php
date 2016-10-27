<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Program */

$this->title = 'โปรแกรมตรวจสุขภาพ: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'โปรแกรม', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="program-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
