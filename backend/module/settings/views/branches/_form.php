<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use \backend\module\settings\models\Companies;

/* @var $this yii\web\View */
/* @var $model backend\module\settings\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'companies_company_id')->widget(
        Select2::className(),[
            'data' => ArrayHelper::map(Companies::find()->all(),'company_id','company_name'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select the Company'],
            'pluginOptions' => [
                'allowClear' => true
            ]

        ]

    ) ?>

    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_created_date')->widget(
        DatePicker::className(),[
        'inline'=>false,
        'clientOptions'=>[
            'autoClose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>

    <?= $form->field($model, 'branch_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
