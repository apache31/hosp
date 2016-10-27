<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use kartik\widgets\DepDrop;
use kartik\dialog\Dialog;

use app\models\Province;
use app\models\Amphur;
use app\models\District;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
// widget with default options
echo Dialog::widget();
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php //$form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    
    
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
           <?= $form->field($model, 'addrpart')->textInput(['maxlength' => true]) ?>
        </div>        
        <div class="col-xs-12 col-sm-6 col-md-6">
           <?= $form->field($model, 'moopart')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
        <?php 
        echo $form->field($model, 'chwpart')->dropDownList(
            ArrayHelper::map(Province::find()->all(),
            'province_code',
            'province_name'),
            [
                'id'=>'ddl-province',
                'prompt'=>'เลือกจังหวัด'
            ]); 
        ?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
        <?= $form->field($model, 'amppart')->widget(DepDrop::classname(), [
            'options'=>['id'=>'ddl-amphur'],
            'data'=> $amphur,
            'pluginOptions'=>[
                'depends'=>['ddl-province'],
                'placeholder'=>'เลือกอำเภอ...',
                'url'=>Url::to(['/department/get-amphur'])
            ]
        ]); ?>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
        <?= $form->field($model, 'tmbpart')->widget(DepDrop::classname(), [
            'data'=> $district,
            'pluginOptions'=>[
                'depends'=>['ddl-province', 'ddl-amphur'],
                'placeholder'=>'เลือกตำบล...',
                'url'=>Url::to(['/department/get-district'])
            ]
        ]); ?>           
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
        <?= $form->field($model, 'postcode')->textInput(['maxlength' => true]) ?>            
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>                   
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
        <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>          
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
        <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ปรับปรุงข้อมูล', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        
        <?php //\yii\helpers\Html::a( 'Back', Yii::$app->request->referrer) ?>
        
        <button type="button" id="btn-confirm" class="btn btn-warning">ยกเลิก</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
// javascript for triggering the dialogs
$js = <<< JS
$("#btn-confirm").on("click", function() {
    krajeeDialog.confirm("คุณต้องการออกจากหน้านี้ และกลับไปยังหน้าที่แล้ว", function (result) {
        if (result) {
            window.history.back();
        } else {
            
        }
    });
});
JS;

$this->registerJs($js);
?>
