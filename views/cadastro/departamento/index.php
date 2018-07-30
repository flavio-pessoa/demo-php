<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departamento';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamento-index">
    
    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'cod_departamento',
            'nome_departamento',
            [
                'attribute' => 'vlr_limite_departamento',
                'label' => 'Limite de Gastos',
                'value' =>function ($model){
                return $model->formatoReal($model->vlr_limite_departamento);
                },
                'format' => 'text',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Criar Departamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php Pjax::end(); ?>
</div>
