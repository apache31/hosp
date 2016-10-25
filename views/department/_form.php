<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use kartik\widgets\DepDrop;

use app\models\Province;
use app\models\Amphur;
use app\models\District;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php //$form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addrpart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'moopart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tmbpart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amppart')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'chwpart')->textInput(['maxlength' => true]) ?>
    
    <?php 
    echo $form->field($model, 'chwpart')->dropDownList(
            ArrayHelper::map(Province::find()->all(),
            'chwpart',
            'province_name'),
            [
                'id'=>'ddl-province',
                'prompt'=>'เลือกจังหวัด'
            ]); ?>
    
    <?php //$form->field($model, 'chwpart')->dropDownList(\app\models\Province::GetList(),['prompt'=>'จังหวัด']) ?>

    <?= $form->field($model, 'postcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
