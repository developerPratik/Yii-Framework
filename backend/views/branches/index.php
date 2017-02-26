<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Branches',
            [
                'class' => 'btn btn-success',
                'id' => 'modalButton',
                'value' => Url::to('index.php?r=branches/create'),
            ])
        ?>
    </p>
    <?php Modal::begin(
        ['header' => '<h4>Branch</h4>',
            'id' => 'modal',
            'size' => 'modal-lg'
        ]
    );

    echo "<div id='modalContent'>Modal Content here</div>";
    Modal::end();
    $this->params['text'] = "I didn't sign up for this!!";
    $this->beginBlock('advertisement');
    ?>
    <iframe width="100" height="100" src="https://www.youtube.com/embed/S9bCLPwzSC0" frameborder="0"></iframe>
    <?php
    $this->endBlock();
    Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model) {
            if ($model->branch_status == 'inactive') {
                return ['class' => 'danger'];

            } else if ($model->branch_status == 'active') {
                return ['class' => 'success'];

            }
            return null;
        },

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'companies_company_id',
                'value' => 'companiesCompany.company_name'
            ],

//            'branch_id',
            'branch_name',
            'branch_address',
            'branch_created_date',
            'branch_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
