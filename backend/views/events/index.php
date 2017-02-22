<?php

use yii\helpers\Html;
use yii2fullcalendar\yii2fullcalendar;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= yii2fullcalendar::widget(array(
    'events'=> $tasks,
));?>

    <?php yii\bootstrap\Modal::begin(
        [   'header' => '<h4>Create an event on..</h4>',
            'id' => 'modal',
            'size' => 'modal-lg'
        ]
    );

    echo "<div id='modalContent'>Modal Content here</div>";

    yii\bootstrap\Modal::end();
    ?>


</div>
