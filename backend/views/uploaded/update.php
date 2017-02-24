<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Uploaded */

$this->title = 'Update Uploaded: ' . $model->file_id;
$this->params['breadcrumbs'][] = ['label' => 'Uploadeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->file_id, 'url' => ['view', 'id' => $model->file_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uploaded-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
