<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \backend\models\Companies;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'companies_company_id')->dropDownList(
    ArrayHelper::map(Companies::find()->all(),'company_id','company_name'),
        [   'prompt' => 'Select Company',
            'onchange' =>
                '$.post("index.php?r=branches/list&id='.'"+$(this).val(),
            function(data){
                $( "select#departments-branches_branch_id").html(data);
            });'
           ]);
    ?>


    <?= $form->field($model, 'branches_branch_id')->dropDownList([], ['prompt']) ?>

    <?= $form->field($model, 'department_name')->textInput()?>

    <?= $form->field($model, 'department_created_date')->widget(DatePicker::className(),
        [
            'inline' => false,
            'clientOptions' => [
                'autoClose' => true,
                'format' => 'yyyy-m-d'
            ]
        ])
    ?>

    <?= $form->field($model, 'department_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
