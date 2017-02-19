<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \backend\models\Branches;
use \backend\models\Companies;

/* @var $this yii\web\View */
/* @var $model backend\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'companies_company_id')->dropDownList(
    ArrayHelper::map(Companies::find()->all(),'company_id','company_name'),
        ['prompt','Select Company']);
    ?>

    <?= $form->field($model,'branches_branch_id')->dropDownList(
        ArrayHelper::map(Branches::find()->joinWith(['companiesCompany c'],true,'INNER JOIN')->where(
            ['c.company_name'  => 'Twitter.com'])->all(),'branch_id', 'branch_name'));
    ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'department_created_date')->textInput(['readonly' => true, 'value' => date('Y-m-d h:m:s')]) ?>

    <?= $form->field($model, 'department_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
