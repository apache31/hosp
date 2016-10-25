<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'หน่วยงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Department', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'depart_id',
            'name',
            'addrpart',
            'moopart',
            //'tmbpart',
            [
            'attribute' => 'tmbpart',
            'value' => 'district.district_name'
            ],
            //'amppart',
            [
            'attribute' => 'amppart',
            'value' => 'amphur.amphur_name'
            ],
            [
            'attribute' => 'chwpart',
            'value' => 'province.province_name'
            ],
            // 'postcode',
            // 'phone',
            // 'fax',
            // 'website',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions'=>['class'=>'btn btn-primary'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
            ],
        ],
    ]); ?>
</div>
