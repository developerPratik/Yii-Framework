<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompaniesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Companies',
            [
                'class' => 'btn btn-success',
                'id' => 'modalButton',
                'value' => Url::to('index.php?r=companies/create'),
            ])
        ?>
    </p>
    <?php Modal::begin(
        [   'header' => '<h4>Company</h4>',
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
        'rowOptions' => function($model){
            if($model->company_status == 'inactive'){
                return ['class' => 'danger'];

            }
            else if($model->company_status == 'active'){
                return ['class' => 'success'];

            }
            return null;
        },

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'company_name',
            'company_email:email',
            'company_address',
            'company_created_date',
            'company_status',
            [
                'attribute' => 'company_logo',
                'format' => 'html',
                'label' => 'Company Logo',
                'value' => function ($data)
                {
                    return Html::img($data['company_logo'],
                        ['width' => '50px']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
