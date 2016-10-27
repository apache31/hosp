<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = 'ปรับปรุงข้อมูล: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ปรับปรุงข้อมูล', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->depart_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'amphur'=> $amphur,
        'district'=> $district,
    ]) ?>

</div>
