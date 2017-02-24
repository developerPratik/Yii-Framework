<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Uploaded */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uploaded-form">


    <?php $form = ActiveForm::begin(); ?>


    <?= \kato\DropZone::widget([
        'options' => [
            'maxFilesize' => '100',
            'url' => 'index.php?r=uploaded/upload'
        ],
        'clientEvents' => [
            'complete' => "function(file){console.log(file)}",
            'removedfile' => "function(file){alert(file.name + ' is removed')}"
        ],
    ]);
    ?>

    <br>
    <br>



    <div class="form-group">
        <?= Html::button("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>",
        ['class'=>'btn btn-success btn-lg',
        'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['/uploaded/index']) . "';",
        'data-toggle'=>'tooltip',
        'title'=>Yii::t('app', 'Done'),
        ]
        )
            ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
