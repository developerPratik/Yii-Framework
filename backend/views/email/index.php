<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Compose Email',
            [
                'class' => 'btn btn-success',
                'id' => 'modalButton',
                'value' => Url::to('index.php?r=email/create'),
            ])
        ?>
    </p>
    <?php Modal::begin(
        [   'header' => '<h4>Send an Email</h4>',
            'id' => 'modal',
            'size' => 'modal-lg'
        ]
    );

    echo "<div id='modalContent'>Modal Content here</div>";

    Modal::end();
    ?>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'email_id:email',
            'receiver_name',
            'receiver_email:email',
            'subject',
            'content:ntext',
            // 'attachment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
