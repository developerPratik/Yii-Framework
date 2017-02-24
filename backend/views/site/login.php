<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Yii2 Admin Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="form-group">
                        <?= $form->field($model, 'username', [
                            'inputOptions'=>[
                                'tag' => 'div',
                                'class'=>'form-control input-lg',
                                'placeholder'=>'Username'],
//                            'template' => '{input}<span class="glyphicon glyphicon-user form-feedback-feedback"></span>{error}{hint}'
                        ])->textInput()->label(false); ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'password',[
                            'inputOptions' => [
                                'class' => 'form-control input-lg',
                                'placeholder' => 'Password'
                            ]
                        ])->passwordInput()->label(false); ?>
                    </div>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    <div class="form-group">
                        <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                        <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
                    </div>

                <?php ActiveForm::end();?>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>


