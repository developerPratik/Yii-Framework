<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel backend\module\settings\models\CompaniesSearch */


$this->title = 'Companies Settings Module';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Companies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                     [
                'class' => 'yii\grid\SerialColumn'],
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
    ]);
    ?>
</div>
