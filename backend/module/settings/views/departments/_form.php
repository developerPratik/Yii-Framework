<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\module\settings\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'companiesCompany')->widget(kartik\select2\Select2::className(),[
        'data' => ArrayHelper::map(\backend\models\Companies::find()->all(),'company_id','company_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Company'],
        'pluginOptions'=>['allowClear' => true]
    ]) ?>

    <?= $form->field($model, 'branchesBranch')->widget(
        kartik\select2\Select2::className(),[
            'data' => ArrayHelper::map(\backend\models\Branches::find()->all(), 'branch_id','branch_name'),
            'options' => ['placeholder' => 'Select Branch'],
            'pluginOptions' => ['allowClear' => true]
        ])
        ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_created_date')->widget(
        DatePicker::className(),[
        'inline'=>false,
        'clientOptions'=>[
            'autoClose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>

    <?= $form->field($model, 'department_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
