<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

//use kartik\widgets\DepDrop;
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

    <?= $form->field($model, 'addrpart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'moopart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tmbpart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amppart')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'chwpart')->textInput(['maxlength' => true]) ?>
    
    <?php 
    echo $form->field($model, 'chwpart')->dropDownList(
            ArrayHelper::map(Province::find()->all(),
            'province_code',
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
