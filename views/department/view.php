<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'หน่วยงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ปรับปรุงข้อมูล', ['update', 'id' => $model->depart_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบรายการ', ['delete', 'id' => $model->depart_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'depart_id',
            'name',
            'addrpart',
            'moopart',
            'tmbpart',
            'amppart',
            'chwpart',
            'postcode',
            'phone',
            'fax',
            'website',
        ],
    ]) ?>

</div>
