<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DepartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Departments',
            [
                'class' => 'btn btn-success',
                'id' => 'modalButton',
                'value' => Url::to('index.php?r=departments/create'),
            ])
        ?>
    </p>
    <?php Modal::begin(
        [   'header' => '<h4>Department</h4>',
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
            if($model->department_status == 'inactive'){
                return ['class' => 'danger'];

            }
            else if($model->department_status == 'active'){
                return ['class' => 'success'];

            }
            return null;
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'department_name',

            [
                'attribute' => 'companies_company_id',
                'value' => 'companiesCompany.company_name'
            ],

            [
                'attribute' => 'branches_branch_id',
                'value' => 'branchesBranch.branch_name'
            ],

            'department_created_date',
            'department_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
