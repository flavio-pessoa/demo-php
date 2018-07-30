<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FuncionarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Funcionario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Criar Funcionario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $gridColumns = [
		'cod_funcionario',
    	'nome_funcionario',    	
    	[
    		'attribute'=> 'cod_departamento',
    		'value'=> 'codDepartamento.nome_departamento',
    	],    	
    	'email_funcionario:email',    	
    	'login_funcionario',    	
    	['class'=>'yii\grid\ActionColumn',],
    ];
    ?>    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]); ?>
    <?php Pjax::end(); ?>
</div>
