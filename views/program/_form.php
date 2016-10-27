<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;

use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $model app\models\Program */
/* @var $form yii\widgets\ActiveForm */
echo Dialog::widget();
?>

<div class="program-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'org_id')->textInput() ?>

    <?= $form->field($model, 'datestart')->textInput() ?>

    <?= $form->field($model, 'dateend')->textInput() ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        
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