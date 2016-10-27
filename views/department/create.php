<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = 'เพิ่มหน่วยงาน';
$this->params['breadcrumbs'][] = ['label' => 'หน่วยงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'amphur'=> [],
        'district'=> [],
    ]) ?>

</div>
